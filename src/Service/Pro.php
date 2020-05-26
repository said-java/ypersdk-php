<?php

namespace Yper\SDK\Service;

class Pro extends AbstractService
{

    /**
     * Get a list of retailpoints
     * @return mixedget
     */
    public function getRetailpoints()
    {
        return $this->requestApi("GET", "/pro/" . $this->getProId() . "/retailpoint");
    }

    /**
     * Create a new order for this pro
     * @return string The orderId
     */
    public function createOrder()
    {
        $result = $this->requestApi("POST", "/order", ["pro_id" => $this->getProId()]);
        return $result['result']['_id'];
    }

    /**
     * Get a list of possible MissionTemplates for a specific retailpoint
     * @return mixed
     */
    public function getRetailpointMissionTemplates()
    {
        return $this->get("/pro/" . $this->getProId() . "/retailpoint/" . $this->getRetailPointId() . "/mission_template");
    }


    /**
     * @param array $parmasPost
     * @return bool|string
     * @throws \Yper\SDK\Exceptions\YperException
     */
    public function postPrebook($paramsPost = [])
    {
        return $this->requestApi("POST", "/pro/" . $this->getProId() . "/prebook", [], $paramsPost);
    }


    /**
     * Get informations about a delivery
     * @param $mission_id
     * @return mixed
     */
    public function getDelivery($mission_id)
    {
        return $this->requestApi("GET", "/pro/" . $this->getProId() . "/mission/" . $mission_id);
    }


    /**
     * Get informations about a delivery cancelation (possible & fees associated)
     * @param $mission_id
     * @return mixed
     */
    public function getCancelDelivery($mission_id)
    {
        return $this->requestApi("GET", "/pro/" . $this->getProId() . "/mission/" . $mission_id . "/cancel");
    }


    /**
     * Validate a delivery cancelation
     * @param $mission_id
     * @return mixed
     */
    public function postCancelDelivery($mission_id)
    {
        return $this->requestApi("POST", "/pro/" . $this->getProId() . "/mission/" . $mission_id . "/cancel");
    }
}