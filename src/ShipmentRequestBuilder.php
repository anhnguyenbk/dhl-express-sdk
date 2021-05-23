<?php
namespace Oladen\DhlExpressSdk;
use Oladen\DhlExpressSdk\RequestUtils;

class ShipmentRequestBuilder {
   function __construct() {
      $this->shipTimestamp = RequestUtils::getInstance()->isoDate();
   }

   function setTrackingNumber ($number) {
      $this->number = $number;
   }

   function setShipTimestamp($shipTimestamp) {
      $this->shipTimestamp = $shipTimestamp;
   }

   function setInternationalDetail ($internationalDetail) {
      $this->internationalDetail = $internationalDetail;
   }

   function setExportDeclaration ($exportDeclaration) {
      $this->exportDeclaration = $exportDeclaration;
   }

   function setShipper ($shipper) {
      $this->shipper = $shipper;
   }

   function setRecipient ($recipient) {
      $this->recipient = $recipient;
   }

   function setPackages ($packages) {
      $this->packages = $packages;
   }

   function build() {
        return  [
         "ShipmentRequest" => [
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
                  "ShipmentInfo" => [
                     "DropOffType" => "REGULAR_PICKUP", 
                     "ServiceType" => "P", 
                     "LocalServiceType" => "P", 
                     "Currency" => "USD", 
                     "UnitOfMeasurement" => "SI", 
                     "LabelType" => "PDF", 
                     "LabelTemplate" => "ECOMA26_A6_001", 
                     "ArchiveLabelTemplate" => "ARCH_8x4", 
                     "CustomsInvoiceTemplate" => "COMMERCIAL_INVOICE_03", 
                     "Billing" => [
                        "ShipperAccountNumber" => "527259099", 
                        "ShippingPaymentType" => "S", 
                        "BillingAccountNumber" => "527259099" 
                     ], 
                     "ShipmentReferences" => [
                           "ShipmentReference" => [
                              [
                                 "ShipmentReference" => "Shipment Reference 1", 
                                 "ShipmentReferenceType" => "CU" 
                              ], 
                              [
                                    "ShipmentReference" => "Shipment Reference 2", 
                                    "ShipmentReferenceType" => "CU" 
                                 ] 
                           ] 
                        ], 
                     "SpecialServices" => [
                                       "Service" => [
                                          [
                                             "ServiceType" => "DD" 
                                          ] 
                                       ] 
                                    ], 
                     "LabelOptions" => [
                        "PrinterDPI" => 200, 
                        "RequestWaybillDocument" => "N", 
                        "HideAccountInWaybillDocument" => "N", 
                        "NumberOfWaybillDocumentCopies" => 1, 
                        "RequestDHLCustomsInvoice" => "Y", 
                        "DHLCustomsInvoiceLanguageCode" => "eng", 
                        "DHLCustomsInvoiceType" => "COMMERCIAL_INVOICE" 
                     ] 
                  ], 
                  "ShipTimestamp" => $this->shipTimestamp, 
                  "PaymentInfo" => "DAP", 
                  "InternationalDetail" => $this->internationalDetail, 
                  "Ship" => [
                     "Shipper" => $this->shipper, 
                     "Recipient" => $this->recipient
                  ], 
                  "Packages" => [
                     "RequestedPackages" => $this->packages
                  ] 
               ] 
            ] 
      ]; 
    }
}