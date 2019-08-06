<?php

namespace Application\Libraries\Api;

class ApiProvider
{
    protected $providerUrl;

    protected $symbol;
    protected $ammount;
    public $getResult;
    protected $price;

    public function __construct(string $url, string $symbol, string $price)
    {
        $this->providerUrl = $url;
        $this->symbol = $symbol;
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return string
     */
    public function getProviderUrl()
    {
        return $this->providerUrl;
    }

    /**
     * @param string $providerUrl
     */
    public function setProviderUrl($providerUrl)
    {
        $this->providerUrl = $providerUrl;
    }

    /**
     * @return string
     */
    public function getSymbol()
    {
        return $this->symbol;
    }

    /**
     * @param string $symbol
     */
    public function setSymbol($symbol)
    {
        $this->symbol = $symbol;
    }

    /**
     * @return mixed
     */
    public function getAmmount()
    {
        return $this->ammount;
    }

    /**
     * @param mixed $ammount
     */
    public function setAmmount($ammount)
    {
        $this->ammount = $ammount;
    }

    public function callResult()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->getProviderUrl());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        $response = json_decode($output);

        $this->getResult = $response;
    }
}