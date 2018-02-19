<?php

namespace Omnipay\MultiSafepay;

class MultiSafepayAlternateTaxTableRow implements \JsonSerializable
{
    /**
     * @var bool
     */
    protected $standalone = false;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var array
     */
    protected $rules = array();

    /**
     * @return bool
     */
    public function isStandalone()
    {
        return $this->standalone;
    }

    /**
     * @param bool $standalone
     */
    public function setStandalone($standalone)
    {
        $this->standalone = $standalone;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getRules()
    {
        return $this->rules;
    }

    /**
     * @param MultiSafepayTaxRule $rule
     */
    public function addRule(MultiSafepayTaxRule $rule)
    {
        $this->rules[] = $rule;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return array_filter(array(
           'name' => $this->name,
           'standalone' => $this->standalone,
           'rules' => $this->rules
        ));
    }
}