/**
 * @package      advMailer
 * @version      $Id:  $
 * @author       Florian Schieﬂl
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2009
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */



To enable advanced mailer the following lines have to be added at the absolute beginning of the
Mailer_userapi_sendmessage() function in file system/Mailer/pnuserapi.php:




function Mailer_userapi_sendmessage($args)
{
    // Check for installed advanced Mailer module
    $processed = (int) $args['processed'];
    if (pnModAvailable('advMailer') && ($processed != 1)) {
        // Email not yet passed through advMailer - pass through advMailer and return advMailers exit code
        $result = pnModApiFunc('advMailer','user','sendmessage',$args);
        return $result;
    }
