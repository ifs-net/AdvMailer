<?php
/**
 * @package      advMailer
 * @version      $Id$
 * @author       Florian Schie�l
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2009
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

/**
 * send queued mails
 * This function can be called by cronjob url services and
 * will send X mails that are in the mail queue.
 *
 * @author Florian Schie�l
 * @return string
 */
function advMailer_user_cron()
{
    // cron enabled?
    $queuetype = pnModGetVar('advMailer','queuetype');
    if ($queuetype != 2) {
        print _ADVMAILER_CRON_DISABLED;
        return true;
    }
    // security check
    $pwd = (string) FormUtil::getPassedValue('pwd');
    $queuecronpwd = pnModGetVar('advMailer', 'queuecronpwd');
    if (($pwd == $queuecronpwd) && ($pwd != '') ) {
        print _ADVMAILER_AUTHENTICATION_CORRENCT.'...';
        print _ADVMAILER_CRONJOB_START.'...';
        // No we will get the first queuefrequency entries of the queue sorted by priority
        $queuefrequency = (int)pnModGetVar('advMailer','queuefrequency');
        $queue = pnModAPIFunc('advMailer','admin','getQueue',array('sortmode' => 4, 'numrows' => $queuefrequency, 'skipfuture' => 1));
        if (!$queue) {
            echo _ADVMAILER_NO_MAILS_IN_QUEUE;
        } else {
            $count = count($queue);
            // Send mail from queue
            foreach ($queue as $item) {
                $result = pnModAPIFunc('advMailer','admin','sendQueue',array('id' => $item['id']));
                if ($result) {
                    print _ADVMAILER_SENT_ID.': ['.$item['id'].' ('.($item['try']+1).')]';
                } else {
                    print _ADVMAILER_SENT_ERROR_ID.': ['.$item['id'].'('.($item['try']+1).')]';
                }
            }
        }
    } else {
        print _ADVMAILER_CRONJOB_WRONG_PWD;
    }
    return true;
}