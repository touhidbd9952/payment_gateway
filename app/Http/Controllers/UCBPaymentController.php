<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UCBPaymentController extends Controller
{
    public function ucb_payment()
    {
        return view('ucb_payment');
    }

    public function payment_confirmation(Request $request)
    {
        
        $data = array();
        $data["_token"] = $request->_token;
        $data["access_key"] = $request->access_key;
        $data["profile_id"] = $request->profile_id;
        $data["transaction_uuid"] = $request->transaction_uuid;
        $data["signed_field_names"] = $request->signed_field_names;
        $data["signed_date_time"] = $request->signed_date_time;
        $data["locale"] = $request->locale;
        $data["bill_to_forename"] = $request->bill_to_forename;
        $data["bill_to_surname"] = $request->bill_to_surname;
        $data["bill_to_address_city"] = $request->bill_to_address_city;
        $data["bill_to_address_country"] = $request->bill_to_address_country;
        $data["bill_to_address_line1"] = $request->bill_to_address_line1;
        $data["bill_to_address_postal_code"] = $request->bill_to_address_postal_code;
        $data["bill_to_address_state"] = $request->bill_to_address_state;
        $data["bill_to_email"] = $request->bill_to_email;
        $data["transaction_type"] = $request->transaction_type;
        $data["reference_number"] = $request->reference_number;
        $data["auth_trans_ref_no"] = $request->auth_trans_ref_no;
        $data["amount"] = $request->amount;
        $data["currency"] = $request->currency;
        $data["submit"] = $request->submit;
        
        return view('ucb_payment_confirmation', compact("data"));
        
    }
    //ucb_payment_receipt
    public function ucb_payment_receipt(Request $data)
    {
        $result = "";
        $message = "";
        $result = $data['reason_code'];
        $message = $data['message'];
        
        if($result == "100"){
            //Successful transaction
            //insert payment data in database 

            //give customer a success message
            return view('ucb_payment_receipt', compact("data","result","message"));
        }
        else
        {
            //show error message to customer
            return view('ucb_payment_receipt', compact("data","result","message"));
        }
        //return view('ucb_payment_receipt', compact($data));
    }
}
