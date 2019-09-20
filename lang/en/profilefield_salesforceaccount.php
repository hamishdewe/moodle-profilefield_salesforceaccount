<?php

/**
 * Contains language strings
 *
 * @package    profilefield_salesforceaccount
 * @category   profilefield
 * @copyright  2019 Hamish Dewe
 */

//name of the plugin should be defined.
$string['pluginname'] = 'Salesforce account';
/**
 * Options
 *
 * Moodle   Salesforce      Description
 * param1   client_id       The Consumer Key from the connected app definition
 * param2   client_secret   The Consumer Secret from the connected app definition. Required unless the
 *                          Require Secret for Web Server Flow setting is not enables in the connected
 *                          app definition
 * param3   username        End-user's username
 * param4   password        End-user's password
 */
// $string['param_client_id'] = 'Consumer key';
// $string['param_client_id_help'] = 'The Consumer Key from the connected app definition';
// $string['param_client_secret'] = 'Consumer secret';
// $string['param_client_secret_help'] = 'The Consumer Secret from the connected app definition. Required unless the Require Secret for Web Server Flow setting is not enabled in the connected app definition';
// $string['param_username'] = 'End-user\'s username';
// $string['param_password'] = 'End-user\'s password';

$string['param_apikey'] = 'API key';
$string['param_apikey_help'] = 'The Salesforce system sending update data must sign the request by passing this value as the querystring parameter "apikey".';
$string['display'] = '{$a->Name} [{$a->Industry}, {$a->Type}]';
