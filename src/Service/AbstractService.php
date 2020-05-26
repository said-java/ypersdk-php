<?php

namespace Yper\SDK\Service;

use GuzzleHttp\Client as GuzzleClient;
use Yper\SDK\Helper\validateToken;
use Yper\SDK\Exceptions\YperException;
use Yper\SDK\ApiClient;

class AbstractService extends ApiClient
{

    /**
     * Connects to api
     *
     * @param string $method
     * @param string $path
     * @param string[] $paramGet
     * @param string[] $paramPost
     *
     * @return bool|string
     */
    public function requestApi($method, $path, $paramGet = array(), $paramPost = array())
    {
        $accessToken = $this->getAuthToken();
        new validateToken($accessToken);
        $url = $this->getBaseUrl() . $path;
        try {
            $client = new guzzleClient;
            $paramPost = json_encode($paramPost, true);
            $response = $client->request($method, $url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'X-Request-Timestamp' => time(),
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'

                ],
                'query' => $paramGet,
                'body' => $paramPost

            ]);

            if ($response->getStatusCode() == 200) {
                $responseBody = $response->getBody(true);
                $responseArr = json_decode($responseBody, true);
                return $responseArr;
            } else {
                throw new YperException($response->getBody());
            }
        } catch (\Exception $e) {
            throw new YperException($e->getMessage());
        }
    }
}