<?php

namespace Omnipay\MultiSafepay\Message;

use Omnipay\Common\Message\ResponseInterface;

class RestUpdatePurchaseRequest extends RestAbstractRequest
{
    /**
     * @param string
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setStatus($status)
    {
        return $this->setParameter('status', $status);
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->getParameter('status');
    }

    /**
     * @param string
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setInvoiceId($invoiceId)
    {
        return $this->setParameter('invoice_id', $invoiceId);
    }

    /**
     * @return string
     */
    public function getInvoiceId()
    {
        return $this->getParameter('invoice_id');
    }

    /**
     * @param string
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setTrackTraceCode($trackTraceCode)
    {
        return $this->setParameter('tracktrace_code', $trackTraceCode);
    }

    /**
     * @return string
     */
    public function getTrackTraceCode()
    {
        return $this->getParameter('tracktrace_code');
    }

    /**
     * @param string
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setTrackTraceUrl($trackTraceCode)
    {
        return $this->setParameter('tracktrace_url', $trackTraceCode);
    }

    /**
     * @param string
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setCarrier($carrier)
    {
        return $this->setParameter('carrier', $carrier);
    }
    /**
     * @param string
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setShipDAte($shipDate)
    {
        return $this->setParameter('ship_date', $shipDate);
    }

    /**
     * @param string
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setReason($reason)
    {
        return $this->setParameter('ship_date', $reason);
    }
    /**
     * Get the required data which is needed
     * to execute the API request.
     *
     * @return array
     * @throws \Omnipay\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        parent::getData();

        $this->validate('transactionId');

        $transactionId = $this->getTransactionId();

        return array(
            'transactionId' => $transactionId
        );
    }

    /**
     * @param array $data
     *
     * @return ResponseInterface|RestUpdatePurchaseResponse
     */
    public function sendData($data)
    {
        unset($data['transactionId']);

        $httpResponse = $this->sendRequest(
            'PATCH',
            '/orders/' . $this->getTransactionId(),
            $data
        );

        $this->response = new RestUpdatePurchaseResponse(
            $this,
            $httpResponse->json()
        );

        return $this->response;
    }

}