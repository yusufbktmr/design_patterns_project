<?php

namespace Application\Libraries\Api;


class ConvertProvider
{

    public function __construct($providerData, string $data1, string $data2, string $data3)
    {
        $this->providerData = $providerData;
        $this->data1 = $data1;
        $this->data2 = $data2;
        $this->data3 = $data3;
    }

    /**
     * @return string
     */
    public function getData1()
    {
        return $this->data1;
    }

    /**
     * @param string $data1
     */
    public function setData1($data1)
    {
        $this->data1 = $data1;
    }

    /**
     * @return string
     */
    public function getData2()
    {
        return $this->data2;
    }

    /**
     * @param string $data2
     */
    public function setData2($data2)
    {
        $this->data2 = $data2;
    }

    /**
     * @return string
     */
    public function getData3()
    {
        return $this->data3;
    }

    /**
     * @param string $data3
     */
    public function setData3($data3)
    {
        $this->data3 = $data3;
    }

    /**
     * @return object
     */
    public function getProviderData()
    {
        return $this->providerData;
    }

    /**
     * @param array $providerData
     */
    public function setProviderData($providerData)
    {
        $this->providerData = $providerData;
    }

    public function generalRules()
    {
        $amaount = [];
        $this->providerData->callResult();
        $currency = $this->providerData->getSymbol();
        $price = $this->providerData->getPrice();

        if (isset($this->providerData->getResult->result)) {
            $providerData = $this->providerData->getResult->result;
        } else {
            $providerData = $this->providerData->getResult;
        }

        foreach ($providerData as $result) {
            switch ($result->{$currency}) {
                case $this->data1:
                    $amaount['Dolar'] = (float)$result->{$price};
                    break;
                case $this->data2:
                    $amaount['Euro'] = (float)$result->{$price};
                    break;
                case $this->data3:
                    $amaount['Sterlin'] = (float)$result->{$price};
                    break;
            }
        }
        return $amaount;
    }

    public function comparisonData(array $data1, array $data2)
    {
        $tmp['Dolar'] = $data1['Dolar'] > $data2['Dolar'] || $data1['Dolar'] == $data2['Dolar'] ? $data2['Dolar'] : $data1['Dolar'];
        $tmp['Euro'] = $data1['Euro'] > $data2['Euro'] || $data1['Euro'] == $data2['Euro'] ? $data2['Euro'] : $data1['Euro'];
        $tmp['Sterlin'] = $data1['Sterlin'] > $data2['Sterlin'] || $data1['Sterlin'] == $data2['Sterlin'] ? $data2['Sterlin'] : $data1['Sterlin'];
        return $tmp;
    }
}