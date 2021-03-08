<?php
namespace sample;

require_once('DataHandler.php');
require_once('Entries.php');
require_once('Entry.php');

/**
 * SenateData using CURL to retrieve data from a given end point.  If end point is not given, will use default
 */

class SenateData implements DataHandler {
    private $endPoint = 'https://www.senate.gov/general/contact_information/senators_cfm.xml';

    public function __construct(string $endPoint = '') {
        if (strlen($endPoint) > 0) {
            $this->endPoint = trim($endPoint);
        }
    }

    /**
     * Implement the method defined in DataHandler interface
     */
    public function populate(Entries $entries)
    {
        try {
            $res = $this->execute();
            $members = $res['member'];
            //Anonymous function to normalize address string: first, convert string to array, and then trim each element
            //of the new array, using array filter to remove any empty element, and finally get array values to reset index starts at 0
            $addressArr = function($address) {
                $addressExp = array_values(array_filter(array_map('trim', explode(' ', $address)), 'strlen'));
                $counter = count($addressExp);
                return [
                    'street' => implode(' ', array_slice($addressExp, 0, $counter - 4)),
                    'city' => $addressExp[$counter - 3],
                    'state' => $addressExp[$counter - 2],
                    'postal' => $addressExp[$counter - 1],
                ];
            
            };
            foreach($members as $i => $mem ) {
                $entries->addEntry(
                    (new Entry())->setFirstName($mem['first_name'])->setLastName($mem['last_name'])->setChartId($mem['bioguide_id'])->setMobile($mem['phone'])->setAddress($addressArr($mem['address']))
                ); 
            }
        } catch (\Exception $e) {
            $entries = [];
        }
    }

    /**
     * Use CURL to retrieve data from given endpoint.  Data is then covert
     * to array before returning
     */
    private function execute(): array 
    {
        $res = false;
        if (strlen($this->endPoint) > 0) {
            $ch = curl_init($this->endPoint);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $response = curl_exec($ch);;
            $httpErrorCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($httpErrorCode != 200) {
                throw new \Exception("Invalid Response: $httpErrorCode");
            }
            try {
                $res = json_decode(json_encode(simplexml_load_string($response)),TRUE);
            } catch(\Exception $e) {
                throw new \Exception("Unable to process rerquest.  " . $e->getMessage());
            }
        }
        return $res;
    }
}
