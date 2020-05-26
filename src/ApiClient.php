<?php

namespace Yper\SDK;

use Yper\SDK\Exceptions\YperException;
use GuzzleHttp\Client as GuzzleClient;

/**
 * Class Api
 * @package Yper\SDK
 */
class ApiClient
{

    private $baseUrl;
    private $clientId;
    private $clientSecret;
    private $scope;
    private $grantType;
    private $proId;
    private $proSecretToken;
    private $retailPointId;
    private $accessToken;

    /**
     * ApiClient constructor.
     *
     * @param $baseUrl
     * @param $clientId
     * @param $clientSecret
     * @param $scope
     * @param $grantType
     * @param $proId
     * @param $proSecretToken
     * @param $retailPointId
     */
    public function __construct($baseUrl, $clientId, $clientSecret, $scope, $grantType, $proId, $proSecretToken, $retailPointId)
    {
        $this->baseUrl = $baseUrl;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->scope = $scope;
        $this->grantType = $grantType;
        $this->proId = $proId;
        $this->proSecretToken = $proSecretToken;
        $this->retailPointId = $retailPointId;
    }

    /**
     * @return mixed
     * @throws YperException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function getAuthToken()
    {
        if (is_null($this->accessToken)) {
            $client = new guzzleClient;
            try {
                $response = $client->request(
                    'POST', $this->getUrlToken(), [
                    'form_params' => [
                        'grant_type' => $this->grantType,
                        'scope' => $this->scope,
                        'pro_id' => $this->proId,
                        'pro_secret_token' => $this->proSecretToken,
                        'type' => 'request-body',
                        'client_id' => $this->clientId,
                        'client_secret' => $this->clientSecret
                    ]
                ]);
                if ($response->getStatusCode() == 200) {
                    $responseBody = $response->getBody(true);
                    $responseArr = json_decode($responseBody, true);
                    $accessToken = $responseArr['result']['access_token'];
                    $this->accessToken = $accessToken;
                    return $accessToken;
                } else {
                    throw new YperException($response->getBody());
                }
            } catch (\Exception $e) {

                throw new YperException($e->getMessage());
            }
        } else {
            return $this->accessToken;
        }
    }

    /**
     * @return string
     */
    public function getUrlToken()
    {
        return $this->baseUrl . "/oauth/token";
    }

    /**
     * @return mixed
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @return mixed
     */
    public function getProId()
    {
        return $this->proId;
    }

    /**
     * @return mixed
     */
    public function getRetailPointId()
    {
        return $this->retailPointId;
    }
}