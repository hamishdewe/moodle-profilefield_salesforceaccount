<?php 

// require_once("{$CFG->libdir}/externallib.php");
 
// class profilefield_salesforceaccount_external extends external_api {
 
//     /**
//      * Returns description of method parameters
//      * @return external_function_parameters
//      */
//     public static function create_parameters() {
//         return new external_function_parameters(
//             array(
//                 'idnumber' => new external_value(PARAM_RAW_TRIMMED, 'idnumber of organization in Salesforce'),
//                 'name' => new external_value(PARAM_RAW_TRIMMED, 'name of organization in Salesforce'),
//                 'email_regex' => new external_value(PARAM_RAW_TRIMMED, 'regex for email matching'),
//                 'type' => new external_value(PARAM_RAW_TRIMMED, 'type of organization in Salesforce'),
//                 'internal_rep' => new external_value(PARAM_EMAIL, 'email of sales representative'),
//                 'external_rep' => new external_value(PARAM_EMAIL, 'email of organization representative')
//             )
//         );
//     }
    
//     public static function create_returns() {
//         return array();
//     }
    
//     public static function update_parameters() {
//         return new external_function_parameters(
//             array(
//                 'idnumber' => new external_value(PARAM_RAW_TRIMMED, 'idnumber of organization in Salesforce'),
//                 'name' => new external_value(PARAM_RAW_TRIMMED, 'name of organization in Salesforce'),
//                 'email_regex' => new external_value(PARAM_RAW_TRIMMED, 'regex for email matching'),
//                 'type' => new external_value(PARAM_RAW_TRIMMED, 'type of organization in Salesforce'),
//                 'internal_rep' => new external_value(PARAM_EMAIL, 'email of sales representative'),
//                 'external_rep' => new external_value(PARAM_EMAIL, 'email of organization representative')
//             )
//         );
//     }
    
//     public static function update_returns() {
//         return array();
//     }
    
//     public static function delete_parameters() {
//         return new external_function_parameters(
//             array(
//                 'idnumber' => new external_value(PARAM_RAW_TRIMMED, 'idnumber of organization in Salesforce')
//             )
//         );
//     }
    
//     public static function delete_returns() {
//         return array();
//     }
    
//     public static function get_account_users_parameters() {
//         return new external_function_parameters(
//             array(
//                 'idnumber' => new external_value(PARAM_RAW_TRIMMED, 'idnumber of organization in Salesforce')
//             )
//         );
//     }
    
//     public static function get_account_users_returns() {
//         // TODO Get the users and return that
//         return array();
//     }
// }