<?php 
namespace Oladen\DhlExpressSdk;

use Oladen\DhlExpressSdk\BaseDhlExpressService;

class TrackingService extends BaseDhlExpressService {
    function __construct($api_user, $api_pass) {
        parent::__construct('TrackingRequest');
        $this->api_user = $api_user;
        $this->api_pass = $api_pass;
    }

    function trackShipment ($request) {
        return $this->req ($request);
    }
}