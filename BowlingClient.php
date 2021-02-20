<?php

use GuzzleHttp\Client;

class BowlingClient
{
    const POINTS_URL = "http://13.74.31.101/api/";

    protected $client;

    protected string $token;

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken(string $token): void
    {
        $this->token = $token;
    }

    public function __construct()
    {
        $this->client = new Client([
            // Base URI is used with relative requests
            'base_uri' => self::POINTS_URL,
            // You can set any number of default request options.
            'timeout' => 2.0,
        ]);
    }

    public function getFrames()
    {
        $response = $this->client->request('GET', 'points');
        $frames = json_decode($response->getBody(), true);

        $this->setToken($frames['token']);

        return $frames['points'];
    }

    public function sendCalculatedSum(array $calculatedSum)
    {

        $data = [
            'token' => $this->getToken(),
            'points' => $calculatedSum,
        ];

        $response = $this->client->request('POST', 'points', [
            'json' => $data
        ]);

        if($response->getStatusCode() == 200) {
            return true;
        }

        return false;
    }

}