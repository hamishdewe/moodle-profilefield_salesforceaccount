<?php

/**
 * @package    profilefield_salesforceaccount
 * @category   profilefield
 * @copyright  2019 Hamish Dewe
 */

class profile_field_salesforceaccount extends profile_field_base {

    /**
     * Constructor
     *
     * Pulls out the options for salesforce_account from the database and sets the
     * the corresponding key for the data if it exists
     *
     * @param int $fieldid id of user profile field
     * @param int $userid id of user
     */
    function __construct($fieldid=0, $userid=0, $fielddata='') {
        global $DB;

        // First call parent constructor.
        parent::__construct($fieldid, $userid, $fielddata);

        $this->options[] = get_string('choose').'...';
        $accounts = $DB->get_records('salesforceaccount', ['isdeleted'=>'false']);
        foreach ($accounts as $account) {
          $object = unserialize($account->serialized);
          $accounts[$account->id] = get_string('display', 'profilefield_salesforceaccount', $object);
        }
        asort($accounts);
        foreach ($accounts as $k=>$v) {
          $this->options[$k] = $v;
        }

        // Set the data key.
        if ($this->data !== null && $this->data !== '0') {
            $key = $this->data;
            if (isset($this->options[$key]) || ($key = array_search($key, $this->options)) !== false) {
                $this->data = $key;
                $this->datakey = $key;
            }
        }
    }

    function display_data() {
        global $DB;

        if ($account = $DB->get_record('salesforceaccount', ['id'=>$this->data])) {
          $object = unserialize($account->serialized);
          return get_string('display', 'profilefield_salesforceaccount', $object);
        } else {
          return get_string('notassigned', 'profilefield_salesforceaccount');
        }
    }

    /**
     * Create the code snippet for this field instance
     * Overwrites the base class method
     * @param moodleform $mform Moodle form instance
     */
    public function edit_field_add($mform) {
        $mform->addElement('select', $this->inputname, format_string($this->field->name), $this->options);
    }

    /**
     * Set the default value for this field instance
     * Overwrites the base class method.
     * @param moodleform $mform Moodle form instance
     */
    public function edit_field_set_default($mform) {
        $key = $this->field->defaultdata;
        if (isset($this->options[$key]) || ($key = array_search($key, $this->options)) !== false){
            $defaultkey = $key;
        } else {
            $defaultkey = '';
        }
        $mform->setDefault($this->inputname, $defaultkey);
    }

    /**
     * The data from the form returns the key.
     *
     * This should be converted to the respective option string to be saved in database
     * Overwrites base class accessor method.
     *
     * @param mixed $data The key returned from the select input in the form
     * @param stdClass $datarecord The object that will be used to save the record
     * @return mixed Data or null
     */
    public function edit_save_data_preprocess($data, $datarecord) {
        return $data;
        //return isset($this->options[$data]) ? $data : null;
    }

    /**
     * HardFreeze the field if locked.
     * @param moodleform $mform instance of the moodleform class
     */
    public function edit_field_set_locked($mform) {
        if (!$mform->elementExists($this->inputname)) {
            return;
        }
        if ($this->is_locked() and !has_capability('moodle/user:update', context_system::instance())) {
            $mform->hardFreeze($this->inputname);
            $mform->setConstant($this->inputname, format_string($this->datakey));
        }
    }

    /**
     * Convert external data (csv file) from value to key for processing later by edit_save_data_preprocess
     *
     * @param string $value one of the values in menu options.
     * @return int options key for the menu
     */
    public function convert_external_data($value) {
        if (isset($this->options[$value])) {
            $retval = $value;
        } else {
            $retval = array_search($value, $this->options);
        }

        // If value is not found in options then return null, so that it can be handled
        // later by edit_save_data_preprocess.
        if ($retval === false) {
            $retval = null;
        }
        return $retval;
    }

    /**
     * Return the field type and null properties.
     * This will be used for validating the data submitted by a user.
     *
     * @return array the param type and null property
     * @since Moodle 3.2
     */
    public function get_field_properties() {
        return array(PARAM_TEXT);
    }
}
