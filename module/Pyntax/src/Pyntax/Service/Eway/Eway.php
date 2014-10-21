<?php
namespace Pyntax\Service\Eway;

use Pyntax\Model\EwayHeader;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Soap\Client as SoapClient;

/**
 * This is an eway server object as well as the SoapClient.
 *
 * Class Eway
 * @package Pyntax\Service\Eway
 */
class Eway extends SoapClient implements ServiceLocatorAwareInterface
{

    /**
     * @var string
     */
    protected $ns               = 'https://www.eway.com.au/gateway/managedpayment';

    /**
     * @var string
     */
    protected $eWAYCustomerID   = "";

    /**
     * @var string
     */
    protected $Username         = "";

    /**
     * @var string
     */
    protected $Password         = "";

    /**
     * @var
     */
    protected $serviceLocator;

    public function __construct()
    {
        parent::__construct($this->getClientWSDLUrl()."?WSDL");
    }

    /**
     * @throws \Exception
     */
    public function getEwayConfig()
    {
        $config = $this->getServiceLocator()->get('config');
        if(array_key_exists('eway',$config))
        {
            $requiredIndexes = array('eWAYCustomerID','Username','Password');
            foreach($requiredIndexes as $rIndex)
            {
                if(!array_key_exists($rIndex,$config['eway'])) {
                    throw new \Exception($rIndex." is missing from the eway config");
                } else {
                    $this->$rIndex = $config['eway'][$rIndex];
                }
            }
        }

        //After the eway config has been loaded set the request headers
        $this->setRequestHeader();
    }

    /**
     * This function sets the headers required to send a request for the Eway Token Payment
     */
    protected function setRequestHeader()
    {
        $eWayHeaderData 				= new \stdClass;
        $eWayHeaderData->eWAYCustomerID = new \SoapVar($this->eWAYCustomerID,XSD_STRING,null, null, 'eWAYCustomerID',$this->ns);
        $eWayHeaderData->Username 		= new \SoapVar($this->Username,XSD_STRING,null, null, 'Username',$this->ns);
        $eWayHeaderData->Password 		= new \SoapVar($this->Password,XSD_STRING,null, null, 'Password',$this->ns);
        $headerData 					= new \SoapVar($eWayHeaderData,SOAP_ENC_OBJECT);
        $SoapHeader 				    = new \SoapHeader($this->ns,'eWAYHeader',$headerData, false);
        $this->addSoapInputHeader($SoapHeader);
    }

    public function getClientWSDLUrl()
    {
        return 'https://www.eway.com.au/gateway/ManagedPaymentService/managedCreditCardPayment.asmx';
    }

    /**
     * Set service locator
     *
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;

        //This function fetches the eway config array from the autoload/eway.local.php
        $this->getEwayConfig();
    }

    /**
     * Get service locator
     *
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }
}