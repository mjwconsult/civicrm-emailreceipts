<?php

require_once 'emailreceipts.civix.php';
use CRM_Emailreceipts_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function emailreceipts_civicrm_config(&$config) {
  _emailreceipts_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function emailreceipts_civicrm_xmlMenu(&$files) {
  _emailreceipts_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function emailreceipts_civicrm_install() {
  _emailreceipts_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function emailreceipts_civicrm_postInstall() {
  _emailreceipts_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function emailreceipts_civicrm_uninstall() {
  _emailreceipts_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function emailreceipts_civicrm_enable() {
  _emailreceipts_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function emailreceipts_civicrm_disable() {
  _emailreceipts_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function emailreceipts_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _emailreceipts_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function emailreceipts_civicrm_managed(&$entities) {
  _emailreceipts_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function emailreceipts_civicrm_caseTypes(&$caseTypes) {
  _emailreceipts_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function emailreceipts_civicrm_angularModules(&$angularModules) {
  _emailreceipts_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function emailreceipts_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _emailreceipts_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function emailreceipts_civicrm_entityTypes(&$entityTypes) {
  _emailreceipts_civix_civicrm_entityTypes($entityTypes);
}

/**
 * Implements hook_civicrm_navigationMenu().
 */
function emailreceipts_civicrm_navigationMenu(&$menu) {
  $item[] = [
    'label' => E::ts('Emailreceipts settings'),
    'name'  => 'Email Receipt settings',
    'url'   => 'civicrm/admin/emailreceipts/settings',
    'permission' => 'administer CiviCRM',
    'operator'   => NULL,
    'separator'  => NULL,
  ];
  _emailreceipts_civix_insert_navigation_menu($menu, 'Administer/Communications', $item[0]);
  _emailreceipts_civix_navigationMenu($menu);
}

/**
 * Implements hook_civicrm_alterMailParams().
 */
function emailreceipts_civicrm_alterMailParams(&$params, $context) {
  if ($context !== 'singleEmail') {
    return;
  }

  CRM_Emailreceipts_Emails::alterAndCreateActivity($params);
}
