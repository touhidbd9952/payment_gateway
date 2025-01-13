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
}
