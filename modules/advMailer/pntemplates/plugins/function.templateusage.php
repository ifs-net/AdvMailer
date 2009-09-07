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
 * get available admin panel links
 *
 * @author Florian Schie�l
 * @params  object  args['mail']        mail as object / array
 * @params  string  args['item']        item to extract
 * @return array array of admin links
 */
function smarty_function_templateusage($params, &$smarty)
{
	$mail = unserialize($params['mail']);
	if ((!$mail) | !isset($mail) || (!(count($mail) > 0))) {
        return 'param mail missing';
    }
	$notemplates = (int) $mail['notemplates'];
    if ($notemplates == 1) {
        return _NO;
    } else {
        return _YES;
    }

	return $mail[$item];
}