<?php
namespace Oladen\DhlExpressSdk;
use Oladen\DhlExpressSdk\RequestUtils;

class TrackingRequestBuilder {
    function __construct() {
    }

    function setTrackingNumber ($number) {
        $this->number = $number;
    }

    function build() {
        return [
            "trackShipmentRequest" => [
                  "trackingRequest" => [
                     "TrackingRequest" => [
                        "Request" => [
                           "ServiceHeader" => [
                              "MessageTime" => RequestUtils::getInstance()->isoDate(), 
                              "MessageReference" => RequestUtils::getInstance()->guidv4(),
                           ] 
                        ], 
                        "AWBNumber" => [
                            "ArrayOfAWBNumberItem" => "5786696720" 
                        ], 
                        "LevelOfDetails" => "LAST_CHECKPOINT_ONLY", 
                        "PiecesEnabled" => "B" 
                     ] 
                  ] 
               ] 
         ]; 
    }
}