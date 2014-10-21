<?php
/**
 * Created by PhpStorm.
 * User: sahil
 * Date: 7/5/14
 * Time: 12:56 PM
 */

namespace Pyntax\Model;

/**
 * Class EwayModel
 * @package Pyntax\Model
 */
class EwayModel
{
    /**
     * @var string
     */
    protected $ns = 'https://www.eway.com.au/gateway/managedpayment';

    /**
     * All the properties are XSD_STRING by default
     *
     * @var array
     */
    protected $propertyTypeMap = array
    (

        'Customer'      => array
        (
            'CCExpiryMonth'     => XSD_INT,
            'CCExpiryYear'      => XSD_INT
        ),

        'PaymentDetails' => array
        (
            'managedCustomerID' => XSD_LONG,
            'amount'            => XSD_INT
        ),

        'EwayHeader'    => array(

        )
    );

    /**
     * @param $name
     * @param $arguments
     *
     * @return mixed
     */
    function __call($name, $arguments)
    {
        /**
         * If the first three letter are set then call the __set function then we are calling the set function
         */
        if(preg_match("/[set]{3}/",$name))
        {
            $variableName = lcfirst(str_replace('set','',$name));
            $this->$variableName = $arguments[0];
        }
        else
        {
            if(is_callable(array($this,$name)))
            {
                return call_user_func_array(array($this,$name),$arguments);
            }
        }
    }


    /**
     * @param $name
     * @param $value
     */
    public function __set ( $name , $value )
    {
        if(property_exists($this,$name))
        {
            //Get property object type
            $propertyClassType = $this->getPropertyType( get_class($this), $name );
            $this->$name = new \SoapVar( $value, $propertyClassType, null, null, $name, $this->ns);
        }
    }

    /**
     * @param $class
     * @param $val
     *
     * @return int|null
     */
    protected function getPropertyType($class,$val)
    {
        if(array_key_exists($class,$this->propertyTypeMap))
        {
            if(array_key_exists($val,$this->propertyTypeMap[$class]))
            {
                return $this->propertyTypeMap[$class][$val];
            }
            else
            {
                return XSD_STRING;
            }
        }

        return null;
    }
} 