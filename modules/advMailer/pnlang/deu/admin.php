<?php
/**
 * @package      advMailer
 * @version      $Id$
 * @author       Florian Schie�l
 * @link         http://www.ifs-net.de
 * @copyright    Copyright (C) 2009
 * @license      http://www.gnu.org/copyleft/gpl.html GNU General Public License
 */

// error log
define('_ADVMAILER_ERRORLOG_EMPTY', 'Keine Eintr�ge im Fehlerprotokoll gefunden');
define('_ADVMAILER_FOLDER_COUNT', 'fehlgeschlagene Zustellungen');
define('_ADVMAILER_ERROR_LOG_ADMINISTRATION', 'advanced Mailer Fehlerprotokoll');
define('_ADVMAILER_TAB_FAIL_DATE', 'Datum letzter Zustellversuch');
define('_ADVMAILER_REQUEUE', 'wieder in Warteschlange einreihen');
define('_ADVMAILER_REQUEUE_ALL', 'Alle Mails neu in die Warteschlange einreihen');
define('_ADVMAILER_REALLY_DELETE_ALL', 'Bitte die L�schung aller im Protokoll vorhandener Fehlzustellungen best�tigen');
define('_ADVMAILER_ERROR_LOG_DELETED', 'Fehlerprotokoll vollst�ndig gel�scht');
define('_ADVMAILER_REQUEUE_SECCESSFUL', 'Emails wurden erneut in die Warteschlange eingereiht und aus dem Fehlerprotokoll gel�scht');
define('_ADVMAILER_REQUEUE_SECCESSFUL_REPEAT', 'Emails wurden in die Warteschlange neu eingestellt. Bitte diese Aktion wiederholen. Aufgrund der gro�en Menge an Emails konnten nicht alle Emails gleichzeitig neu eingestellt werden und der Link muss erneut bet�tigt werden!');
define('_ADVMAILER_ERROR_LOG_DELETION_ERROR', 'Fehler aufgetreten beim Versuch, aus dem Fehlerprotokoll zu l�schen');
define('_ADVMAILER_DELETE_ALL', 'Fehlerprotokoll komplett l�schen');
define('_ADVMAILER_REQUEUE_ERROR', 'Ein Fehler ist beim Versuch aufgetreten, die Email erneut in die Warteschlange zu stellen');
define('_ADVMAILER_MAIL_REQEUEUED', 'Email wurde mit hoher Priorit�t neu in die Warteschlange eingereiht');

// templates
define('_ADVMAILER_TEMPLATE_EXPLANATION', 'Hier k�nnen Templates (Vorlagen) verwendet werden. Diese bestehen aus Kopf- und Fu�teil und werden um den zu sendenden Text herum plaziert. Je nach Inhaltstyp werden verschiedene Vorlagen verwendet. Inhaltstypen sind formatierter Text (html) und reiner Text (text). Je nach zu verschickendem Email werden immer die richtigen Vorlagen verwendet.');
define('_ADVMAILER_DEV_OVERRIDE_OPTION', 'Modulentwickler k�nnen die Verwendung von Vorlagen �berschreiben. Bitte hierzu die Dokumentation der advMailer::userapi::sendmessage-Funktion lesen.');
define('_ADVMAILER_TPL_FOOTER_HTML', 'Fu�teil f�r HTML-Mails');
define('_ADVMAILER_TPL_FOOTER_TEXT', 'Fu�teil f�r Text-Mails');
define('_ADVMAILER_TPL_HEADER_HTML', 'Kopfteil f�r HTML-Mails');
define('_ADVMAILER_TPL_HEADER_TEXT', 'Kopfteil f�r Text-Mails');
define('_ADVMAILER_TPL_USAGE_HINTS', 'Bitte die f�r diese Seite konfigurierten Templates am besten im Theme-Ordner ablegen - diese �berschreiben dann automatisch die Beispieltemplates. Werden die Templates direkt im advMailer-Modulordner bearbeitet, k�nnen diese bei Modulupdates �berschrieben werden.');
define('_ADVMAILER_TEMPLATES_PREVIEW', 'Vorschau');
define('_ADVMAILER_NO_TPL_FOUND',  'Keine Vorlagendateien gefunden');
define('_ADVMAILER_TEMPLATES_TEXT_PREVIEW', 'Vorschau f�r Text-Mails');
define('_ADVMAILER_TEMPLATES_HTML_PREVIEW', 'Vorschau f�r HTML-Mails');
define('_ADVMAILER_TPL_TEXT_EXAMPLE', 'Dies ist ein Beispieltext der als Beispiel f�r einen Textk�rper der Email steht. Die Vorlagen werden vor und hinter diesem Text plaziert.');
define('_ADVMAILER_TPL_HTML_EXAMPLE', 'Dies ist <font color="red">ein Beispieltext der </font> als <b>Beispiel f�r einen Textk�rper</b> der <i>Email</i> steht. Die Vorlagen werden vor und hinter diesem Text plaziert.');
define('_ADVMAILER_TPL_TEXT_LINEBREAKS_HINT', 'Zeilenumbr�che werden direkt beim Versand hinzugef�gt. Die Einstellung zu Zeilenumbr�chen bei Text-Mails bitte im Administrationsbereich des Mailer-Moduls vornehmen.');

