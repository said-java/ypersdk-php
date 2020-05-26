<?php

namespace Yper\SDK\Service;

class Mission extends AbstractService
{

    /**
     * Set a mission to be ready to be picked
     */
    public function setMissionReady($missionId)
    {
        return $this->requestApi("POST", "/mission/" . $missionId . "/ready");
    }

}


