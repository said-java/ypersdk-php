<?php
/**
 * Sahadina
 *
 * @category YperSDK
 * @package  Yper\SDK
 * @author   rajafallah@gmail.com
 */

namespace Yper\SDK;

use Yper\SDK\Exceptions\YperException;
use GuzzleHttp\Client as GuzzleClient;

/**
 * Class ApiClient
 */
class ApiClient
{
    /**
     * The baseUrl
     *
     * @var string
     */
    private $baseUrl;

    /**
     * The clientId
     *
     * @var string
     */
    private $clientId;

    /**
     * The clientSecret
     *
     * @var string
     */
    private $clientSecret;

    /**
     * The scope
     *
     * @var string
     */
    private $scope;

    /**
     * The grantType
     *
     * @var string
     */
    private $grantType;

    /**
     * The proId
     *
     * @var string
     */
    private $proId;

    /**
     * The proSecretToken
     *
     * @var string
     */
    private $proSecretToken;

    /**
     * The retailPointId
     *
     * @var string
     */
    private $retailPointId;

    /**
     * The accessToken
     *
     * @var string
     */
    private $accessToken;

    /**
     * ApiClient constructor.
     *
     * @param string $baseUrl
     * @param string $clientId
     * @param string $clientSecret
     * @param string $scope
     * @param string $grantType
     * @param string $proId
     * @param string $proSecretToken
     * @param string $retailPointId
     *
     * @return void
     */
    public function __construct(
        $baseUrl,
        $clientId,
        $clientSecret,
        $scope,
        $grantType,
        $proId,
        $retailPointId,
        $proSecretToken
    ) {
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
                    'POST',
                    $this->getUrlToken(),
                    [
                        'form_params' => [
                            'grant_type' => $this->grantType,
                            'scope' => $this->scope,
                            'pro_id' => $this->proId,
                            'pro_secret_token' => $this->proSecretToken,
                            'type' => 'request-body',
                            'client_id' => $this->clientId,
                            'client_secret' => $this->clientSecret
                        ]
                    ]
                );
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
