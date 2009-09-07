<?php
/**
 * @package      advMailer
 * @version      $Id:  $
 * @author       Florian Schießl
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2009
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

$modversion['name']           = 'advMailer';
$modversion['displayname']    = 'advMailer';
$modversion['description']    = 'Advanced Mailer management: This module gives more functionallity to the regular zikula Mailer module';
$modversion['version']        = '1.0';
$modversion['credits']        = 'pndocs/credits.txt';
$modversion['help']           = 'pndocs/help.txt';
$modversion['changelog']      = 'pndocs/changelog.txt';
$modversion['license']        = 'pndocs/license.txt';
$modversion['official']       = 1;
$modversion['author']         = 'Florian Schießl';
$modversion['contact']        = 'http://www.ifs-net.de';
$modversion['securityschema'] = array('advMailer::' => '::');

// module dependencies
$modversion['dependencies'] = array(
	array(	'modname'    => 'Mailer',
			'minversion' => '1.2', 'maxversion' => '',
            'status'     => PNMODULE_DEPENDENCY_REQUIRED)
            );
            