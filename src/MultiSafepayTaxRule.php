<?php

namespace Omnipay\MultiSafepay;

class MultiSafepayTaxRule implements \JsonSerializable
{
    /**
     * @var float
     */
    protected $rate;

    /**
     * @var string
     */
    protected $country;

    /**
     * @return float
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param float $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return array(
            'rate' => $this->rate,
            'country' => $this->country
        );
    }
}