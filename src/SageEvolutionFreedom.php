<?php

namespace EvansWanguba\Sage;

use GuzzleHttp\Client;
use GuzzleHttp\Promise;

/**
 * Class SageEvolutionFreedom.
 *
 * @category PHP
 * @author   Evans Wanguba <ewanguba@gmail.com>
 */
class SageEvolutionFreedom
{
    /**
     * The base URI to be called.
     *
     * @var string
     */
    private $baseUri = 'http://YourIp:5000/freedom.core/DatabaseName/SDK/Rest/';

    /**
     * The Guzzle HTTP Client.
     *
     * @var Client
     */
    private $client;

    /**
     * SageEvolutionFreedom constructor.
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->baseUri,
            'auth' => [
                env('SAGE_AGENT_USERNAME'), 
                env('SAGE_AGENT_PASSWORD')
            ]
        ]);
    }

    /**
     * Initiate a get request and send the information to Sage.
     *
     * @return string
     */
    public function getTransaction($initiateEndpoint)
    {
        try {
            $response = $this->client->request('GET', $initiateEndpoint);

            $statuscode = $response->getStatusCode();

            return $response->getBody()->getContents();
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * Initiate a post request and send the information to Sage.
     *
     * @return string
     */
    public function postTransaction($initiateEndpoint, $params)
    {
        try {
            $response = $this->client->request('POST', $initiateEndpoint, [
                'json' => $params
            ]);

            $statuscode = $response->getStatusCode();

            return json_decode($response->getBody()->getContents());
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
}
