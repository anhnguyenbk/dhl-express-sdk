<?php 
namespace Oladen\DhlExpressSdk;

use Oladen\DhlExpressSdk\BaseDhlExpressService;

class ShipmentService extends BaseDhlExpressService {
    function __construct($api_user, $api_pass) {
        parent::__construct('ShipmentRequest');
        $this->api_user = $api_user;
        $this->api_pass = $api_pass;
    }

    function createShipment ($request) {
        return $this->req ($request);
    }
}