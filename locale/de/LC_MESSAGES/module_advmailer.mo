��    ]           �      �     �  e   �     _  �   x  )   	  -   D	  @   r	     �	  *   �	     �	     �	  !   
     /
  �   D
  *     #   B     f     z     �     �  	   �     �     �            �   7     �     �  &     %   *  "   P  2   s  
   �     �  3   �  �                 $        >  B   Q     �  9   �  =   �  �   &     �     �     �  �  �     �     �     �  /   �     �                 )     J  	   d     n  !   �  ?   �  A   �  �   %  p   �     A     V     ^     m  �  q  ,        8  	   ?     I     Z     a     s     �     �     �     �  G   �     !     %     8  
   D     O  	   X     b     j     x       �  �     E  v   U  6   �  �     D   �  Y   �  6   E     |  Q   �     �     �  I     !   X  �   z  %   #  "   I     l     �  &   �  *   �     �           )      D      _   h  z   	   �!     �!     �!  ;   "     ["  E   u"     �"  [   �"  N   %#  �   t#     $  "   $  +   3$     _$  G   ~$  8   �$  O   �$  [   O%    �%     �&     �&     �&  �  �&  /   �(     )  ,   8)  O   e)  G   �)  (   �)     &*  A   4*     v*     �*     �*  8   �*  J   �*  P   A+  �   �+  �   G,     �,     �,     �,     -  Z  -  $   b.     �.  	   �.  !   �.     �.     �.  2   �.  3   /     G/     ^/     f/  �   �/     h0     n0     �0  
   �0  
   �0  
   �0  !   �0     �0     �0     �0     [              =   *   	              S   "   N       ]   9   '   <   -      G         :      4                M           3       F       /       ,         R   Z   
       O      D   ?   W   C             H   1          J                 #   0      T       ;             2       (   8       A                 K              Y   &   X   6      I          )   7       @   %   B   L   \      .   P       $   5          Q          E   !   V                   +   >           U    Advanced Mailer Advanced Mailer management: This module gives more functionallity to the regular zikula Mailer module Advanced Mailer settings An error occured - the mail could not be loaded. Maybe it was delivered or moved to error logfile in the time between creating the last overview and your action. An error occured while deleting error log An error occured while trying to requeue mail An error occured while trying to send the selected email manualy Authentication correct... Call this URL for email delivery regularly Cancel Cron disabled Default method for queue handling Delete the error log Depending on your personal site mailer configuration linebreaks will be added before sending the email. These linebreaks can not be seen here - please send a test email to an own email account for testing this. Donate and support my software development Done! Module configuration updated. Error creating hook Error deleting hook Error log deleted completely Error! Index creation failed. Error-log Footer for HTML mails Footer for plain text mails Header for HTML mails Header for plain text mails Here all mails from the mail queue are listed. Please do not forget that mails might be sent instantly after they were listed here. You can access the mail if you click on the title. Mail ID Mail content Mail error log view and administration Mail queue emtpy - nothing to display Mail queue view and administration Mail was requeued with highest priority and new ID Mail-Queue Mails reqeued successfully Message was moved to error log - delivery cancelled Module developers can override the usage of these templates - if you are a developer, please read the function's documentation! Pleas also mention that template changes will not affect all mails that are already in the mail queue and waiting for delivery! No No mails in the queue No mails stored in the error logfile No templates found Number of mails that should be sent with each site or cronjob call Password for cronjob call Please confirm the deletion of all mails of the error log Please set a cronjob password to get the URL for this service Please use theme based template overriding and clear your rendering cache after changing the templates. The templates will be used as they are seen below. Preview Preview for html mails Preview for plain text mails Queue modes can make sense of your site is a site with high outgoing mail traffic. Mails are put in a queue and sent mail by mail in the background. Mails can be sent with each site call that is made by any user. Mail sending will be handled in the background. You can choose between to different queue modes: Mails can be sent with each site call (a user or a visitor will make your emails to be sent without seeing this) or you can use a given URL for a cronjob service. Just call the cronjob URL with a password (you can try it out in your browser entering the url) you have specified and this will send the number of mails you specified in this configuration area. Requeue all mails Send ID Send mails immediately Send mails in background using SystemInit hooks Send mails via cronjob Sent Error ID Settings Settings for mail queue handling Start of mail delivery... Templates Test configuration The Advanced Zikula Mailer module The email was sent successfully and removed from the mail queue The mail was successfully removed and deleted from the mail queue This is <font color="red">some default text</font> that will be <b>replaced</b> by your <i>email's content</i> later whenever a mail is being sent out!<hr />Have fun! ;-) This is some default text that will be replaced by your email's content later whenever a mail is being sent out! Update Configuration Version Wrong password Yes You can create templates for all emails that will be sent out that are customized for your site. There are two types of emails going out: HTML and plain text. There are some example templates in the Mailer's template folder. There are four templates - two for HTML and two for plain text mails. Always the right template is chosen - depending on the mail type. The templates have to be named the following way You like the module and it's usefull for you action advmailer date of last try delete failed deliveries failed... waiting for last try failed... waiting for retry item not found mail subject mails in queue mails requeued - please repeat this action until all mails are requeued now param mail missing planed date powered by priority recipient requeue send manually status waiting for delivery Project-Id-Version: advMailer 1.1
Report-Msgid-Bugs-To: 
POT-Creation-Date: 2009-11-27 23:41+0100
PO-Revision-Date: 
Last-Translator: Axel Guckelsberger <info@guite.de>
Language-Team: Axel Guckelsberger <info@guite.de>
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
Plural-Forms: nplurals=2; plural=n != 1;
X-Poedit-Language: German
X-Poedit-Country: GERMANY
X-Poedit-SourceCharset: utf-8
 Advanced Mailer Erweiterte Mailer-Verwaltung: dieses Modul erweitert das normale Zikula Mailer-Modul um zusätzliche Funktionalitäten Advanced Mailer - Konfiguration der Haupteinstellungen Es ist ein Fehler aufgetreten. Möglicherweise ist die ausgewählte Mail bereits im Hintergrund erfolgreich verschickt oder im Fehlerprotokoll gespeichert worden. Fehler aufgetreten beim Versuch, aus dem Fehlerprotokoll zu löschen Ein Fehler ist beim Versuch aufgetreten, die Email erneut in die Warteschlange zu stellen Beim manuellen Sendeversuch ist ein Fehler aufgetreten Authentifizierung korrekt... Folgende URL muss zeitgesteuert aufgerufen werden um eine Versandwelle zu starten Abbruch Cron-Service ausgeschaltet Eingestellte Methode für die Nutzung von Warteschlangen beim Mailversand Fehlerprotokoll komplett löschen Zeilenumbrüche werden direkt beim Versand hinzugefügt. Die Einstellung zu Zeilenumbrüchen bei Text-Mails bitte im Administrationsbereich des Mailer-Moduls vornehmen. Spenden und Entwicklung unterstützen Erledigt! Konfiguration geändert. Fehler beim Erstellen des Hooks Fehler beim Entfernen des Hooks Fehlerprotokoll vollständig gelöscht Fehler! Erstellen des Index fehlgeschlagen Fehlerprotokoll Kopfteil für HTML E-Mails Fußteil für Text E-Mails Fußteil für HTML E-Mails Kopfteil für Text E-Mails Hier sind alle sich aktuell in der Warteschlange befindlichen Mails aufgelistet. Durch Klick auf den Betreff kann der Inhalt eingesehen werden. Achtung bei Aktionen: Ggf. ist das Mail bei einer ausgewählten Aktion nicht mehr verfügbar, wenn es im Zeitraum der Übersichtserstellung und dem Klick zur Aktion im Hintergrund bereits erfolgreich versendet wurde. E-Mail-ID Inhalt der E-Mail advanced Mailer Fehlerprotokoll Warteschlange leer - keine Mail zur Zustellung gespeichert. Warteschlangen-Verwaltung E-Mail wurde mit hoher Priorität neu in die Warteschlange eingereiht Warteschlange E-Mails wurden erneut in die Warteschlange eingereiht und aus dem Fehlerprotokoll gelöscht Nachricht wurde ins Fehlerprotokoll verschoben - Zustellung wurde abgebrochen! Modulentwickler können die Verwendung von Vorlagen überschreiben. Bitte hierzu die Dokumentation der Funktion advMailer::userapi::sendmessage lesen. Nein Keine E-Mails in der Warteschlange Keine Einträge im Fehlerprotokoll gefunden Keine Vorlagendateien gefunden Anzahl an Mails, welche bei einem Aufruf maximal verschickt werden soll Passwort für den Aufruf der Versand-URL mittels Cronjob Bitte die Löschung aller im Protokoll vorhandener Fehlzustellungen bestätigen Bitte ein Passwort für den Cronjob-Aufruf festlegen - sonst ist der Service nicht nutzbar! Bitte die für diese Seite konfigurierten Templates am besten im Theme-Ordner ablegen - diese überschreiben dann automatisch die Beispieltemplates. Werden die Templates direkt im advMailer-Modulordner bearbeitet, können diese bei Modulupdates überschrieben werden. Vorschau Vorschau für HTML E-Mails Vorschau für Text E-Mails Bei sehr hohem Emailaufkommen oder zur teils deutlichen Verbesserung des Seitenaufbaus bei stark interaktiven Seiten empfiehlt sich die Nutzung von Warteschlangensystemen. So entstehen beim Laden von Seiten keine Wartezeiten für den Endnutzer, wenn im Hintergrund z.B. durch Benutzeraktionen viele Emailbenachrichtigungen (Muster-Anwendungsfall: Forum) verschickt werden müssen. Der Cronjob-Aufruf hat als URL-Aufruf zu erfolgen und kann bequem durch Eingabe der URL mit dem Passwort getestet werden. E-Alle Mails neu in die Warteschlange einreihen E-Mail gesendet mit der ID E-Mails ohne Verzögerung sofort verschicken Mittels SystemInit-Hook E-Mails im Hintergrund bei Seitenaufrufen senden lassen E-Mails mittels gesteuerten Cronjob-Aufruf intervallweise senden lassen Fehler beim Senden der E-Mail mit der ID Einstellungen Erweiterte Einstellung für die Nutzung des Warteschlangensystems Starte den E-Mail Versand... Vorlagen / Templates Konfiguration testen advMailer - das umfangreichere Mailer-Modul für Zikula' Die E-Mail wurde erfolgreich verschickt und aus der Warteschlange entfernt Die Mail wurde erfolgreich und vollständig gelöscht und damit nicht zugestellt Dies ist <font color="red">ein Beispieltext der </font> als <b>Beispiel für einen Textkörper</b> der <i>E-Mail</i> steht. Die Vorlagen werden vor und hinter diesem Text plaziert. Dies ist ein Beispieltext der als Beispiel für einen Textkörper der E-Mail steht. Die Vorlagen werden vor und hinter diesem Text plaziert. Konfiguration ändern Version Falsches Passwort Ja Hier können Templates (Vorlagen) verwendet werden. Diese bestehen aus Kopf- und Fußteil und werden um den zu sendenden Text herum plaziert. Je nach Inhaltstyp werden verschiedene Vorlagen verwendet. Inhaltstypen sind formatierter Text (html) und reiner Text (text). Je nach zu verschickendem Email werden immer die richtigen Vorlagen verwendet. Das Modul gefällt und ist nützlich Aktion advmailer Datum des letzten Zustellversuchs Löschen fehlgeschlagene Zustellungen Zustellung gescheitert, Warten auf letzten Versuch Zustellung gescheitert, Warten auf weiteren Versuch Eintrag nicht gefunden Betreff E-Mails in der Warteschlange E-Mails wurden in die Warteschlange neu eingestellt. Bitte diese Aktion wiederholen. Aufgrund der großen Menge an E-Mails konnten nicht alle E-Mails gleichzeitig neu eingestellt werden und der Link muss erneut betätigt werden! jetzt mail Parameter fehlt Versanddatum powered by Priorität Empfänger wieder in Warteschlange einreihen jetzt senden Status Warten auf Zustellung 