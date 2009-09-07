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
 * initialise the module
 *
 * @author Florian Schießl
 * @return bool true if successful, false otherwise
 */
function advMailer_init()
{
	// install system init hook
    if (!pnModRegisterHook('zikula', 'systeminit', 'API', 'advMailer', 'user', 'systeminit')) {
        LogUtil::registerError(_ERRORCREATINGHOOK);
        return false;
    }

    // Create tables
  	$tables = array (
  		'advmailer_queue',
  		'advmailer_errorlog'
		  );
	foreach ($tables as $table) {
		if (!DBUtil::createTable($table)) {
		  	return false;
		}
	}

	// Create indexes
    if (!DBUtil::createIndex('priorityindex', 'advmailer_queue', array('priority'))) {
        LogUtil::registerError(_CREATEINDEXFAILED);
        return false;
    }

    // Set default module variables
    pnModSetVar('advMailer', 'mailertype', 1);
    pnModSetVar('advMailer', 'queuetype', 1);
    pnModSetVar('advMailer', 'queuecronpwd', rand(1000000000,9999999999));
    pnModSetVar('advMailer', 'queuefrequency', 20);

    // Initialisation successful
    return true;
}

/**
 * upgrade the module from an old version
 *
 * @author Florian Schießl
 * @param int $oldversion version to upgrade from
 * @return bool true if successful, false otherwise
 */
function advMailer_upgrade($oldversion)
{
    // Upgrade dependent on old version number
    switch($oldversion) {
        case '1.0':
        default:
    }
    // Update successful
    return true;
}

/**
 * delete the module
  *
 * @author Florian Schießl
 * @return bool true if successful, false otherwise
 */
function advMailer_delete()
{
    // delete the system init hook
    $oldqueuetype = (int) pnModGetVar('advMailer','queuetype');
    if ($oldqueuetype == 3) {
        // Disable hook now
        pnModAPIFunc('Modules', 'admin', 'disablehooks', array('callermodname' => 'zikula', 'hookmodname' => 'advMailer'));
    }
    if (!pnModUnregisterHook('zikula', 'systeminit', 'API', 'advMailer', 'user', 'systeminit')) {
        LogUtil::registerError(_ERRORDELETINGHOOK);
        return false;
    }
    // Delete tables
  	$tables = array (
  		'advmailer_queue',
  		'advmailer_errorlog'
		  );
	foreach ($tables as $table) {
		if (!DBUtil::dropTable($table)) {
		  	return false;
		}
	}
    // Delete any module variables
    pnModDelVar('advMailer');

    // Deletion successful
    return true;
}
