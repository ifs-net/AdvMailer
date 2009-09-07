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
 * get mail status
 *
 * @author Florian Schie�l
 * @params  int args['status']        mail status
 * @return array array of admin links
 */
function smarty_function_mailstatus($params, &$smarty)
{
    // Get parameters
	$status = $params['status'];
	if (!isset($status) || (!($status >= 0))) {
        return "status error";
    }

    // Cast to int
    $status = (int) $status;

    // Return status code
    switch($status) {
        case 0:
            return _ADVMAILER_STATUS_WAITING;
        case 1:
            return _ADVMAILER_STATUS_RETRY;
        case 2:
            return _ADVMAILER_STATUS_RETRYLAST;
        default:
            return 'unknown';
    }
}