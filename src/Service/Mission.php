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
 * Class Mission
 *
 * @package Yper\SDK\Service
 */
class Mission extends AbstractService
{

    /**
     * Set a mission to be ready to be picked
     *
     * @return mixed
     */
    public function setMissionReady($missionId)
    {
        return $this->requestApi("POST", sprintf("/mission/%s/ready", $missionId));
    }

}


