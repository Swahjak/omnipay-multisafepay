<?php

namespace Omnipay\MultiSafepay;

/**
 * Class MultiSafepayCheckoutOptions
 */
class MultiSafepayCheckoutOptions implements \JsonSerializable
{
    /**
     * @var null|MultiSafepayTaxTables
     */
    protected $taxTables;

    /**
     * @param MultiSafepayTaxTables $taxTables
     */
    public function setTaxTables(MultiSafepayTaxTables $taxTables)
    {
        $this->taxTables = $taxTables;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return array_filter(array(
            'tax_tables' => $this->taxTables
        ));
    }
}