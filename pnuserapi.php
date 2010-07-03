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
 * API function to queue  email message
 * @author Florian Schießl
 * @param   int             args['notemplates']         optional, for modules sending emails without predefined templates
 * @param   int             args['priority']            optional, highest priority 1, lowest 10, default 5
 * @param   int             args['noqueue']             optional, do not use queue even if configured
 * @param   string          args['date']                optional, date when email should be started to deliver (only if mail queuing mode is enabled in admin backend). Format: 0000-00-00 00:00:00
 *
 * @return bool true if successful, false otherwise
 */
function advMailer_userapi_sendmessage($args)
{
    // If queue handling is activated we will just put the function call into the queue and process this later
    $noqueue    = (int) $args['noqueue'];
    $queuetype  = pnModGetVar('advMailer', 'queuetype');

    // Add template before sending email
    $notemplates = (int) $args['notemplates'];
    $templated   = (int) $args['templated'];
    if (($notemplates != 1) && ($templated != 1)) {
        if ($args['html']) {
            $mailtype = 'html';
        } else {
            $mailtype = 'text';
        }
        $args['body'] = pnModAPIFunc('advMailer', 'admin', 'applyTemplate', array('content' => $args['body'], 'type' => $mailtype));
        $args['templated'] = 1;
    }

    // Put mail into queue or send mail now
    if (($queuetype > 1) && ($noqueue != 1)) {
        // Get priority of email and set to default value if no priority was specified
        $priority = (int) $args['priority'];
        if ($priority == 0) {
            $priority = 5;
        }
        // Get date for first delivery
        $date = $args['date'];
        if (isset($date)) {
            // Create timestamp
            $date = (int) strtotime($date);
            if (!($date > time())) {
                // No valid date or date already passed - DB will use DB field default value (0000-00-00 00:00:00) for instant delivery
                unset($date);
            } else {
                // Set new date this way to be sure to have right format for Database
                $date = date("Y-m-d H:i:s", $date);
            }
        }
        // Insert ob ject into queue
        $obj = array(
            'priority'  => $priority,
            'content'   => serialize($args),
            'date'      => $date
          );
        $result = DBUtil::insertObject($obj, 'advmailer_queue');
        if ($result) {
            return true;
        } else {
            return false;
        }

    } else {
        // Add processed flag
        $args['processed'] = 1;
        $result = pnModAPIFunc('Mailer', 'user', 'sendmessage', $args);
        return $result;
    }
}

/**
 * Systeminit function is needed to send mails with each site call
 * @return  void
 */
function advMailer_userapi_systeminit()
{
    // We will not send mails whenever the actual user is using a backend
    // Maybe the admin has to fix some errors
    $type = (string) FormUtil::getPassedValue('type');
    $type = strtolower($type);
    if (!isset($type) || ($type != 'admin')) {
        // Calling sendQueue without parameters lets the mails be sent out
        pnModAPIFunc('advMailer', 'admin', 'sendQueue');
    }
    // Nothing to return - otherwise errors would be displayed for the actual user
    return;
}

/**
 * Replace links in existing text and make real links of it
 * @param   $args['text']       string      text to replace
 * @return  string
 */
function advMailer_userapi_replaceLinks($args) {
    $replacement = preg_replace('/([\w]+:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/i','<a href="'.urlencode("$1").'" rel="nofollow">$1</a>', $args['text']);
    return $replacement;
}