advMailer
=========

## About the module

advMailer is a add on module for the zikula core and extends the functionality of the system module "Mailer".

## Features

- Templating for outgoing emails: All outgoing emails are put into your user defined html or plain text email templates. This makes the easy usage of an continous CI possible.
- Mail queuing: You can choose if mails should be send immediately (including limits it many mails are sent at one time) or sheduled via cronjob (for example: send 100 mails every minute)
- erroneous mails are collected in a separat queue
The module is very reliable and guarantees the correct handling of many thousands emails each day (for example newsletters / mass mailings, forum notifications, etc).

Feel free to fill the issue tracker with your feature requests or bug reports!

## Available Translations

At the moment these translations are available
- English
- German
For downloads versions lower than 2.0.0 please use Zikula's extDB - language files will be included there.
## Integration into the Zikula core

The features can be used out of the box in Zikula 1.2. For Zikula 1.3.x a little code change in the core's Mailer module will be necessary because Zikula core droped the support of third party add ons.

## Changelog

2.0.0:
* Version for Zikula 1.2.x

1.1:
* Bugfix release

1.0:
* Version for Zikula 1.1.x
