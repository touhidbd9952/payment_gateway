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
	
		<div style="padding: 0; margin: 0;" class="row">		
		
			<div style="padding: 0; margin: 0;" class="col-md-12">

                

		<div class="col-md-6">
            <div class="row">
                <div class="col-sm-2">&nbsp;</div>
                <div class="col-sm-9" style="max-width: 550px;text-align:center;margin:0 auto;">
    
                    <h3>DBBL Payment Gateway Testing </h3>
                    <br><br>
                </div>
            </div>
          <div class="box row">
            <div class="col-md-1">&nbsp;</div>
            <div class="col-md-10" style="text-align: center;">
            

                <form action="{{route('createTransaction')}}" method="POST"     enctype="multipart/form-data">

                    @csrf

                    <div class="form-group row">
                        <label for="fname"
                            class="col-sm-3 text-end control-label col-form-label text_l">Amount <span id="eaccess_app_key"></span></label>
                        <div class="col-sm-9">
                            <input type="number"  id="amount" name="amount" value="10" class="form-control @error('amount') is-invalid @enderror"
                                placeholder="Amount Here" tabindex="2">
                            @error('amount')
                                <span class="text-danger"> {{$message}}  </span>
                            @enderror
                        </div>
                      </div>

                    <div class="form-group row">
                        <label for="fname"
                            class="col-sm-3 text-end control-label col-form-label text_l">Card_type <span id="emuid"></span> </label>
                        <div class="col-sm-9">
                            <div class="row">
                            <div class="col-sm-4" style="background-color:#fbf7f7;">
                            <input type="radio" id="card_type_1" name="card_type" value="1" class=" @error('card_type') is-invalid @enderror"
                                placeholder="Card Type" tabindex="2"><br>
                                <img src="{{ asset('/') }}img/dbbl/dbbl_nexus.jpg" style="position: relative;width: 90px;display: inline;padding-top:5px;">
                                <br><label>DBBL Nexus</label>
                            </div>
                            
                            <div class="col-sm-4" style="background-color:#fbf7f7;">
                            <input type="radio" id="card_type_2" name="card_type" value="2" class=" @error('card_type') is-invalid @enderror"
                                placeholder="Card Type" tabindex="2"><br>
                                <img src="{{ asset('/') }}img/dbbl/dbbl_nexus.jpg" style="position: relative;width: 90px;display: inline;padding-top:5px;">
                                <br><label>DBBL Master</label>
                            </div>

                            <div class="col-sm-4" style="background-color:#fbf7f7;">
                            <input type="radio" id="card_type_3" name="card_type" value="3" class=" @error('card_type') is-invalid @enderror"
                                placeholder="Card Type" tabindex="2"><br>
                                <img src="{{ asset('/') }}img/dbbl/dbbl_nexus.jpg" style="position: relative;width: 90px;display: inline;padding-top:5px;">
                                <br><label>DBBL Visa</label>
                            </div>
                        </div>

                        <div class="row" style="margin-top: 10px;">
                            <div class="col-sm-4" style="background-color:#fbf7f7;min-height:120px">
                            <input type="radio" id="card_type_4" name="card_type" value="4" class=" @error('card_type') is-invalid @enderror"
                                placeholder="Card Type" tabindex="2"><br>
                                <img src="{{ asset('/') }}img/dbbl/dbbl_visa.jpg" style="position: relative;width: 90px;display: inline;padding-top:5px;">
                                <label>&nbsp;</label>
                            </div>
                            
                            <div class="col-sm-4" style="background-color:#fbf7f7;min-height:120px">
                            <input type="radio" id="card_type_5" name="card_type" value="5" class=" @error('card_type') is-invalid @enderror"
                                placeholder="Card Type" tabindex="2"><br>
                                <img src="{{ asset('/') }}img/dbbl/dbbl_mastercard.jpg" style="position: relative;width: 90px;display: inline;padding-top:5px;">
                                <label>&nbsp;</label>
                            </div>

                            <div class="col-sm-4" style="background-color:#fbf7f7;min-height:120px">
                            <input type="radio" id="card_type_6" name="card_type" value="6" class=" @error('card_type') is-invalid @enderror"
                                placeholder="Card Type" tabindex="2"><br>
                                <img src="{{ asset('/') }}img/dbbl/dbbl_rocket.jpg" style="position: relative;width: 90px;display: inline;padding-top:5px;">
                                <label>&nbsp;</label>
                            </div>
                            </div>
                            
                        </div>
                      </div>
                    
                      <div class="form-group row">
                        <label for="fname"
                            class="col-sm-3 text-end control-label col-form-label text_l">Description <span id="emuid"></span> </label>
                        <div class="col-sm-9">
                            <input type="text"  id="description" name="description" value="abc" class="form-control @error('description') is-invalid @enderror"
                                placeholder="Description Here" tabindex="2">
                            @error('description')
                                <span class="text-danger"> {{$message}}  </span>
                            @enderror
                        </div>
                      </div>

                      <div class="form-group row mb-0" style="padding-bottom: 25px;">
                        <label class="col-md-3 col-form-label text-md-right"></label>
                        <div class="col-md-8">
                            <button type="submit" onclick="CreatePayment()"   class="btn btn-primary" style="width: 251px;float: left;" tabindex="10">
                                DBBL Pay
                            </button>
                        </div>
                    </div>
          
              
            </div>
        </div>

      
      
  </form>

  

  


  
