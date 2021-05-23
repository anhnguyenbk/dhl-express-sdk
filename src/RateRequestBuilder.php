<?php
namespace Oladen\DhlExpressSdk;
use Oladen\DhlExpressSdk\RequestUtils;


class RateRequestBuilder {
    function __construct() {
        $this->shipTimestamp = RequestUtils::getInstance()->isoDate();
    }

    function setShipper ($shipper) {
        $this->shipper = $shipper;
    }

    function setRecipient ($recipient) {
        $this->recipient = $recipient;
    }

    function setPackage ($package) {
        $this->package = $package;
    }

    function setShipTimestamp($shipTimestamp) {
        $this->shipTimestamp = $shipTimestamp;
    }

    function build() {
        return [
            "RateRequest" => [
                    "ClientDetails" => null, 
                    "Request" => [
                        "ServiceHeader" => [
                        "MessageTime" => RequestUtils::getInstance()->isoDate(), 
                        "MessageReference" => RequestUtils::getInstance()->guidv4(), 
                        "WebstorePlatform" => "MyDHL API Sample Msg", 
                        "WebstorePlatformVersion" => "1.0", 
                        "ShippingSystemPlatform" => "SOAP UI", 
                        "ShippingSystemPlatformVersion" => "NA", 
                        "PlugIn" => "NA", 
                        "PlugInVersion" => "NA" 
                        ] 
                    ], 
                    "RequestedShipment" => [
                            "GetDetailedRateBreakdown" => "N", 
                            "DropOffType" => "REGULAR_PICKUP", 
                            "NextBusinessDay" => "Y", 
                            "ShipTimestamp" => $this->shipTimestamp, 
                            "UnitOfMeasurement" => "SI", 
                            "Content" => "NON_DOCUMENTS", 
                            "DeclaredValue" => 100, 
                            "DeclaredValueCurrency" => "USD", 
                            "PaymentInfo" => "DAP", 
                            "NetworkTypeCode" => "TD", 
                            "CustomerAgreementInd" => "N", 
                            "ValidateReadyTime" => "N", 
                            "Ship" => [
                                "Shipper" => $this->shipper, 
                                "Recipient" => $this->recipient,
                            ], 
                            "Packages" => [
                                "RequestedPackages" => $this->package
                            ], 
                            "Billing" => [
                                "ShipperAccountNumber" => "527259099", 
                                "ShippingPaymentType" => "S", 
                                "BillingAccountNumber" => "527259099" 
                            ], 
                            "SpecialServices" => [
                                "Service" => [
                                    "ServiceType" => "II" 
                                ] 
                            ] 
                        ] 
                ] 
            ]; 
    }
}