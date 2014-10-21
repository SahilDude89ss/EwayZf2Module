<?php
/**
 * Created by PhpStorm.
 * User: sahil
 * Date: 6/27/14
 * Time: 1:46 PM
 */

namespace Pyntax\Controller;

use Pyntax\Model\Customer;
use Pyntax\Model\PaymentDetails;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Soap\Client as SoapClient;
use Pyntax\Service\Eway\Eway;
use Zend\Config\Config;

class TestController extends AbstractActionController
{
    public function indexAction()
    {
        $ewayService = $this->getServiceLocator()->get('Pyntax\Service\Eway\Eway');
//        $SoapClient = new SoapClient($ewayService->getClientWSDLUrl().'?WSDL');
//
//        $ns = 'https://www.eway.com.au/gateway/managedpayment';
//
//        $eWayHeaderData 						= new \stdClass;
//        $eWayHeaderData->eWAYCustomerID 		= new \SoapVar('91447139',XSD_STRING,null, null, 'eWAYCustomerID',$ns);
//        $eWayHeaderData->Username 		    = new \SoapVar('sahildude89ss@gmail.com.sand',XSD_STRING,null, null, 'Username',$ns);
//        $eWayHeaderData->Password 			= new \SoapVar('Shashwati88',XSD_STRING,null, null, 'Password',$ns);
//        $headerData 							= new \SoapVar($eWayHeaderData,SOAP_ENC_OBJECT);
//        $SoapHeader 							= new \SoapHeader($ns,'eWAYHeader',$headerData, false);
//        $SoapClient->addSoapInputHeader($SoapHeader);

        try
        {
            $PaymentDetails = new PaymentDetails();
            $PaymentDetails->setManagedCustomerID(918438015732);
            $PaymentDetails->setAmount(1200);
            $PaymentDetails->setInvoiceReference('Invoice with 1200');
            $PaymentDetails->setInvoiceDescription('Invoice paid for Simple Manager');

            $r = $ewayService->ProcessPayment($PaymentDetails);
            echo "<pre>";
            var_dump($r);
//            $Customer = new Customer();
//            $Customer->Title            = 'Mr.';
//            $Customer->FirstName        = 'Sahil';
//            $Customer->LastName         = 'Sharma';
//            $Customer->Address          = '9 Station St';
//            $Customer->Suburb           = 'Kogarah';
//            $Customer->State            = 'NSW';
//            $Customer->Company          = 'Pyntax Inc';
//            $Customer->PostCode         = '2217';
//            $Customer->Country          = 'au';
//            $Customer->Email            = 'SahilDude89ss@gmail.com';
//            $Customer->Fax              = '0295531135';
//            $Customer->Phone            = '0295531135';
//            $Customer->Mobile           = '0402739126';
//            $Customer->CustomerRef      = '108';
//            $Customer->JobDesc          = 'Senior Developer';
//            $Customer->Comments         = 'This is the senior developer';
//            $Customer->URL              = 'http://pyntax.com';
//            $Customer->CCNameOnCard     = 'Sahil Sharma';
//            $Customer->CCNumber         = '1111222233334444';
//            $Customer->CCExpiryMonth    = '12';
//            $Customer->CCExpiryYear     = '15';
//
//            echo "<pre>";
//            $r = $ewayService->CreateCustomer($Customer);
//            var_dump($r);

            die;
        }
        catch(\Exception $e)
        {
            var_dump($e->getMessage());
            die;
        }
    }
} 