<?php
namespace Oladen\DhlExpressSdk;

use Oladen\DhlExpressSdk\RateService;
use Oladen\DhlExpressSdk\TrackingService;
use Oladen\DhlExpressSdk\ShipmentService;

class RestServiceFactory {
    function createRateService($api_user, $api_pass) {
        return new RateService($api_user, $api_pass);
    }

    function createTrackingService($api_user, $api_pass) {
        return new TrackingService($api_user, $api_pass);
    }

    function createShipmentService($api_user, $api_pass) {
        return new ShipmentService($api_user, $api_pass);
    }
}