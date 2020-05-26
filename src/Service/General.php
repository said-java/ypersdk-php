<?php


namespace Yper\SDK\Service;


class General extends AbstractService
{


    /**
     * Ping the server
     */
    public function getPing()
    {
        return $this->requestApi("GET", "/ping");

    }

    /**
     * Get server time
     */
    public function getTime()
    {
        return $this->requestApi("GET", "/time");
    }

}