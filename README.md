# Functionality MERGED into https://lab.civicrm.org/extensions/msgtplblocker

# Email Receipts

CiviCRM does not record an activity when an email receipt is sent out so it can be very difficult to tell if a receipt has been sent (or re-sent).
This extension records an "Email" activity with the contents of the email receipt recorded in the activity - so you know exactly what was sent and when.

You can also completely block sending of email receipts (Administer->Communications->Email Receipt Settings).  This is very useful when performing bulk 
tasks such as importing historical contributions and you want to be sure that receipts will NOT be sent out.

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

* PHP v7.x
* CiviCRM 5.13+

## Installation

See: https://docs.civicrm.org/sysadmin/en/latest/customize/extensions/#installing-a-new-extension
