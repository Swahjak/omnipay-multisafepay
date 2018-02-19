<?php

namespace Omnipay\MultiSafepay;

class MultiSafepayTaxTables implements \JsonSerializable
{
    /**
     * @var array
     */
    protected $default = array('shipping_taxed' => false, 'rate' => 0);

    /**
     * @var array|MultiSafepayAlternateTaxTableRow[]
     */
    protected $alternate = array();

    /**
     * @param float $rate
     */
    public function setDefaultRate($rate)
    {
        $this->default['rate'] = (float) $rate;
    }

    /**
     * @param bool $shippingTaxed
     */
    public function setDefaultShippingTaxed($shippingTaxed)
    {
        $this->default['shipping_taxed'] = (bool) $shippingTaxed;
    }

    /**
     * @param MultiSafepayAlternateTaxTableRow $row
     */
    public function addAlternateTaxTableRow(MultiSafepayAlternateTaxTableRow $row)
    {
        foreach($this->alternate as $alternateTableRow) {

            if($row->getName() === $alternateTableRow->getName()) {

                return;
            }
        }

        $this->alternate[] = $row;
    }

    /**
     * @return array|mixed
     */
    public function jsonSerialize()
    {
        return array_filter(array(
            'default' => $this->default,
            'alternate' => $this->alternate
        ));
    }
}