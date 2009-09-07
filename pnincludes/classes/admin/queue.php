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
 * mail queue management handler class
 * @author Florian Schie�l
 */

class advmailer_queueHandler
{
    function initialize(&$render)
    {
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
                $obj = DBUtil::selectObjectByID('advmailer_queue',$delete);
                if (!$obj) {
                    LogUtil::registerError(_ADVMAILER_MAIL_LOAD_ERROR);
                } else {
                    $result = DBUtil::deleteObject($obj,'advmailer_queue');
                    if ($result) {
                        LogUtil::registerStatus(_ADVMAILER_MAIL_DELETED);
                    } else {
                        LogUtil::registerError(_ADVMAILER_MAIL_LOAD_ERROR);
                    }
                }
            }
   		  	return $render->pnFormRedirect(pnModURL('advMailer','admin','queue'));
        }
        
        // Should a mail be displayed?
        $id = (int) FormUtil::getPassedValue('id');
        if ($id > 0) {
            $result = DBUtil::selectObjectByID('advmailer_queue',$id);
            if (!$result) {
                LogUtil::registerError(_ADVMAILER_MAIL_LOAD_ERROR);
       		  	return $render->pnFormRedirect(pnModURL('advMailer','admin','queue'));
            } else {
                $render->assign('mail', $result);
            }
        }
        
        // Should a mail be sent manually
        $send = (int) FormUtil::getPassedValue('send');
        if ($send > 0) {
            if (!SecurityUtil::confirmAuthkey()) {
                LogUtil::registerAuthIDError();
            } else {
                $result = pnModAPIFunc('advMailer','admin','sendQueue',array('id' => $send));
                if (!$result) {
                    LogUtil::registerError(_ADVMAILER_SEND_ERROR);
                } else {
                    LogUtil::registerStatus(_ADVMAILER_MAIL_SENT);
                }
            }
            return $render->pnFormRedirect(pnModURL('advMailer','admin','queue'));
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
        $queue      = pnModAPIFunc('advMailer','admin','getQueue',array('limitoffset' => $mailerpager, 'numrows' => $numrows, 'sortmode' => $sortmode));
        $queuecount = pnModAPIFunc('advMailer','admin','getQueue',array('countonly' => 1));
        $render->assign('queue',        $queue);
        $render->assign('queuecount',   $queuecount);
        $render->assign('numrows',      $numrows);
        $render->assign('authid',       SecurityUtil::generateAuthKey());
    }
}