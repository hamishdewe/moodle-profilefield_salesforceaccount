<?php

/**
 * Contains definition of cutsom user profile field.
 *
 * @package    profilefield_salesforceaccount
 * @category   profilefield
 * @copyright  2019 Hamish Dewe
 */

class profile_define_salesforceaccount extends profile_define_base {

    /**
     * Prints out the form snippet for the part of creating or
     * editing a profile field specific to the current data type
     *
     * @param moodleform $form reference to moodleform for adding elements.
     */
    function define_form_specific($form) {
        $form->addElement('text', 'param1', get_string('param_apikey', 'profilefield_salesforceaccount'));
        $form->addHelpButton('param1', 'param_apikey', 'profilefield_salesforceaccount');
        $form->setDefault('param1', '');
        $form->setType('param1', PARAM_RAW_TRIMMED);
        $form->addElement('hidden', 'defaultdata', '0');
        $form->setType('defaultdata', PARAM_INT);
    }

    /**
     * Validate the data from the add/edit profile field form
     * that is specific to the current data type
     *
     * @param object $data from the add/edit profile field form
     * @param object $files files uploaded
     * @return array associative array of error messages
     */
    function define_validate_specific($data, $files) {
        // overwrite if necessary
        return array();
    }

    /**
     * Alter form based on submitted or existing data
     *
     * @param moodleform $mform reference to moodleform
     */
    function define_after_data(&$mform) {
        // overwrite if necessary
    }

    /**
     * Preprocess data from the add/edit profile field form
     * before it is saved.
     *
     * @param object $data from the add/edit profile field form
     * @return object processed data object
     */
    function define_save_preprocess($data) {
        // overwrite if necessary
        return $data;
    }

}
