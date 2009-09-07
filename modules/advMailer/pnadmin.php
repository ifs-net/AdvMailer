<?php
/**
 * @package      advMailer
 * @version      $Id:  $
 * @author       Florian Schie�l
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2009
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */
 
/**
 * the main administration function
 *
 * @author Florian Schie�l
 * @return string output
 */
function advMailer_admin_main()
{
    // security check
    if (!SecurityUtil::checkPermission('advMailer::', '::', ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    // create a new output object
    $render = & pnRender::getInstance('advMailer', false);

    return $render->fetch('advmailer_admin_main.htm');
}

/**
 * This function shows a preview and some more information about
 * the advMailer templates for this zikula installation
 * @author Florian Schie�l
 * @return string output
 */
function advMailer_admin_templates()
{
    // security check
    if (!SecurityUtil::checkPermission('advMailer::', '::', ACCESS_EDIT)) {
        return LogUtil::registerPermissionError();
    }

    // get html template
    $html_preview = pnModAPIFunc('advMailer','admin','applyTemplate',array('content' => _ADVMAILER_TPL_HTML_EXAMPLE, 'type' => 'html'));
    $text_preview = pnModAPIFunc('advMailer','admin','applyTemplate',array('content' => _ADVMAILER_TPL_TEXT_EXAMPLE, 'type' => 'text'));
    $text_preview = str_replace('<','&lt;',$text_preview);
    $text_preview = str_replace('>','&gt;',$text_preview);

    // Maybe only the html should be shown?
    $html = (int) FormUtil::getPassedValue('html');
    if ($html == 1) {
        print $html_preview;
        return true;
    }

    // create a new output object
    $render = pnRender::getInstance('advMailer', false);

    // Assign preview
    $render->assign('text_preview', $text_preview);
    $render->assign('html_preview', $html_preview);

    return $render->fetch('advmailer_admin_templates.htm');
}

/**
 * the mail queue management function
 *
 * @author      Florian Schie�l
 * @return      output
 */
function advMailer_admin_queue()
{
  	// load handler class
	Loader::requireOnce('modules/advMailer/pnincludes/classes/admin/queue.php');

	// Create output and call handler class
	$render = FormUtil::newpnForm('advMailer');

    // Return the output
    return $render->pnFormExecute('advmailer_admin_queue.htm', new advmailer_queueHandler());
}

/**
 * the mail queue management function
 *
 * @author      Florian Schie�l
 * @return      output
 */
function advMailer_admin_errorlog()
{
  	// load handler class
	Loader::requireOnce('modules/advMailer/pnincludes/classes/admin/errorlog.php');

	// Create output and call handler class
	$render = FormUtil::newpnForm('advMailer');

    // Return the output
    return $render->pnFormExecute('advmailer_admin_errorlog.htm', new advmailer_errorlogHandler());
}

/**
 * This is a standard function to modify the configuration parameters of the
 * module
 * @author Florian Schie�l
 * @return string HTML string
 */
function advMailer_admin_modifyconfig()
{
    // security check
    if (!SecurityUtil::checkPermission('advMailer::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // create a new output object
    $render = pnRender::getInstance('advMailer', false);

    // assign queue methods
    $render->assign('queuetypes', array(
        1 => DataUtil::formatForDisplay(_ADVMAILER_INSTANTDELIVERY),
        2 => DataUtil::formatForDisplay(_ADVMAILER_QUEUECRONJOB),
        3 => DataUtil::formatForDisplay(_ADVMAILER_QUEUESYSTEMINIT)));

    // assign all module vars
    $render->assign(pnModGetVar('advMailer'));

    return $render->fetch('advmailer_admin_modifyconfig.htm');
}

/**
 * This is a standard function to update the configuration parameters of the
 * module given the information passed back by the modification form
 * @author Florian Schie�l
 * @see advMailer_admin_updateconfig()
 * @param int queuefrequency Mails sent at one time for a system init or a cronjob url call
 * @param string queuecronpwd Password for URL that is called via any cron service
 * @param int queuetype for the way sending or queuing mails
 * @return bool true if update successful
 */
function advMailer_admin_updateconfig()
{
    // security check
    if (!SecurityUtil::checkPermission('advMailer::', '::', ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError();
    }

    // confirm our forms authorisation key
    if (!SecurityUtil::confirmAuthKey()) {
        return LogUtil::registerAuthidError (pnModURL('advMailer','admin','main'));
    }

    // set our new module variable values
    $oldqueuetype = (int) pnModGetVar('advMailer','queuetype');
    $queuetype = (int)FormUtil::getPassedValue('queuetype', 1, 'POST');
    if (($oldqueuetype != 3) && ($queuetype == 3)) {
        // Activate hook now
        pnModAPIFunc('Modules', 'admin', 'enablehooks', array('callermodname' => 'zikula', 'hookmodname' => 'advMailer'));
    } else if (($oldqueuetype == 3) && ($queuetype != 3)) {
        // Disable hook now
        pnModAPIFunc('Modules', 'admin', 'disablehooks', array('callermodname' => 'zikula', 'hookmodname' => 'advMailer'));
    }
    pnModSetVar('advMailer', 'queuetype', $queuetype);

    $queuefrequency = (int)FormUtil::getPassedValue('queuefrequency', 15, 'POST');
    pnModSetVar('advMailer', 'queuefrequency', $queuefrequency);

    $queuecronpwd = (string)FormUtil::getPassedValue('queuecronpwd', rand(1000000000,9999999999), 'POST');
    pnModSetVar('advMailer', 'queuecronpwd', $queuecronpwd);

    // Let any other modules know that the modules configuration has been updated
    pnModCallHooks('module', 'updateconfig', 'advMailer', array('module' => 'advMailer'));

    // the module configuration has been updated successfuly
    LogUtil::registerStatus (_CONFIGUPDATED);

    // This function generated no output, and so now it is complete we redirect
    // the user to an appropriate page for them to carry on their work
    return pnRedirect(pnModURL('advMailer', 'admin', 'main'));
}