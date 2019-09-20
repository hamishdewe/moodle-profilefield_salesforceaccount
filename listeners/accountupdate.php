<?php

require_once('../../../../../config.php');

global $DB;

$apikey = optional_param('apikey', null, PARAM_TEXT);
// Require matching key or fail
if (is_null($apikey) || !$DB->record_exists_sql('select id from {user_info_field} where param1 = :param1', ['param1'=>$apikey])) {
  http_response_code(404);
  die;
}

/* Listen for changes to Salesforce accounts */
$soap = simplexml_load_string(file_get_contents('php://input'));
$sObject = $soap->children('http://schemas.xmlsoap.org/soap/envelope/')->Body->children('http://soap.sforce.com/2005/09/outbound')->notifications->Notification->sObject->children('urn:sobject.enterprise.soap.sforce.com');

$object = new stdClass();
foreach ($sObject as $k=>$v) {
  $object->$k = (string)$v;
}
$serialized = serialize($object);

$record = new stdClass();
$record->idnumber = $object->Id;
$record->isdeleted = $object->IsDeleted;
$record->serialized = $serialized;
if ($existing = $DB->get_record('salesforceaccount', ['idnumber'=>$object->Id])) {
  // do update
  $record->id = $existing->id;
  $DB->update_record('salesforceaccount', $record);
} else {
  // do insert
  $record->id = $DB->insert_record('salesforceaccount', $record);
}

// Send the ACK back to Salesforce
header('Content-Type: text/xml');
echo '<soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
    <soap:Body>
        <notificationsResponse xmlns:ns2="urn:sobject.enterprise.soap.sforce.com" xmlns="http://soap.sforce.com/2005/09/outbound">
            <Ack>true</Ack>
        </notificationsResponse>
    </soap:Body>
</soap:Envelope>';
