<?php
/**
 * @package      advMailer
 * @version      $Id$
 * @author       Florian Schießl
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2009
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

// error log
define('_ADVMAILER_ERRORLOG_EMPTY', 'No mails stored in the error logfile');
define('_ADVMAILER_FOLDER_COUNT', 'failed deliveries');
define('_ADVMAILER_ERROR_LOG_ADMINISTRATION', 'Mail error log view and administration');
define('_ADVMAILER_TAB_FAIL_DATE', 'date of last try');
define('_ADVMAILER_REQUEUE', 'requeue');
define('_ADVMAILER_REQUEUE_ALL', 'Requeue all mails');
define('_ADVMAILER_REALLY_DELETE_ALL', 'Please confirm the deletion of all mails of the error log');
define('_ADVMAILER_ERROR_LOG_DELETED', 'Error log deleted completely');
define('_ADVMAILER_REQUEUE_SECCESSFUL', 'Mails reqeued successfully');
define('_ADVMAILER_REQUEUE_SECCESSFUL_REPEAT', 'mails requeued - please repeat this action until all mails are requeued');
define('_ADVMAILER_ERROR_LOG_DELETION_ERROR', 'An error occured while deleting error log');
define('_ADVMAILER_DELETE_ALL', 'Delete the error log');
define('_ADVMAILER_REQUEUE_ERROR', 'An error occured while trying to requeue mail');
define('_ADVMAILER_MAIL_REQEUEUED', 'Mail was requeued with highest priority and new ID');

// templates
define('_ADVMAILER_TEMPLATE_EXPLANATION', 'You can create templates for all emails that will be sent out that are customized for your site. There are two types of emails goiing out: HTML and plain text. There are some example templates in the Mailer\'s template folder. There are four templates - two for HTML and two for plain text mails. Always the right template is chosen - depending on the mail type. The templates have to be named the following way');
define('_ADVMAILER_DEV_OVERRIDE_OPTION', 'Module developers can override the usage of these templates - if you are a developer, please read the function\'s documentation! Pleas also mention that template changes will not affect all mails that are already in the mail queue and waiting for delivery!');
define('_ADVMAILER_TPL_FOOTER_HTML', 'Footer for HTML mails');
define('_ADVMAILER_TPL_FOOTER_TEXT', 'Footer for plain text mails');
define('_ADVMAILER_TPL_HEADER_HTML', 'Header for HTML mails');
define('_ADVMAILER_TPL_HEADER_TEXT', 'Header for plain text mails');
define('_ADVMAILER_TPL_USAGE_HINTS', 'Please use theme based template overriding and clear your rendering cache after changing the templates. The templates will be used as they are seen below.');
define('_ADVMAILER_TEMPLATES_PREVIEW', 'Preview');
define('_ADVMAILER_NO_TPL_FOUND',  'No templates found');
define('_ADVMAILER_TEMPLATES_TEXT_PREVIEW', 'Preview for plain text mails');
define('_ADVMAILER_TEMPLATES_HTML_PREVIEW', 'Preview for html mails');
define('_ADVMAILER_TPL_TEXT_EXAMPLE', 'This is some default text that will be replaced by your email\'s content later whenever a mail is being sent out!');
define('_ADVMAILER_TPL_HTML_EXAMPLE', 'This is <font color="red">some default text</font> that will be <b>replaced</b> by your <i>email\'s content</i> later whenever a mail is being sent out!<hr />Have fun! ;-)');
define('_ADVMAILER_TPL_TEXT_LINEBREAKS_HINT', 'Depending on your personal site mailer configuration linebreaks will be added before sending the email. These linebreaks can not be seen here - please send a test email to an own email account for testing this.');

// queue handling
define('_ADVMAILER_QUEUESYSTEMINIT', 'Send mails in background using SystemInit hooks');
define('_ADVMAILER_QUEUECRONJOB', 'Send mails via cronjob');
define('_ADVMAILER_INSTANTDELIVERY', 'Send mails immediately');
define('_ADVMAILER_QUEUE_HANDLING', 'Default method for queue handling');
define('_ADVMAILER_QUEUE_FREQUENCY', 'Number of mails that should be sent with each site or cronjob call');
define('_ADVMAILER_QUEUE_SETTINGS', 'Settings for mail queue handling');
define('_ADVMAILER_QUEUE_CRON_PWD', 'Password for cronjob call');
define('_ADVMAILER_QUEUE_MODE_EXPLANATION', 'Queue modes can make sense of your site is a site with high outgoing mail traffic. Mails are put in a queue and sent mail by mail in the background. Mails can be sent with each site call that is made by any user. Mail sending will be handled in the background. You can choose between to different queue modes: Mails can be sent with each site call (a user or a visitor will make your emails to be sent without seeing this) or you can use a given URL for a cronjob service. Just call the cronjob URL with a password (you can try it out in your browser entering the url) you have specified and this will send the number of mails you specified in this configuration area.');
define('_ADVMAILER_NO_CRON_PWD_STORED_YET', 'Please set a cronjob password to get the URL for this service');
define('_ADVMAILER_CRON_JOB_URL_CALL', 'Call this URL for email delivery regularly');

// queue
define('_ADVMAILER_QUEUE_ADMINISTRATION', 'Mail queue view and administration');
define('_ADVMAILER_QUEUE_EXPLANATION', 'Here all mails from the mail queue are listed. Please do not forget that mails might be sent instantly after they were listed here. You can access the mail if you click on the title.');
define('_ADVMAILER_TAB_NR', 'Mail ID');
define('_ADVMAILER_QUEUE_COUNT', 'mails in queue');
define('_ADVMAILER_TAB_TO', 'recipient');
define('_ADVMAILER_TAB_STATUS', 'status');
define('_ADVMAILER_TAB_PRIORITY', 'priority');
define('_ADVMAILER_TAB_DATE', 'planed date');
define('_ADVMAILER_TAB_TITLE', 'mail subject');
define('_ADVMAILER_TAB_ACTION', 'action');
define('_ADVMAILER_NOW', 'now');
define('_ADVMAILER_STATUS_RETRYLAST', 'failed... waiting for last try');
define('_ADVMAILER_DELETE', 'delete');
define('_ADVMAILER_STATUS_RETRY', 'failed... waiting for retry');
define('_ADVMAILER_STATUS_WAITING', 'waiting for delivery');
define('_ADVMAILER_MAIL_LOAD_ERROR', 'An error occured - the mail could not be loaded. Maybe it was delivered or moved to error logfile in the time between creating the last overview and your action.');
define('_ADVMAILER_MAIL_DELETED', 'The mail was successfully removed and deleted from the mail queue');
define('_ADVMAILER_MAIL_VIEW', 'Mail content');
define('_ADVMAILER_SEND_NOW', 'send manually');
define('_ADVMAILER_SEND_ERROR', 'An error occured while trying to send the selected email manualy');
define('_ADVMAILER_MAIL_SENT', 'The email was sent successfully and removed from the mail queue');
define('_ADVMAILER_MESSAGE_MOVED_ERROR_LOG', 'Message was moved to error log - delivery cancelled');
define('_ADVMAILER_QUEUE_EMPTY', 'Mail queue emtpy - nothing to display');

// general
define('_ADVMAILER_ERRORLOG', 'Error-log');
define('_ADVMAILER_TEMPLATES', 'Templates');
define('_ADVMAILER_MAILQUEUE', 'Mail-Queue');
define('_ADVMAILER','The advanced Zikula Mailer module');

// navigation
define('_ADVMAILER_TESTCONFIG', 'Test configuration');


// general
define('_ADVMAILER_GENERALSETTINGS', 'Advanced Mailer settings');
define('_ADVMAILER_POWERED_BY', 'powered by');
