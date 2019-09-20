<?php

/**
 * @package    profilefield_salesforceaccount
 * @category   profilefield
 * @copyright  2019 Hamish Dewe
 */

// See https://developer.salesforce.com/docs/atlas.en-us.api_rest.meta/api_rest/intro_understanding_username_password_oauth_flow.htm

defined('MOODLE_INTERNAL') || die();

$plugin->version   = 2019092000;        // The current plugin version (Date: YYYYMMDDXX)
$plugin->requires  = 2011112900;        // Requires this Moodle version
$plugin->component = 'profilefield_salesforceaccount'; // Full name of the plugin (used for diagnostics)
