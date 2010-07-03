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
 * @author Florian SchieÃl
 * @params  object  args['mail']        mail as object / array
 * @params  string  args['item']        item to extract
 * @return array array of admin links
 */
function smarty_function_extractmail($params, &$smarty)
{
    $dom = ZLanguage::getModuleDomain('advMailer');
    $mail = unserialize($params['mail']);
    if ((!$mail) | !isset($mail) || (!(count($mail) > 0))) {
        return __('param mail missing', $dom);
    }

    $item = (string) $params['item'];
    if (!isset($item) || ($item == '')) {
        return __('item not found', $dom);
    }

    return $mail[$item];
}