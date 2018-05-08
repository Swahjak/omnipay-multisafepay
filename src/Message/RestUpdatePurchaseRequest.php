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
    public function setTrackTraceUrl($trackTraceUrl)
    {
        return $this->setParameter('tracktrace_url', $trackTraceUrl);
    }

    /**
     * @return string
     */
    public function getTrackTraceUrl()
    {
        return $this->getParameter('tracktrace_url');
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
     * @return string
     */
    public function getCarrier()
    {
        return $this->getParameter('carrier');
    }

    /**
     * @param string
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setShipDate($shipDate)
    {
        return $this->setParameter('ship_date', $shipDate);
    }

    /**
     * @return string
     */
    public function getShipDate()
    {
        return $this->getParameter('ship_date');
    }

    /**
     * @param string
     *
     * @return \Omnipay\Common\Message\AbstractRequest
     */
    public function setReason($reason)
    {
        return $this->setParameter('reason', $reason);
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->getParameter('reason');
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

        $this->validate('transactionId', 'status');

        $data = array(
            'transactionId' => $this->getTransactionId(),
            'status' => $this->getStatus()
        );

        if($this->getInvoiceId()) {

            $data['invoiced_id'] = $this->getInvoiceId();
        }

        if($this->getTrackTraceCode()) {

            $data['tracktrace_code'] = $this->getTrackTraceCode();
            $data['carrier'] = $this->getCarrier();

            if($this->getTrackTraceUrl()) {

                $data['tracktrace_url'] = $this->getTrackTraceUrl();
            }
        }

        if($this->getReason()) {

            $data['reason'] = $this->getReason();
        }

        return $data;
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