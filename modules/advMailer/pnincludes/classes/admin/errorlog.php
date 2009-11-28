<?php
/**
 * @package      advMailer
 * @version      $Id$
 * @author       Florian Schießl
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2009
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

/**
 * mail queue (error logfile) management handler class
 * @author Florian Schießl
 */

class advMailer_errorlogHandler
{
    function initialize(&$render)
    {
        $dom = ZLanguage::getModuleDomain('advMailer');
        // security check
        if (!SecurityUtil::checkPermission('advMailer::', '::', ACCESS_ADMIN)) {
            return LogUtil::registerPermissionError();
        }

        // Is there an action to be done?
        // Should a mail be deleted and removed from the queue?
        $delete = (int) FormUtil::getPassedValue('delete');
        if ($delete > 0) {
            // Check for valid auth key
            if (!SecurityUtil::confirmAuthkey()) {
                LogUtil::registerAuthIDError();
            } else {
                $obj = DBUtil::selectObjectByID('advmailer_errorlog',$delete);
                if (!$obj) {
                    LogUtil::registerError(__('An error occured - the mail could not be loaded. Maybe it was delivered or moved to error logfile in the time between creating the last overview and your action.', $dom));
                } else {
                    $result = DBUtil::deleteObject($obj,'advmailer_errorlog');
                    if ($result) {
                        LogUtil::registerStatus(__('The mail was successfully removed and deleted from the mail queue', $dom));
                    } else {
                        LogUtil::registerError(__('An error occured - the mail could not be loaded. Maybe it was delivered or moved to error logfile in the time between creating the last overview and your action.', $dom));
                    }
                }
            }
   		  	return $render->pnFormRedirect(pnModURL('advMailer','admin','errorlog'));
        }

        // Should a mail be displayed?
        $id = (int) FormUtil::getPassedValue('id');
        if ($id > 0) {
            $result = DBUtil::selectObjectByID('advmailer_errorlog',$id);
            if (!$result) {
                LogUtil::registerError(__('An error occured - the mail could not be loaded. Maybe it was delivered or moved to error logfile in the time between creating the last overview and your action.', $dom));
       		  	return $render->pnFormRedirect(pnModURL('advMailer','admin','errorlog'));
            } else {
                $render->assign('mail', $result);
            }
        }

        // Should a mail be requeued for sending?
        $requeue = (int) FormUtil::getPassedValue('requeue');
        if ($requeue > 0) {
            if (!SecurityUtil::confirmAuthkey()) {
                LogUtil::registerAuthIDError();
            } else {
                $result = pnModAPIFunc('advMailer','admin','requeue',array('id' => $requeue));
                if (!$result) {
                    LogUtil::registerError(__('An error occured while trying to requeue mail', $dom));
                } else {
                    LogUtil::registerStatus(__('Mail was requeued with highest priority and new ID', $dom) . ' ' . $result);
                }
            }
            return $render->pnFormRedirect(pnModURL('advMailer','admin','errorlog'));
        }
        // Should all mails be requeued?
        $action = (string) FormUtil::getPassedValue('action');
        if (isset($action) && ($action == 'ra')) {
            if (!SecurityUtil::confirmAuthkey()) {
                LogUtil::registerAuthIDError();
            } else {
                $queue      = pnModAPIFunc('advMailer', 'admin', 'getErrorLog', array('limitoffset' => $mailerpager, 'numrows' => $numrows, 'sortmode' => $sortmode));
                $queuecount = pnModAPIFunc('advMailer', 'admin', 'getErrorLog', array('countonly' => 1));
                $c = 0;
                foreach ($queue as $item) {
                    $c++;
                    pnModAPIFunc('advMailer','admin','requeue',array('id' => $item['id']));
                }
                $max = 1000;
                if ($queuecount > $max) {
                    LogUtil::registerStatus(__('mails requeued - please repeat this action until all mails are requeued', $dom));
                } else {
                    LogUtil::registerStatus($c.' ' . __('Mails reqeued successfully', $dom));
                }
            }
            return $render->pnFormRedirect(pnModURL('advMailer', 'admin', 'errorlog'));
        }
        // Delete error log
        if (isset($action) && ($action == 'da')) {
            if (!SecurityUtil::confirmAuthkey()) {
                LogUtil::registerAuthIDError();
            } else {
                $result = DBUtil::truncateTable('advmailer_errorlog');
                if ($result) {
                    LogUtil::registerStatus(__('Error log deleted completely', $dom));
                } else {
                    LogUtil::registerError(__('An error occured while deleting error log', $dom));
                }
            }
            return $render->pnFormRedirect(pnModURL('advMailer', 'admin', 'errorlog'));
        }

        // Get mail queue and parameters
        $mailerpager = (int) FormUtil::getPassedValue('mailerpager');
        if ($mailerpager > 0) {
            $mailerpager--;
        } else {
            $mailerpager = 0;
        }
        $numrows    = 20;
        $sortmode   = (int) FormUtil::getPassedValue('sortmode');
        $queue      = pnModAPIFunc('advMailer', 'admin', 'getErrorLog', array('limitoffset' => $mailerpager, 'numrows' => $numrows, 'sortmode' => $sortmode));
        $queuecount = pnModAPIFunc('advMailer', 'admin', 'getErrorLog', array('countonly' => 1));
        $render->assign('queue',        $queue);
        $render->assign('queuecount',   $queuecount);
        $render->assign('numrows',      $numrows);
        $render->assign('authid',       SecurityUtil::generateAuthKey());
    }
}
