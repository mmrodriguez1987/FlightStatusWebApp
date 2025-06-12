<?php
return [
    'wsdl'    => env('SOAP_WSDL_URL'),
    'options' => [
        'trace'      => true,
        'cache_wsdl' => WSDL_CACHE_NONE,
        // add authentication or other SoapClient flags here if needed
    ],
];
