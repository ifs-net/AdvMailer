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
 * get mail status
 *
 * @author Florian Schießl
 * @params  int args['status']        mail status
 * @return array array of admin links
 */
function smarty_function_mailstatus($params, &$smarty)
{
    $dom = ZLanguage::getModuleDomain('advMailer');
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
            return __('waiting for delivery', $dom);
        case 1:
            return __('failed... waiting for retry', $dom);
        case 2:
            return __('failed... waiting for last try', $dom);
        default:
            return 'unknown';
    }
}