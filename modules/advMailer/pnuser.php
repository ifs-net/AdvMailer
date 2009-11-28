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
 * send queued mails
 * This function can be called by cronjob url services and
 * will send X mails that are in the mail queue.
 *
 * @author Florian Schießl
 * @return string
 */
function advMailer_user_cron()
{
    $dom = ZLanguage::getModuleDomain('advMailer');
    // cron enabled?
    $queuetype = pnModGetVar('advMailer', 'queuetype');
    if ($queuetype != 2) {
        print __('Cron disabled', $dom);
        return true;
    }
    // security check
    $pwd = (string) FormUtil::getPassedValue('pwd');
    $queuecronpwd = pnModGetVar('advMailer', 'queuecronpwd');
    if (($pwd == $queuecronpwd) && ($pwd != '') ) {
        print __('Authentication correct...', $dom);
        print __('Start of mail delivery...', $dom);
        // No we will get the first queuefrequency entries of the queue sorted by priority
        $queuefrequency = (int)pnModGetVar('advMailer','queuefrequency');
        $queue = pnModAPIFunc('advMailer','admin','getQueue',array('sortmode' => 4, 'numrows' => $queuefrequency, 'skipfuture' => 1));
        if (!$queue) {
            echo __('No mails in the queue', $dom);
        } else {
            $count = count($queue);
            // Send mail from queue
            foreach ($queue as $item) {
                $result = pnModAPIFunc('advMailer', 'admin', 'sendQueue', array('id' => $item['id']));
                if ($result) {
                    print __('Send ID', $dom).': ['.$item['id'].' ('.($item['try']+1).')]';
                } else {
                    print __('Sent Error ID', $dom).': ['.$item['id'].'('.($item['try']+1).')]';
                }
            }
        }
    } else {
        print __('Wrong password', $dom);
    }
    return true;
}
