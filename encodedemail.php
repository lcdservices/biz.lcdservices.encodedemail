<?php

require_once 'encodedemail.civix.php';
use CRM_Encodedemail_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function encodedemail_civicrm_config(&$config) {
  _encodedemail_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function encodedemail_civicrm_xmlMenu(&$files) {
  _encodedemail_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function encodedemail_civicrm_install() {
  _encodedemail_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function encodedemail_civicrm_postInstall() {
  _encodedemail_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function encodedemail_civicrm_uninstall() {
  _encodedemail_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function encodedemail_civicrm_enable() {
  _encodedemail_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function encodedemail_civicrm_disable() {
  _encodedemail_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function encodedemail_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _encodedemail_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function encodedemail_civicrm_managed(&$entities) {
  _encodedemail_civix_civicrm_managed($entities);
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
function encodedemail_civicrm_caseTypes(&$caseTypes) {
  _encodedemail_civix_civicrm_caseTypes($caseTypes);
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
function encodedemail_civicrm_angularModules(&$angularModules) {
  _encodedemail_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function encodedemail_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _encodedemail_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function encodedemail_civicrm_entityTypes(&$entityTypes) {
  _encodedemail_civix_civicrm_entityTypes($entityTypes);
}

function encodedemail_civicrm_tokens(&$tokens) {
  $tokens['encodedemail'] = array(
    'encodedemail.encodedemail' => ts("Encoded Email"),
  );
}

function encodedemail_civicrm_tokenValues(&$values, $cids, $job = null, $tokens = array(), $context = null) {
  //Civi::log()->debug('', ['$tokens' => $tokens, '$values' => $values]);

  if (!empty($tokens['encodedemail'])) {
    foreach ($cids as $cid) {
      $encodedEmail = NULL;
      try {
        $email = civicrm_api3('email', 'get', [
          'contact_id' => $cid,
          'is_primary' => 1,
          'sequential' => 1,
        ]);

        if (!empty($email['count'])) {
          $encodedEmail = urlencode(base64_encode($email['values'][0]['email']));
        }
      }
      catch (CRM_API3_Exception $e) {}

      $values[$cid]['encodedemail.encodedemail'] = $encodedEmail;
      $values[$cid]['encodedemail'] = $encodedEmail;
    }
  }
}

