<?php
/**
 * @package      advMailer
 * @version      $Id:  $
 * @author       Florian Schießl
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2009
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

/**
 * get available admin panel links
 *
 * @author Florian Schießl
 * @params  object  args['mail']        mail as object / array
 * @return array array of admin links
 */
function smarty_function_showmail($params, &$smarty)
{
	$mail = unserialize($params['mail']);
	if ((!$mail) | !isset($mail) || (!(count($mail) > 0))) {
        return 'param mail missing';
    }
    $notemplates = (int) $mail['notemplates'];
    // return mail body
    if ($mail['html'] == 1) {
        $body = $mail['body'];
        if ($notemplates != 1) {
            $body = pnModAPIFunc('advMailer','admin','applyTemplate',array('content' => $body, 'type' => 'html'));
        }
    } else {
        $body = $mail['body'];
        if ($notemplates != 1) {
            $body = pnModAPIFunc('advMailer','admin','applyTemplate',array('content' => $body, 'type' => 'text'));
        }
        $body = '<pre style="font-family: Courier, Courier New;">'.$body.'</pre>';
    }
    return $body;
}