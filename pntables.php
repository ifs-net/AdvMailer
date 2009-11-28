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
 * initialise tables
 * @author Florian Schießl
 * @return bool true if successful, false otherwise
 */
function advMailer_pntables()
{
    // Initialise table array
    $table = array();

	// Get Table Prefix
    $mailer_queue    = DBUtil::getLimitedTablename('advmailer').'_queue';
    $mailer_log      = DBUtil::getLimitedTablename('advmailer').'_log';
    $mailer_errorlog = DBUtil::getLimitedTablename('advmailer').'_errorlog';

    $table['advmailer_queue']    = $mailer_queue;
	$table['advmailer_errorlog'] = $mailer_errorlog;

    // Columns for tables
    // Table for mail queue
    $table['advmailer_queue_column'] = array (
    			'id'         => 'id',
    			'try'        => 'try',
    			'priority'   => 'priority',
    			'date'       => 'date',
    			'content'    => 'content'
    			);
    $table['advmailer_queue_column_def'] = array (
    			'id'         => "I AUTOINCREMENT PRIMARY",
    			'try'        => "I(1) NOTNULL DEFAULT 0",
    			'priority'   => "I(1) NOTNULL DEFAULT 5",
    			'date'       => "T NOTNULL DEFAULT 0",
    			'content'    => "XL NOTNULL'"
    			);
    // Table for error log
    $table['advmailer_errorlog_column'] = array (
    			'id'         => 'id',
    			'priority'   => 'priority',
    			'date'       => 'date',
    			'content'    => 'content'
    			);
    $table['advmailer_errorlog_column_def'] = array (
    			'id'         => "I PRIMARY",
    			'priority'   => "I(1) NOTNULL DEFAULT 5",
    			'date'       => "T NOTNULL DEFAULT 0",
    			'content'    => "XL NOTNULL'"
    			);

	// Return table information
	return $table;
}