// queue handling
define('_ADVMAILER_QUEUESYSTEMINIT', 'Mittels SystemInit-Hook Mails im Hintergrund bei Seitenaufrufen senden lassen');
define('_ADVMAILER_QUEUECRONJOB', 'Mails mittels gesteuerten Cronjob-Aufruf intervallweise senden lassen');
define('_ADVMAILER_INSTANTDELIVERY', 'Mails ohne Verz�gerung sofort verschicken');
define('_ADVMAILER_QUEUE_HANDLING', 'Eingestellte Methode f�r die Nutzung von Warteschlangen beim Mailversand');
define('_ADVMAILER_QUEUE_FREQUENCY', 'Anzahl an Mails, welche bei einem Aufruf maximal verschickt werden soll');
define('_ADVMAILER_QUEUE_SETTINGS', 'Erweiterte Einstellung f�r die Nutzung des Warteschlangensystems');
define('_ADVMAILER_QUEUE_CRON_PWD', 'Passwort f�r den Aufruf der Versende-URL mittels Cronjob');
define('_ADVMAILER_QUEUE_MODE_EXPLANATION', 'Bei sehr hohem Emailaufkommen oder zur teils deutlichen Verbesserung des Seitenaufbaus bei stark interaktiven Seiten empfiehlt sich die Nutzung von Warteschlangensystemen. So entstehen beim Laden von Seiten keine Wartezeiten f�r den Endnutzer, wenn im Hintergrund z.B. durch Benutzeraktionen viele Emailbenachrichtigungen (Muster-Anwendungsfall: Forum) verschickt werden m�ssen. Der Cronjob-Aufruf hat als URL-Aufruf zu erfolgen und kann bequem durch Eingabe der URL mit dem Passwort getestet werden.');
define('_ADVMAILER_NO_CRON_PWD_STORED_YET', 'Bitte ein Passwort f�r den Cronjob-Aufruf festlegen - sonst ist der Service nicht nutzbar!');
define('_ADVMAILER_CRON_JOB_URL_CALL', 'Folgende URL muss zeitgesteuert aufgerufen werden um eine Versandwelle zu starten');

// queue
define('_ADVMAILER_QUEUE_ADMINISTRATION', 'Warteschlangen-Verwaltung');
define('_ADVMAILER_QUEUE_EXPLANATION', 'Hier sind alle sich aktuell in der Warteschlange befindlichen Mails aufgelistet. Durch Klick auf den Betreff kann der Inhalt eingesehen werden. Achtung bei Aktionen: Ggf. ist das Mail bei einer ausgew�hlten Aktion nicht mehr verf�gbar, wenn es im Zeitraum der �bersichtserstellung und dem Klick zur Aktion im Hintergrund bereits erfolgreich versendet wurde.');
define('_ADVMAILER_TAB_NR', 'Mail-ID');
define('_ADVMAILER_QUEUE_COUNT', 'Mails in der Warteschlange');
define('_ADVMAILER_TAB_TO', 'Empf�nger');
define('_ADVMAILER_TAB_STATUS', 'Status');
define('_ADVMAILER_TAB_PRIORITY', 'Priorit�t');
define('_ADVMAILER_TAB_DATE', 'Versanddatum');
define('_ADVMAILER_TAB_TITLE', 'Betreff');
define('_ADVMAILER_TAB_ACTION', 'Aktion');
define('_ADVMAILER_NOW', 'jetzt');
define('_ADVMAILER_STATUS_RETRYLAST', 'Zustellung gescheitert, Warten auf letzten Versuch');
define('_ADVMAILER_DELETE', 'l�schen');
define('_ADVMAILER_STATUS_RETRY', 'Zustellung gescheitert, Warten auf weiteren Versuch');
define('_ADVMAILER_STATUS_WAITING', 'Warten auf Zustellung');
define('_ADVMAILER_MAIL_LOAD_ERROR', 'Es ist ein Fehler aufgetreten. M�glicherweise ist die ausgew�hlte Mail bereits im Hintergrund erfolgreich verschickt oder im Fehlerprotokoll gespeichert worden.');
define('_ADVMAILER_MAIL_DELETED', 'Die Mail wurde erfolgreich und vollst�ndig gel�scht und damit nicht zugestellt');
define('_ADVMAILER_MAIL_VIEW', 'Inhalt der Email');
define('_ADVMAILER_SEND_NOW', 'jetzt senden');
define('_ADVMAILER_SEND_ERROR', 'Beim manuellen Sendeversuch ist ein Fehler aufgetreten');
define('_ADVMAILER_MAIL_SENT', 'Die Mail wurde erfolgreich verschickt und aus der Warteschlange entfernt');
define('_ADVMAILER_MESSAGE_MOVED_ERROR_LOG', 'Nachricht wurde ins Fehlerprotokoll verschoben - Zustellung wurde abgebrochen!');
define('_ADVMAILER_QUEUE_EMPTY', 'Warteschlange leer - keine Mail zur Zustellung gespeichert.');

// general
define('_ADVMAILER_ERRORLOG', 'Fehlerprotokoll');
define('_ADVMAILER_TEMPLATES', 'Vorlagen / Templates');
define('_ADVMAILER_MAILQUEUE', 'Warteschlange');
define('_ADVMAILER','advMailer - das umfangreichere Mailer-Modul f�r Zikula');

// navigation
define('_ADVMAILER_TESTCONFIG', 'Konfiguration testen');


// general
define('_ADVMAILER_GENERALSETTINGS', 'Advanced Mailer - Konfiguration der Haupteinstellungen');
define('_ADVMAILER_POWERED_BY', 'powered by');
