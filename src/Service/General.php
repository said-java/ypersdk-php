<?php
/**
 * Sahadina
 *
 * @category YperSDK
 * @package  Yper\SDK
 * @author   rajafallah@gmail.com
 */

namespace Yper\SDK\Service;

use GuzzleHttp\Exception\GuzzleException;
use Yper\SDK\Exceptions\YperException;

/**
 * Class General
 * @package Yper\SDK\Service
 */
class General extends AbstractService
{

    /**
     * Ping the server
     *
     * @return array
     */
    public function getPing()
    {
        return $this->requestApi("GET", "/ping");
    }

    /**
     * Get server time
     *
     * @return array
     */
    public function getTime()
    {
        return $this->requestApi("GET", "/time");
    }
}
