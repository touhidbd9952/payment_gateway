
@extends('layouts.master')

@section('content')


<?php


session_start();


error_reporting(E_ALL);

$errorMessage = "";
$errorCode = "";
$gatewayCode = "";
$result = "";

$responseArray = array();

//$resultInd =  $_GET["resultIndicator"];
//$resultInd = $successIndicator;

?>



      <title>Receipt | Hosted Checkout</title>


		<p style="text-align:center;"><a href="./index.html"><img src="https://c.ap1.content.force.com/servlet/servlet.ImageServer?id=01590000008h62j&oid=00D90000000sUDO" alt="Main Order Home Page" /></a></p>
    <center><h1><br/><u>Payment Receipt Page</u></h1></center>
 
    
<?php
//compare two string, if both result is same then return 0
if (strcmp($resultIndicator, $successIndicator) == 0)
	{
?>
		 <tr class="title">
             <td colspan="2" height="25"><P><strong>&nbsp;</strong></P></td>
         </tr>
         <tr>
             <td align="right" width="50%"><strong><center><h1>Your Payment was successful!</h1></center></strong></td>
         </tr>    
<?php

	}
	else
	{
?>

	<tr class="title">
             <td colspan="2" height="25"><P><strong>&nbsp;</strong></P></td>
         </tr>
         <tr>
             <td align="right" width="50%"><strong><center><h1>Your Payment was Unsuccessful!</h1></center></strong></td>
         </tr>
<?php
	}
?>


  <table width="60%" align="center" cellpadding="5" border="0">

  <?php
    // echo HTML displaying Error headers if error is found
    if ($errorCode != "" || $errorMessage != "") {
  ?>
      <tr class="title">
             <td colspan="2" height="25"><P><strong>&nbsp;Error Response</strong></P></td>
         </tr>
         <tr>
             <td align="right" width="50%"><strong><i><?=$errorCode?>: </i></strong></td>
             <td width="50%"><?=$errorMessage?></td>
         </tr>
  <?php
    }
    else {
  ?>
      <tr class="title">
             <td colspan="2" height="25"><P><strong>&nbsp;<?=$gatewayCode?></strong></P></td>
         </tr>
        
  <?php
     }
  ?>
         
  </table>

  <br/><br/>
   
   <?php
   
   $orderID = Session::get('orderID');
	 
	 $merchantObj = new App\Utility\SoutheastConfiguration($configArray);

	 $parserObj = new App\Utility\SoutheastPerse($merchantObj);

	 $requestUrl = $parserObj->FormRequestUrl($merchantObj);

	 $request_assoc_array = array("apiOperation"=>"RETRIEVE_ORDER",
														 		"order.id"=>$orderID
														 );
	 
	 $request = $parserObj->ParseRequest($merchantObj, $request_assoc_array);
	 $response = $parserObj->SendTransaction($merchantObj, $request);
	 
	 $new_api_lib = new App\Utility\SoutheastAPILib;
	 $parsed_array = $new_api_lib->parse_from_nvp($response); //dd($parsed_array);
	 
   ?>
   
  	
   {{-- <table width="60%" align="center" cellpadding="5" border="0">
   	<center>
   		
  			 <tr class="title">
             <td colspan="2" height="25"><h1><u><strong>&nbsp;Order Details</strong></h1></u></td>
         </tr>
         <tr>
             <td colspan="2" height="25"><strong>&nbsp;Merchant: {{ $parsed_array['merchant'] ? $parsed_array['merchant'] : '' }} </strong></td>
         </tr>
          <tr>
             <td colspan="2" height="25"><strong>&nbsp;Order Amount: {{ $parsed_array['totalAuthorizedAmount'] ? $parsed_array['totalAuthorizedAmount'] : '' }}  </strong></td>
         </tr>
         <tr>
             <td colspan="2" height="25"><strong>&nbsp;Order Curreny: {{ $parsed_array['currency'] ? $parsed_array['currency'] : '' }}  </strong></td>
         </tr>
         <tr>
             <td colspan="2" height="25"><strong>&nbsp;Order ID: {{ $orderID ? $orderID : '' }}  </strong></td>
         </tr>
         <tr>
             <td colspan="2" height="25"><strong>&nbsp;City: {{ $parsed_array['billing.address.city'] ? $parsed_array['billing.address.city'] : '' }}  </strong></td>
         </tr>
    </center>   
     </table> --}}
         
      
		<h2 align="center"><a href="{{route('/')}}">Return to Home</a></h2>
   
    


@endsection