</div>

<div class="col-md-12">
    <div class="box row">
        <br>
        <br>
        <b>https://payment.paperlessltd.com/api/v1/gateway/payment-process/token</b>
    </div>
</div>
				
				<div class="clearfix"></div>
		
			</div>		
			
		</div>
			
</div>

<?php if(isset($data)){echo $data;}?>

    <script>
  function CreatePayment()
  {
    var token = document.getElementById("_token").value;  
    var muid = document.getElementById("muid").value;  
    var access_app_key = document.getElementById("access_app_key").value;  
    var merchant_order_id = document.getElementById("merchant_order_id").value;  
    var merchant_ref_id = document.getElementById("merchant_ref_id").value;  
    var customer_name = document.getElementById("customer_name").value;  
    var customer_email = document.getElementById("customer_email").value;  
    var customer_address = document.getElementById("customer_add").value;  
    var customer_phone = document.getElementById("customer_phone").value;  
    var customer_city = document.getElementById("customer_city").value;  
    var customer_postcode = document.getElementById("customer_postcode").value;  
    var customer_country = document.getElementById("customer_country").value;  

    var shipping_name = document.getElementById("shipping_name").value;  
    var shipping_email = document.getElementById("shipping_email").value;  
    var shipping_address = document.getElementById("shipping_add").value;  
    var shipping_city = document.getElementById("shipping_city").value;  
    var shipping_country = document.getElementById("shipping_country").value;  
    var shipping_postcode = document.getElementById("shipping_postcode").value;  
    var product_desc = document.getElementById("product_desc").value;  
    var amount = document.getElementById("amount").value;  
    var currency = document.getElementById("currency").value;  
    var approve_url = document.getElementById("approve_url").value;  
    var cancel_url = document.getElementById("cancel_url").value;  
    var decline_url = document.getElementById("decline_url").value;  
      
 
    document.getElementById("emuid").innerHTML = "";
    document.getElementById("eaccess_app_key").innerHTML = ""; 
    document.getElementById("emerchant_order_id").innerHTML = "";  
    document.getElementById("emerchant_ref_id").innerHTML = "";  
    document.getElementById("ecustomer_name").innerHTML = "";  
    document.getElementById("ecustomer_email").innerHTML = "";  
    document.getElementById("ecustomer_add").innerHTML = "";  
    document.getElementById("ecustomer_phone").innerHTML = "";  
    document.getElementById("ecustomer_city").innerHTML = "";  
    document.getElementById("ecustomer_postcode").innerHTML = "";  
    document.getElementById("ecustomer_country").innerHTML = "";  

    document.getElementById("eshipping_name").innerHTML = "";  
    document.getElementById("eshipping_email").innerHTML = "";  
    document.getElementById("eshipping_add").innerHTML = "";  
    document.getElementById("eshipping_city").innerHTML = "";  
    document.getElementById("eshipping_country").innerHTML = "";  
    document.getElementById("eshipping_postcode").innerHTML = "";  
    document.getElementById("eproduct_desc").innerHTML = "";  
    document.getElementById("eamount").innerHTML = "";  
    document.getElementById("ecurrency").innerHTML = "";  
    document.getElementById("eapprove_url").innerHTML = "";  
    document.getElementById("ecancel_url").innerHTML = "";  
    document.getElementById("edecline_url").innerHTML = "";

    var err=0;    
    
    if(muid == ''){ err++;document.getElementById("emuid").innerHTML = "Required"; }
    if(access_app_key == ''){ err++;document.getElementById("eaccess_app_key").innerHTML = "Required"; }
    if(merchant_order_id == ''){ err++;document.getElementById("emerchant_order_id").innerHTML = "Required"; } 
    if(merchant_ref_id == ''){ err++;document.getElementById("emerchant_ref_id").innerHTML = "Required"; }  
    if(customer_name == ''){ err++;document.getElementById("ecustomer_name").innerHTML = "Required"; }  
    if(customer_email == ''){ err++;document.getElementById("ecustomer_email").innerHTML = "Required"; }  
    if(customer_add == ''){ err++;document.getElementById("ecustomer_add").innerHTML = "Required"; }  
    if(customer_phone == ''){ err++;document.getElementById("ecustomer_phone").innerHTML = "Required"; }  
    if(customer_city == ''){ err++;document.getElementById("ecustomer_city").innerHTML = "Required"; }  
    if(customer_postcode == ''){ err++;document.getElementById("ecustomer_postcode").innerHTML = "Required"; }  
    if(customer_country == ''){ err++;document.getElementById("ecustomer_country").innerHTML = "Required"; }  

    if(shipping_name == ''){ err++;document.getElementById("eshipping_name").innerHTML = "Required"; }  
    if(shipping_email == ''){ err++;document.getElementById("eshipping_email").innerHTML = "Required"; }  
    if(shipping_add == ''){ err++;document.getElementById("eshipping_add").innerHTML = "Required"; }  
    if(shipping_city == ''){ err++;document.getElementById("eshipping_city").innerHTML = "Required"; }  
    if(shipping_country == ''){ err++;document.getElementById("eshipping_country").innerHTML = "Required"; }  
    if(shipping_postcode == ''){ err++;document.getElementById("eshipping_postcode").innerHTML = "Required"; }  
    if(product_desc == ''){ err++;document.getElementById("eproduct_desc").innerHTML = "Required"; }  
    if(amount == ''){ err++;document.getElementById("eamount").innerHTML = "Required"; }  
    if(currency == ''){ err++;document.getElementById("ecurrency").innerHTML = "Required"; }   
    if(approve_url == ''){ err++;document.getElementById("eapprove_url").innerHTML = "Required"; }  
    if(cancel_url == ''){ err++;document.getElementById("ecancel_url").innerHTML = "Required"; }  
    if(decline_url == ''){ err++;document.getElementById("edecline_url").innerHTML = "Required"; }   

     
    
    if(err == 0)
    {   
        $.ajax({
                type:'POST',
                data: jQuery.param({
                        //"_token": "{{ csrf_token() }}",
                        "_token":token,
                        
                        "muid":muid,  
                        "access_app_key":access_app_key, 
                        "merchant_order_id":merchant_order_id,  
                        "merchant_ref_id":merchant_ref_id,  
                        "customer_name":customer_name,  
                        "customer_email":customer_email, 
                        "customer_add":customer_add,  
                        "customer_phone":customer_phone, 
                        "customer_city":customer_city,  
                        "customer_postcode":customer_postcode,  
                        "customer_country":customer_country, 

                        "shipping_name":shipping_name,  
                        "shipping_email":shipping_email,  
                        "shipping_add":shipping_add,  
                        "shipping_city":shipping_city,  
                        "shipping_country":shipping_country,  
                        "shipping_postcode":shipping_postcode,  
                        "product_desc":product_desc,  
                        "amount":amount,  
                        "currency":currency,  
                        "approve_url":approve_url,  
                        "cancel_url":cancel_url, 
                        "decline_url":decline_url, 
                        
                    }),
                url: '/payment.paperlessltd.com/api/v1/gateway/payment-process/initiate',
                contentType:'application',
                success:function(data){  
                  alert("paisi-1");
                  //call after insert
                  //getworkorder();
                  //document.getElementById("worktypeid").selectedIndex = "0";

                },
                error: function (error) {
                    alert(error);
                }
            });
            
    }
  }
    </script>


  @endsection