<?php

namespace App\Http\Controllers;

use App\Utility\SoutheastAPILib;
use App\Utility\SoutheastConfiguration;
use App\Utility\SoutheastConnection;
use App\Utility\SoutheastPerse;
use Illuminate\Support\Facades\Session;


use Illuminate\Http\Request;

class SoutheastPaymentController extends Controller
{
    public function southeast_payment()
    {
        return view('southeast_payment');
    }

    public function payment_confirmation(Request $request)
    {
        //dd($request->all());
        
        $Intoperation = $request->int_op;  //initial operation  
        $order_amount = $request->order_amount;   
        $order_id  = $request->merchant_order_id;
        $customer_receipt_email = "'" . $request->customer_receipt_email . "'";
        $order_currency = $request->order_currency;

        //$data["signed_field_names"] = $request->signed_field_names;
        //Creates the Merchant Object from config. If you are using multiple merchant ID's, 
		// you can pass in another configArray each time, instead of using the one from configuration.php
        $configArray = array();
        $configArray["certificateVerifyPeer"] = env('SOUTHEAST_certificateVerifyPeer');
        $configArray["certificateVerifyHost"] = env('SOUTHEAST_certificateVerifyHost',0);
        $configArray["gatewayUrl"] = env('SOUTHEAST_gatewayUrl','https://test-southeastbank.mtf.gateway.mastercard.com/api/nvp/');
        $configArray["merchantId"] = env('SOUTHEAST_merchantId','TESTSEBPAPERLESS');
        $configArray["apiUsername"] = env('SOUTHEAST_apiUsername',"Merchant.TESTSEBPAPERLESS");
        $configArray["password"] = env('SOUTHEAST_password','70cc59c5d253fdb3f01825e7d7f816ef');
        $configArray["debug"] = env('SOUTHEAST_debug',TRUE);
        $configArray["version"] = env('SOUTHEAST_version','71');

        $merchantObj = new SoutheastConfiguration($configArray);  //dd($merchantObj);

        // The Parser object is used to process the response from the gateway and handle the connections
        // and uses connection.php
        $parserObj = new SoutheastPerse($merchantObj);

        //The Gateway URL can be set by using the following function, or the 
        //value can be set in configuration.php
        //$merchantObj->SetGatewayUrl("https://secure.uat.tnspayments.com/api/nvp");	
        $requestUrl = $parserObj->FormRequestUrl($merchantObj);
  
        //This is a library if useful functions
        $new_api_lib = new SoutheastAPILib;

        //Use a method to create a unique Order ID. Store this for later use in the receipt page or receipt function.
        $order_id = $new_api_lib->getRandomString(10);  
             
        //Form the array to obtain the checkout session ID.									 
        $request_assoc_array = array("apiOperation"=>"INITIATE_CHECKOUT",
                              "interaction.operation"=>$Intoperation,
                                              "order.id"=>$order_id,
                                              "order.amount"=>$order_amount,
                                              "order.currency"=>$order_currency,
                              "order.description"=>"This is the order description",
                              "interaction.merchant.name"=>"The Company Co",
                              "interaction.merchant.url"=>"https://www.merchant-site.com",
                              "interaction.merchant.logo"=>"https://upload.wikimedia.org/wikipedia/commons/2/21/Verlagsgruppe_Random_House_Logo_2016.png",
                              "interaction.displayControl.billingAddress"=>"HIDE",
                              "interaction.displayControl.customerEmail"=>"HIDE",
                              "interaction.displayControl.shipping"=>"HIDE",
                              "interaction.timeout"=>1800,
                              "interaction.timeoutUrl"=>"https://www.merchant-site.com",
                              "interaction.cancelUrl"=>"https://www.merchant-site.com",
                              "billing.address.city"=>"St Louis",
                              "billing.address.stateProvince"=>"MO",
                              "billing.address.country"=>"USA",
                              "billing.address.postcodeZip"=>"63102",
                              "billing.address.street"=>"11 N 4th St",
                              "billing.address.street2"=>"The Gateway Arch",
                              "customer.email"=>"me@me.com",
                              "customer.firstName"=>"John",
                              "customer.lastName"=>"Doe",
                              "customer.mobilePhone"=>"+1 5557891230",
                              "customer.phone"=>"+1 1234567890",
                          );
                                                               
        //This builds the request adding in the merchant name, api user and password.											 		
        $trensrequest = $parserObj->ParseRequest($merchantObj, $request_assoc_array);

                          
        //Submit the transaction request to the payment server
        $response = $parserObj->SendTransaction($merchantObj,$trensrequest);   //dd($response);
        
      
        //Parse the response
        $parsed_array = $new_api_lib->parse_from_nvp($response);	//dd($parsed_array);						 

        //Store the successIndicator for later use in the receipt page or receipt function.
        $successIndicator = "";
        if (array_key_exists("successIndicator",$parsed_array))
        { 
            $successIndicator = $parsed_array['successIndicator'];
        }  //dd($successIndicator);

        //The session ID is passed to the Checkout.configure() function below.
        $session_id = "";
        if (array_key_exists("session.id",$parsed_array))
        {
            $session_id = $parsed_array['session.id'];
        }

        //Store the variables in the session, or a database could be used for example
        if (array_key_exists("successIndicator",$parsed_array))
        {
            $_SESSION['successIndicator']= $successIndicator;
        }
        if (array_key_exists("orderID",$parsed_array))
        {
            $_SESSION['orderID']= $order_id;
        }
        
        $merchantID = "'" . $merchantObj->GetMerchantId() . "'";    //dd($successIndicator);

        return view('southeast_payment_order_summary', compact('order_amount','order_currency','session_id'));
    }

    public function callback(Request $request)
    {
        $successIndicator = Session::get('successIndicator');
        $resultIndicator = "";
        if(isset($request->resultIndicator)){$resultIndicator = $request->resultIndicator;}

        $configArray = array();
        $configArray["certificateVerifyPeer"] = env('SOUTHEAST_certificateVerifyPeer');
        $configArray["certificateVerifyHost"] = env('SOUTHEAST_certificateVerifyHost',0);
        $configArray["gatewayUrl"] = env('SOUTHEAST_gatewayUrl','https://test-southeastbank.mtf.gateway.mastercard.com/api/nvp/');
        $configArray["merchantId"] = env('SOUTHEAST_merchantId','TESTSEBPAPERLESS');
        $configArray["apiUsername"] = env('SOUTHEAST_apiUsername',"Merchant.TESTSEBPAPERLESS");
        $configArray["password"] = env('SOUTHEAST_password','70cc59c5d253fdb3f01825e7d7f816ef');
        $configArray["debug"] = env('SOUTHEAST_debug',TRUE);
        $configArray["version"] = env('SOUTHEAST_version','71');

        return view('southeast_callback_result', compact('successIndicator','resultIndicator','configArray'));
    }






}
