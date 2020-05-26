<?php
/**
 * Sahadina
 *
 * @category YperSDK
 * @package  Yper\SDK
 * @author   rajafallah@gmail.com
 */

namespace Yper\SDK\Service;

/**
 * Class Retailpoint
 *
 * @package Yper\SDK\Service
 */
class Retailpoint extends AbstractService
{

    /**
     * List of retail point
     */
    public function getListRetailPoint($enabled = true)
    {
        return $this->requestApi(
            "GET",
            "/retailpoint/" . $this->getRetailPointId() . "/",
            ["enabled" => $enabled],
            ["enabled" => $enabled]
        );
    }

    /**
     * @param  array $paramsPost
     * @return bool|string
     * @throws \Yper\SDK\Exceptions\YperException
     */
    public function createNewRetailPoint(array $paramsPost)
    {
        return $this->requestApi("POST", "/retailpoint/" . $this->getRetailPointId() . "/", [], $paramsPost);
    }

    /**
     * Get mission templates attached to this retailpoint
     */
    public function getMissionTemplates()
    {
        return $this->requestApi("GET", "/retailpoint/" . $this->getRetailPointId() . "/mission_template");
    }
}