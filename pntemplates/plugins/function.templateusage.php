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
 * get available admin panel links
 *
 * @author Florian Schießl
 * @params  object  args['mail']        mail as object / array
 * @params  string  args['item']        item to extract
 * @return array array of admin links
 */
function smarty_function_templateusage($params, &$smarty)
{
    $dom = ZLanguage::getModuleDomain('advMailer');
	$mail = unserialize($params['mail']);
	if ((!$mail) | !isset($mail) || (!(count($mail) > 0))) {
        return 'param mail missing';
    }
	$notemplates = (int) $mail['notemplates'];
    if ($notemplates == 1) {
        return __('No', $dom);
    } else {
        return __('Yes', $dom);
    }

	return $mail[$item];
}