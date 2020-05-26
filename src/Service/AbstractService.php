<?php
/**
 * Sahadina
 *
 * @category YperSDK
 * @package  Yper\SDK
 * @author   rajafallah@gmail.com
 */

namespace Yper\SDK\Service;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Yper\SDK\Helper\ValidateToken;
use Yper\SDK\Exceptions\YperException;
use Yper\SDK\ApiClient;

/**
 * Class AbstractService
 *
 * @package Yper\SDK\Service
 */
class AbstractService extends ApiClient
{

    /**
     * request api
     *
     * @param  string $method
     * @param  string $path
     * @param  array  $paramGet
     * @param  array  $paramPost
     * @return mixed
     * @throws YperException
     * @throws GuzzleException
     */
    public function requestApi($method, $path, $paramGet = array(), $paramPost = array())
    {
        $accessToken = $this->getAuthToken();
        new validateToken($accessToken);
        $url = $this->getBaseUrl() . $path;
        try {
            $client = new Client;
            $paramPost = json_encode($paramPost, true);
            $response = $client->request(
                $method, $url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $accessToken,
                    'X-Request-Timestamp' => time(),
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'

                ],
                'query' => $paramGet,
                'body' => $paramPost

                ]
            );

            if ($response->getStatusCode() == 200) {
                $responseBody = $response->getBody(true);
                /**
 * @var string $responseArr 
*/
                $responseArr = json_decode($responseBody, true);
                return $responseArr;
            } else {
                throw new YperException($response->getBody());
            }
        } catch (Exception $e) {
            throw new YperException($e->getMessage());
        }
    }
}