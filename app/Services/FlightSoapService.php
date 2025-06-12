<?php
namespace App\Services;

use SoapClient;

class FlightSoapService
{
    protected SoapClient $client;

    public function __construct()
    {
        $wsdl    = config('soap.wsdl');
        $options = config('soap.options');
        $this->client = new SoapClient($wsdl, $options);
    }

    public function listFlights(): array
    {
        $resp = $this->client->__soapCall('listFlights', []);
        return $resp->return ?? [];
    }

    public function getFlight(int $id): ?object
    {
        $resp = $this->client->__soapCall('getFlight', [['id' => $id]]);
        return $resp->return ?? null;
    }

    public function createFlight(array $data): ?object
    {
        $resp = $this->client->__soapCall('createFlight', [['flight' => $data]]);
        return $resp->return ?? null;
    }

    // If your SOAP WSDL also exposes updateFlight and deleteFlight, you can add:
    // public function updateFlight(array $data)…
    // public function deleteFlight(int $id)…
}
