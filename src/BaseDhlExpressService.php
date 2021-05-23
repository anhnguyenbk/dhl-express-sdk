<?php 
namespace Oladen\DhlExpressSdk;

use GuzzleHttp\Client;
use Exception;

abstract class BaseDhlExpressService {
    function __construct($serviceName) {
        $this->serviceName = $serviceName;
    }

    function req ($request) {
        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);

        $request_json = json_encode ($request);
        $options = [
            'auth' => [$this->api_user, $this->api_pass],
            'body' => $request_json
        ]; 

        try {
            error_log ('POST http://wsbexpress.dhl.com/rest/sndpt/'.$this->serviceName, 0);
            error_log ($request_json, 0);

            $res = $client->request('POST', 'http://wsbexpress.dhl.com/rest/sndpt/'.$this->serviceName, $options);
            return $res->getBody();
        } catch (Exception $ex) {
            error_log ('Error when calling DHL', 0);
            error_log ($ex, 0);

            $response = $ex->getResponse();
            if ($response) {
                return $response->getBody();
            }
            return "";
        }
    }
}