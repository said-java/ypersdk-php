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
 * Class Order
 * @package Yper\SDK\Service
 */
class Order extends AbstractService
{
    /**
     * Add a delivery to this order
     *
     * @param $orderId
     * @param array $paramsPost
     * @return bool|string
     * @throws \Yper\SDK\Exceptions\YperException|\GuzzleHttp\Exception\GuzzleException
     */
    public function addDelivery($orderId, array $paramsPost)
    {
        return $this->requestApi("POST", '/order/' . $orderId . '/add_items', [], $paramsPost);
    }

    /**
     * Validate this order (it cannot be edited after)
     * @return mixed
     */
    public function validate($orderId)
    {
        return $this->requestApi("POST", '/order/' . $orderId . '/validate');
    }

    /**
     * Pay this order
     *
     * @param $orderId
     * @return bool|string
     * @throws \Yper\SDK\Exceptions\YperException
     */
    public function pay($orderId)
    {
        return $this->requestApi("POST", '/order/' . $orderId . '/pay');
    }
}

