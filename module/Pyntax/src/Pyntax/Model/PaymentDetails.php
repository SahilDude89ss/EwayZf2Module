<?php

namespace Pyntax\Model;

class PaymentDetails extends EwayModel
{

    /**
     * @var \SoapVar
     */
    protected $managedCustomerID;

    /**
     * @var \SoapVar
     */
    protected $amount;

    /**
     * @var \SoapVar
     */
    protected $invoiceReference;

    /**
     * @var \SoapVar
     */
    protected $invoiceDescription;

    /**
     * @return \SoapVar
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @return \SoapVar
     */
    public function getInvoiceDescription()
    {
        return $this->invoiceDescription;
    }


    /**
     * @return \SoapVar
     */
    public function getInvoiceReference()
    {
        return $this->invoiceReference;
    }

    /**
     * @return \SoapVar
     */
    public function getManagedCustomerID()
    {
        return $this->managedCustomerID;
    }
}