<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use URL;


class DBBLPaymentController extends Controller
{
    public function dbbl_payment()
    {
        return view('dbbl_payment');
    }

    protected $merchantPropertiesPath = "merchant.properties";
    protected $jarFilePath = 'ecomm_merchant.jar';

    public function createTransaction(Request $request)
    {
        $PropertiesPath = storage_path('app\dbbl\merchant.properties'); 
        $jarpath = storage_path('app\dbbl\ecomm_merchant.jar'); 
        //$jarpath = url('/').$this->jarFilePath;
        //$PropertiesPath = url('/').$this->merchantPropertiesPath;


        $amount = (int)$request->input('amount');  
        $cardType = $request->input('card_type');
        $clientIp = $request->ip();   
        $description = $request->input('description');
        $merchant_name = "PaperlessEdu-Test";
        $submerchant_id = "000599002880001";
        $terminal_id = "59907769";

        $command = "java -jar {$jarpath} {$PropertiesPath} -v {$amount} 050 {$clientIp} {$cardType}{$description} --merchant_name={$merchant_name} --etid=Y --submerchant_id={$submerchant_id} --terminal_id={$terminal_id} --dbblpan=123456";
        
        //dd($command);
        $output = shell_exec($command);  //dd($output);
        //$output = exec($command);  //dd($output);
        
        if (preg_match('/TRANSACTION_ID:\s([^\s]+)/', $output, $matches)) 
        {
            $transactionId = $matches[1]; 
            $encodedTransId = urlencode($transactionId);
            $redirectUrl =
            "https://ecomtest.dutchbanglabank.com/ecomm2/ClientHandler?card_type={$cardType}&trans_id={$encodedTransId}";

            return redirect()->away($redirectUrl);
        }

        return response()->json(['error' => 'Transaction creation failed.'], 500);
    }

    public function completeTransaction(Request $request)
    {
        $PropertiesPath = storage_path('app\dbbl\merchant.properties'); 
        $jarpath = storage_path('app\dbbl\ecomm_merchant.jar'); 

        $transactionId = $request->input('trans_id');  //dd($transactionId);
        //$encodedTransId = urlencode($transactionId);
        $clientIp = $request->ip();
        $command = "java -jar {$jarpath} {$PropertiesPath} -c {$transactionId} {$clientIp}";   //dd($command);
        $output = shell_exec($command); //dd($output);
        //$output = exec($command);  
        $result = [];
        preg_match_all('/(\w+):\s([^\n]+)/', $output, $matches, PREG_SET_ORDER);   
        foreach ($matches as $match) 
        {
            $result[$match[1]] = $match[2];
        }
        if (isset($result['RESULT']) && $result['RESULT'] === 'OK' && isset($result['RESULT_CODE']) && $result['RESULT_CODE'] === '000') 
        {
            return response()->json(['message' => 'Transaction successful!', 'details' => $result]);
        }

        return response()->json(['error' => 'Transaction failed.', 'details' => $result]);
    }



}
