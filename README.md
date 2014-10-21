EwayZf2Module
=============

Eway's Token Payment put together in a ZF2 module.

Example
--------

```
/**
 * This function is used to process the payment using the TokenPayment method in Eway's API. This should be located preferrably in a Service 
 * from where it can reused
 *
 * @param $managedCustomerID
 * @param $amount
 * @param $invoiceDescription
 * @param $invoiceReference
 *
 * @return bool
 */
public function processPayment($managedCustomerID, $amount, $invoiceDescription, $invoiceReference)
{
    $PaymentDetails = new PaymentDetails($managedCustomerID,$amount,$invoiceDescription,$invoiceReference);
    $ewayService = $this->getServiceLocator()->get('Pyntax\Service\Eway\Eway');
    try {
    	//ProcessPayment is a function in the EWay API
        $response = $ewayService->ProcessPayment($PaymentDetails);

        if(is_object($response) && isset($response->ewayResponse->ewayTrxnError))
        {
            $trxnResponseCode = preg_split("/,/",$response->ewayResponse->ewayTrxnError);
            if(is_array($trxnResponseCode) && sizeof($trxnResponseCode) > 0)
            {
                if($trxnResponseCode[0] == "00")
                {
                    return true;
                }
            }
        }
    }
    catch(\Exception $e) {
        var_dump($e);
        return false;
    }

    return false;
}
```
