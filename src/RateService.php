<?php 
namespace Oladen\DhlExpressSdk;

use Oladen\DhlExpressSdk\BaseDhlExpressService;

class RateService extends BaseDhlExpressService {
    function __construct($api_user, $api_pass) {
        parent::__construct('RateRequest');
        $this->api_user = $api_user;
        $this->api_pass = $api_pass;
    }

    function collectRates($request) {
        return $this->req ($request);
    }
}