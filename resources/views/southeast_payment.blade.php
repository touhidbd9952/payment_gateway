@extends('layouts.master')

@section('content')




 <!-- Swiper -->
 <!-- Breadcrumbs-->
 <style>
    .header {
      text-align: center;
      background-color: #f5a63f;
      width: 100%;
      margin: 0px auto;
        margin-bottom: 0px;
      margin-bottom: 40px;
      z-index: 999;
      padding: 40px 20px 20px;
      color: #ffffff;
    }
    .container-fluid {
      width: 100%;
      margin: 0px;
      padding: 0px;
    }
    .box {
      background-color: rgba(0,0,0,0);
      margin: 2px;
      padding: 0px 0;
    }
    i {
      color: #fff;
      font-size: 36px;
      padding-right: 10px;
    }
    h1 {
      font-family: 'Roboto';
      font-size: 36px;
      font-style: normal;
      font-weight: 100;
      text-transform: uppercase;
    }
    h2 {
      margin-top: 0px;
      color: #333333;
      display: block;
      font-size: 15px;
      font-weight: 400;
      text-align: center;
      text-transform: uppercase;
      padding: 10px 0;
    }
    h5 {
      color: #e74c3c;
      text-transform: uppercase;
    }
    h4 {
      font-size: 25px;
      font-weight: 100;
      padding: 20px;
      text-align: center;
      color: #333333;
      text-transform: uppercase;
      border-bottom: 1px dotted rgba(0,0,0,.2);
      border-top: 1px dotted rgba(0,0,0,.2);
    }
    .text_l{text-align: right;}
    .is-invalid{border: 1px solid #e74c3c;}
    </style>    
    <!--=============================  ======================================-->
    
    
    
    
    
    <div class="container-fluid" style="margin-bottom: 50px;">
        <div style="max-width: 550px;text-align:center;margin:0 auto;">
        
        <h3>Southeast Bank Payment Form </h3>
        <br><br>
      </div>
            <div style="padding: 0; margin: 0;" class="row">		
            
                <div style="padding: 0; margin: 0;" class="col-md-12">
                    
            <!--------------------====================  ===========================---------------------------->
            <form action="{{route('southeast_payment_confirmation')}}" method="POST"     enctype="multipart/form-data">
    
                {{-- @csrf --}}
                <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">

                <input type="hidden" name="order_currency" id="order_currency" value="BDT">
    
            <div class="col-md-3"></div>
            <div class="col-md-6">
              <div class="box row">
                <div class="col-md-1">&nbsp;</div>
                <div class="col-md-10" style="text-align: center;">
    
                        <div class="form-group row">
                            <label for="fname"
                                class="col-sm-3 text-end control-label col-form-label text_l">Operation Type <span id="eaccess_app_key"></span></label>
                            <div class="col-sm-9">
                                
                                <select id="int_op" name="int_op" class="form-control" required>
                                    <option value="">..select..</option>
                                    <option value="PURCHASE">Purchase</option>
                                </select>
                                
                            </div>
                          </div>
    
                        <div class="form-group row">
                            <label for="fname"
                                class="col-sm-3 text-end control-label col-form-label text_l">Order Amount <span id="emuid"></span> </label>
                            <div class="col-sm-9">
                                <input type="text"  id="order_amount" name="order_amount" value="1" class="form-control @error('order_amount') is-invalid @enderror"
                                    placeholder="Order amount Here" tabindex="2" required>
                                @error('order_amount')
                                    <span class="text-danger"> {{$message}}  </span>
                                @enderror
                            </div>
                          </div>
                        
                          <div class="form-group row">
                            <label for="fname"
                                class="col-sm-3 text-end control-label col-form-label text_l">Merchant Order Id <span id="emerchant_order_id"></span> </label>
                            <div class="col-sm-9">
                                <input type="text"  id="merchant_order_id" name="merchant_order_id" value="1231312" class="form-control @error('customer_name') is-invalid @enderror"
                                    placeholder="Customer Order Number Here" tabindex="2">
                                @error('merchant_order_id')
                                    <span class="text-danger"> {{$message}}  </span>
                                @enderror
                            </div>
                          </div>
    
                          <div class="form-group row">
                            <label for="fname"
                                class="col-sm-3 text-end control-label col-form-label text_l">Merchant Reference Id <span id="emerchant_ref_id"></span></label>
                            <div class="col-sm-9">
                                <input type="text"  id="customer_receipt_email" name="customer_receipt_email" value="m@m.com" class="form-control @error('customer_receipt_email') is-invalid @enderror"
                                    placeholder="Customer Email" tabindex="2" required>
                                @error('customer_receipt_email')
                                    <span class="text-danger"> {{$message}}  </span>
                                @enderror
                            </div>
                          </div>  
                          
                          <div class="form-group row mb-0" style="padding-bottom: 25px;">
                            <label class="col-md-3 col-form-label text-md-right"></label>
                            <div class="col-md-8">
                                <button type="submit" id="form-button-submit"   class="btn btn-primary" style="width: 351px;float: left;" tabindex="10">
                                    Check Order and Proceed to Payment Screen
                                </button>
                            </div>
                        </div>
                          
                      </form>
                  
                </div>
            </div>
    
    </div>
    
    
    
    
    
                    
                    <div class="clearfix"></div>
            
                </div>		
                
            </div>
                
    </div>
    
    
    
        

  @endsection