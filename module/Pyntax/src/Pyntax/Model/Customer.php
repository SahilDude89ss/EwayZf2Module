<?php
/**
 * Created by PhpStorm.
 * User: sahil
 * Date: 7/5/14
 * Time: 12:50 PM
 */

namespace Pyntax\Model;

/**
 * Class Customer
 * @package Pyntax\Model
 */
class Customer extends EwayModel
{
    protected $Title;
    protected $FirstName;
    protected $LastName;
    protected $Address;
    protected $Suburb;
    protected $State;
    protected $Company;
    protected $PostCode;
    protected $Country;
    protected $Email;
    protected $Fax;
    protected $Phone;
    protected $Mobile;
    protected $CustomerRef;
    protected $JobDesc;
    protected $Comments;
    protected $URL;
    protected $CCNumber;
    protected $CCNameOnCard;
    protected $CCExpiryMonth;
    protected $CCExpiryYear;

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->Address;
    }

    /**
     * @return mixed
     */
    public function getCCExpiryMonth()
    {
        return $this->CCExpiryMonth;
    }

    /**
     * @return mixed
     */
    public function getCCExpiryYear()
    {
        return $this->CCExpiryYear;
    }

    /**
     * @return mixed
     */
    public function getCCNameOnCard()
    {
        return $this->CCNameOnCard;
    }

    /**
     * @return mixed
     */
    public function getCCNumber()
    {
        return $this->CCNumber;
    }

    /**
     * @return mixed
     */
    public function getComments()
    {
        return $this->Comments;
    }

    /**
     * @return mixed
     */
    public function getCompany()
    {
        return $this->Company;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->Country;
    }

    /**
     * @return mixed
     */
    public function getCustomerRef()
    {
        return $this->CustomerRef;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @return mixed
     */
    public function getFax()
    {
        return $this->Fax;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * @return mixed
     */
    public function getJobDesc()
    {
        return $this->JobDesc;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->Mobile;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->Phone;
    }

    /**
     * @return mixed
     */
    public function getPostCode()
    {
        return $this->PostCode;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->State;
    }

    /**
     * @return mixed
     */
    public function getSuburb()
    {
        return $this->Suburb;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->Title;
    }

    /**
     * @return mixed
     */
    public function getURL()
    {
        return $this->URL;
    }


} 