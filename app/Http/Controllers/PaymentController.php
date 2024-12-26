<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function paperless_payment()
    {
        return view('paperless_payment');
    }
    public function paperless_createTransaction(Request $request)
    {
        //dd($request->all());
       

        $data = array(
        '_token' => $request->input('_token'),
        'access_app_key' => $request->input('access_app_key'),
        'muid' => $request->input('muid'),
        'merchant_order_id' => $request->input('merchant_order_id'),
        'merchant_ref_id' => $request->input('merchant_ref_id'),
        'customer_name' => $request->input('customer_name'),
        'customer_email' => $request->input('customer_email'),
        'customer_add' => $request->input('customer_add'),
        'customer_phone' => $request->input('customer_phone'),
        'customer_city' => $request->input('customer_city'),
        'customer_postcode' => $request->input('customer_postcode'),
        'customer_country' => $request->input('customer_country'),
        'shipping_name' => $request->input('shipping_name'),
        'shipping_email' => $request->input('shipping_email'),
        'shipping_add' => $request->input('shipping_add'),
        'shipping_city' => $request->input('shipping_city'),
        'shipping_country' => $request->input('shipping_country'),
        'shipping_postcode' => $request->input('shipping_postcode'),
        'product_desc' => $request->input('product_desc'),
        'amount' => $request->input('amount'),
        'currency' => $request->input('currency'),
        'approve_url' => $request->input('approve_url'),
        'cancel_url' => $request->input('cancel_url'),
        'decline_url' => $request->input('decline_url'),
        );

        //$client = new Client(['verify' => false]);
        $url = "https://payment.paperlessltd.com/api/v1/gateway/payment-process/initiate";
        //$command = $client->post($url, $data);
        //$command = $client->post($url);
        //$command = Http::post($url, $data);

        $client = new \GuzzleHttp\Client(['verify' => false]);
        $response = $client->request('POST', $url, $data);

        dd($response);
        //$command = "java -jar {$jarpath} {$PropertiesPath} -v {$amount} 050 {$clientIp} {$cardType}{$description}";
        
        //$output = shell_exec($command);  dd($command);
        $output = exec($command);  dd($output);
        
        if (preg_match('/TRANSACTION_ID:\s([^\s]+)/', $output, $matches)) 
        {
            $transactionId = $matches[1];
            $encodedTransId = urlencode($transactionId);
            $redirectUrl =
            "https://ecomtest.dutchbanglabank.com/ecomm2/ClientHandler?card_type={$cardType}&trans_id={$encodedTransId}";

            return redirect()->away($redirectUrl);
        }

    }
}
