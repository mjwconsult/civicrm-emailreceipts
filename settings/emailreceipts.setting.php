<?php
/* https://civicrm.org/licensing */

use CRM_Mjwshared_ExtensionUtil as E;

return [
  'emailreceipts_block' => [
    'admin_group' => 'emailreceipts_general',
    'admin_grouptitle' => 'General Settings',
    'admin_groupdescription' => 'General settings',
    'group_name' => 'General Settings',
    'group' => 'emailreceipts',
    'name' => 'emailreceipts_block',
    'type' => 'Boolean',
    'html_type' => 'Checkbox',
    'default' => 0,
    'add' => '5.13',
    'is_domain' => 1,
    'is_contact' => 0,
    'description' => 'Block sending of all email receipts (they will be recorded with status "Cancelled" and will not be emailed out).',
    'html_attributes' => [],
  ],
];
