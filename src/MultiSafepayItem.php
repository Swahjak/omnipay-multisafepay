<?php

namespace Omnipay\MultiSafepay;

use Omnipay\Common\Item;

/**
 * Class MultiSafepayItem
 */
class MultiSafepayItem extends Item implements \JsonSerializable
{
    /**
     * @return null|int|string
     */
    public function getMerchantItemId()
    {
        return $this->parameters->get('merchant_id');
    }

    /**
     * @param int|string $id
     *
     * @return MultiSafepayItem
     */
    public function setMerchantItemId($id)
    {
        $this->parameters->set('merchant_id', $id);

        return $this;
    }

    /**
     * @return null|string
     */
    public function getTaxTableSelector()
    {
        return $this->parameters->get('merchant_table_selector');
    }

    /**
     * @param string $selector
     *
     * @return MultiSafepayItem
     */
    public function setTaxTableSelector($selector)
    {
        $this->parameters->set('tax_table_selector', $selector);

        return $this;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return array(
            'name' => $this->getParameter('name'),
            'description' => $this->getParameter('description'),
            'quantity' => $this->getParameter('quantity'),
            'unit_price' => round($this->getParameter('price'), 10),
            'merchant_id' => $this->getParameter('merchant_id'),
            'tax_table_selector' => $this->getParameter('tax_table_selector')
        );
    }
}