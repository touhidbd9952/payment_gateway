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
    
    <h3>To Test Payment System, Please Fill-Up Below Form </h3>
    <br><br>
  </div>
		<div style="padding: 0; margin: 0;" class="row">		
		
			<div style="padding: 0; margin: 0;" class="col-md-12">
                
        <!--------------------====================  ===========================---------------------------->
        <form     enctype="multipart/form-data">

            {{-- @csrf --}}
            <input type="hidden" name="_token" id="_token" value="<?php echo csrf_token(); ?>">

		<div class="col-md-6">
          <div class="box row">
            <div class="col-md-1">&nbsp;</div>
            <div class="col-md-10" style="text-align: center;">

                    <div class="form-group row">
                        <label for="fname"
                            class="col-sm-3 text-end control-label col-form-label text_l">Access_app_key <span id="eaccess_app_key"></span></label>
                        <div class="col-sm-9">
                            <input type="text"  id="access_app_key" name="access_app_key" value="UkAKIBujYNnn30U851xXy5HoP8xUtY7Td614sBJb" class="form-control @error('access_app_key') is-invalid @enderror"
                                placeholder="Customer Merchant Access_app_key Here" tabindex="2">
                            @error('access_app_key')
                                <span class="text-danger"> {{$message}}  </span>
                            @enderror
                        </div>
                      </div>

                    <div class="form-group row">
                        <label for="fname"
                            class="col-sm-3 text-end control-label col-form-label text_l">Merchant Id <span id="emuid"></span> </label>
                        <div class="col-sm-9">
                            <input type="text"  id="muid" name="muid" value="PAPERLESS672787570e646" class="form-control @error('muid') is-invalid @enderror"
                                placeholder="Customer Merchant Id Here" tabindex="2">
                            @error('muid')
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
                            <input type="text"  id="merchant_ref_id" name="merchant_ref_id" value="008" class="form-control @error('customer_name') is-invalid @enderror"
                                placeholder="Customer Name Here" tabindex="2">
                            @error('merchant_ref_id')
                                <span class="text-danger"> {{$message}}  </span>
                            @enderror
                        </div>
                      </div>

                      


                  <div class="form-group row">
                    <label for="fname"
                        class="col-sm-3 text-end control-label col-form-label text_l">Customer Name <span id="ecustomer_name"></span> </label>
                    <div class="col-sm-9">
                        <input type="text"  id="customer_name" name="customer_name" value="customer" class="form-control @error('customer_name') is-invalid @enderror"
                            placeholder="Customer Name Here" tabindex="2">
                        @error('customer_name')
                            <span class="text-danger"> {{$message}}  </span>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="fname"
                        class="col-sm-3 text-end control-label col-form-label text_l">Customer Email <span id="ecustomer_email"></span> </label>
                    <div class="col-sm-9">
                        <input type="text"  id="customer_email" name="customer_email" value="customer@gmail.com" class="form-control @error('customer_email') is-invalid @enderror"
                            placeholder="Customer Email Here" tabindex="2">
                        @error('customer_email')
                            <span class="text-danger"> {{$message}}  </span>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="fname"
                        class="col-sm-3 text-end control-label col-form-label text_l">Customer Address <span id="ecustomer_add"></span></label>
                    <div class="col-sm-9">
                        <input type="text"  id="customer_add" name="customer_add" value="banani" class="form-control @error('customer_add') is-invalid @enderror"
                            placeholder="Customer Address Here" tabindex="2">
                        @error('customer_add')
                            <span class="text-danger"> {{$message}}  </span>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="fname"
                        class="col-sm-3 text-end control-label col-form-label text_l">Customer Phone <span id="ecustomer_phone"></span> </label>
                    <div class="col-sm-9">
                        <input type="text"  id="customer_phone" name="customer_phone" value="01798123123" class="form-control @error('customer_phone') is-invalid @enderror"
                            placeholder="Customer Phone Here" tabindex="2">
                        @error('customer_phone')
                            <span class="text-danger"> {{$message}}  </span>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="fname"
                        class="col-sm-3 text-end control-label col-form-label text_l">Customer City <span id="ecustomer_city"></span> </label>
                    <div class="col-sm-9">
                        <input type="text"  id="customer_city" name="customer_city" value="Dhaka" class="form-control @error('customer_city') is-invalid @enderror"
                            placeholder="Customer City Here" tabindex="2">
                        @error('customer_city')
                            <span class="text-danger"> {{$message}}  </span>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="fname"
                        class="col-sm-3 text-end control-label col-form-label text_l">Customer Post Code <span id="ecustomer_postcode"></span> </label>
                    <div class="col-sm-9">
                        <input type="text"  id="customer_postcode" name="customer_postcode" value="1214" class="form-control @error('customer_postcode') is-invalid @enderror"
                            placeholder="Customer Post Code Here" tabindex="2">
                        @error('customer_postcode')
                            <span class="text-danger"> {{$message}}  </span>
                        @enderror
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="fname"
                        class="col-sm-3 text-end control-label col-form-label text_l">Customer Contry <span id="ecustomer_country"></span> </label>
                    <div class="col-sm-9">
                        <input type="text"  id="customer_country" name="customer_country" value="Bangladesh" class="form-control @error('customer_country') is-invalid @enderror"
                            placeholder="Customer Contry Here" tabindex="2">
                        @error('customer_country')
                            <span class="text-danger"> {{$message}}  </span>
                        @enderror
                    </div>
                  </div>

                               
              
            </div>
        </div>

</div>


<div class="col-md-6">

    <div class="form-group row">
        <label for="fname"
            class="col-sm-3 text-end control-label col-form-label text_l">Shipping Name <span id="eshipping_name"></span> </label>
        <div class="col-sm-9">
            <input type="text"  id="shipping_name"  name="shipping_name" value="Elias" class="form-control @error('shipping_name') is-invalid @enderror"
                placeholder="Shipping Name Here" tabindex="2">
            @error('shipping_name')
                <span class="text-danger"> {{$message}}  </span>
            @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="fname"
            class="col-sm-3 text-end control-label col-form-label text_l">Shipping Email <span id="eshipping_email"></span></label>
        <div class="col-sm-9">
            <input type="text"  id="shipping_email" name="shipping_email" value="test@test.com" class="form-control @error('shipping_email') is-invalid @enderror"
                placeholder="Shipping Email Here" tabindex="2">
            @error('shipping_email')
                <span class="text-danger"> {{$message}}  </span>
            @enderror
        </div>
      </div>

    <div class="form-group row">
        <label for="fname"
            class="col-sm-3 text-end control-label col-form-label text_l">Shipping Address <span id="eshipping_add"></span> </label>
        <div class="col-sm-9">
            <input type="text"  id="shipping_add" name="shipping_add" value="Banani" class="form-control @error('shipping_add') is-invalid @enderror"
                placeholder="Shipping Address Here" tabindex="2">
            @error('shipping_add')
                <span class="text-danger"> {{$message}}  </span>
            @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="fname"
            class="col-sm-3 text-end control-label col-form-label text_l">Shipping City <span id="eshipping_city"></span> </label>
        <div class="col-sm-9">
            <input type="text"  id="shipping_city" name="shipping_city" value="Dhaka" class="form-control @error('shipping_city') is-invalid @enderror"
                placeholder="Shipping City Here" tabindex="2">
            @error('shipping_city')
                <span class="text-danger"> {{$message}}  </span>
            @enderror
        </div>
      </div>

    <div class="form-group row">
        <label for="fname"
            class="col-sm-3 text-end control-label col-form-label text_l">Shipping Country <span id="eshipping_country"></span> </label>
        <div class="col-sm-9">
            <input type="text"  id="shipping_country" name="shipping_country" value="Bangladesh" class="form-control @error('shipping_country') is-invalid @enderror"
                placeholder="Shipping Country Here" tabindex="2">
            @error('shipping_country')
                <span class="text-danger"> {{$message}}  </span>
            @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="fname"
            class="col-sm-3 text-end control-label col-form-label text_l">Shipping Postcode <span id="eshipping_postcode"></span> </label>
        <div class="col-sm-9">
            <input type="text"  id="shipping_postcode" name="shipping_postcode" value="1214" class="form-control @error('shipping_postcode') is-invalid @enderror"
                placeholder="Shipping Postcode Here" tabindex="2">
            @error('shipping_postcode')
                <span class="text-danger"> {{$message}}  </span>
            @enderror
        </div>
      </div>

    <div class="form-group row">
        <label for="fname"
            class="col-sm-3 text-end control-label col-form-label text_l">Product Description <span id="eproduct_desc"></span> </label>
        <div class="col-sm-9">
            <input type="text"  id="product_desc" name="product_desc" value="{2 X Adata 8GB Pendrive [800]=[1600]} {1 XA4Tech Mouse [700]=[700]} {shipping rate:40.00}-{discount amount:0.00}=2340.00}" class="form-control @error('product_desc') is-invalid @enderror"
                placeholder="Product Description Here" tabindex="2">
            @error('product_desc')
                <span class="text-danger"> {{$message}}  </span>
            @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="fname"
            class="col-sm-3 text-end control-label col-form-label text_l">Product Amount <span id="eamount"></span> </label>
        <div class="col-sm-9">
            <input type="text"  id="amount" name="amount" value="1" class="form-control @error('amount') is-invalid @enderror"
                placeholder="Product Amount Here" tabindex="2">
            @error('amount')
                <span class="text-danger"> {{$message}}  </span>
            @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="fname"
            class="col-sm-3 text-end control-label col-form-label text_l">Currency <span id="ecurrency"></span></label>
        <div class="col-sm-9">
            <input type="text"  id="currency" name="currency" value="BDT" class="form-control @error('currency') is-invalid @enderror"
                placeholder="Currency" tabindex="2">
            @error('currency')
                <span class="text-danger"> {{$message}}  </span>
            @enderror
        </div>
      </div>


      <div class="form-group row">
        <label for="fname"
            class="col-sm-3 text-end control-label col-form-label text_l">Approve Url <span id="eapprove_url"></span></label>
        <div class="col-sm-9">
            <input type="text"  id="approve_url" name="approve_url" value="https://www.merchant-approve.com" class="form-control @error('approve_url') is-invalid @enderror"
                placeholder="approve_url" tabindex="2">
            @error('approve_url')
                <span class="text-danger"> {{$message}}  </span>
            @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="fname"
            class="col-sm-3 text-end control-label col-form-label text_l">Cancel Url <span id="ecancel_url"></span> </label>
        <div class="col-sm-9">
            <input type="text"  id="cancel_url" name="cancel_url" value="https://www.merchant-cancel.com" class="form-control @error('cancel_url') is-invalid @enderror"
                placeholder="cancel url" tabindex="2">
            @error('cancel_url')
                <span class="text-danger"> {{$message}}  </span>
            @enderror
        </div>
      </div>

      <div class="form-group row">
        <label for="fname"
            class="col-sm-3 text-end control-label col-form-label text_l">Decline Url <span id="edecline_url"></span></label>
        <div class="col-sm-9">
            <input type="text"  id="decline_url" name="decline_url" value="https://www.merchant-decline.com" class="form-control @error('decline_url') is-invalid @enderror"
                placeholder="decline url" tabindex="2">
            @error('decline_url')
                <span class="text-danger"> {{$message}}  </span>
            @enderror
        </div>
      </div>

      <div class="form-group row mb-0" style="padding-bottom: 25px;">
        <label class="col-md-3 col-form-label text-md-right"></label>
        <div class="col-md-8">
            <button type="submit" id="form-button-submit"   class="btn btn-primary" style="width: 251px;float: left;" tabindex="10">
                Generate Token
            </button>
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



    <script>
        
$('#form-button-submit').on('click', function(e){
            e.preventDefault();
          
    var _token = document.getElementById("_token").value;  
    var muid = document.getElementById("muid").value;  
    var access_app_key = document.getElementById("access_app_key").value;  
    var merchant_order_id = document.getElementById("merchant_order_id").value;  
    var merchant_ref_id = document.getElementById("merchant_ref_id").value;  
    var customer_name = document.getElementById("customer_name").value;  
    var customer_email = document.getElementById("customer_email").value;  
    var customer_add = document.getElementById("customer_add").value;  
    var customer_phone = document.getElementById("customer_phone").value;  
    var customer_city = document.getElementById("customer_city").value;  
    var customer_postcode = document.getElementById("customer_postcode").value;  
    var customer_country = document.getElementById("customer_country").value;  

    var shipping_name = document.getElementById("shipping_name").value;  
    var shipping_email = document.getElementById("shipping_email").value;  
    var shipping_add = document.getElementById("shipping_add").value;  
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
    
    if(muid == ""){ err++;document.getElementById("emuid").innerHTML = "Required"; }
    if(access_app_key == ""){ err++;document.getElementById("eaccess_app_key").innerHTML = "Required"; }
    if(merchant_order_id == ""){ err++;document.getElementById("emerchant_order_id").innerHTML = "Required"; } 
    if(merchant_ref_id == ""){ err++;document.getElementById("emerchant_ref_id").innerHTML = "Required"; }  
    if(customer_name == ""){ err++;document.getElementById("ecustomer_name").innerHTML = "Required"; }  
    if(customer_email == ""){ err++;document.getElementById("ecustomer_email").innerHTML = "Required"; }  
    if(customer_add == ""){ err++;document.getElementById("ecustomer_add").innerHTML = "Required"; }  
    if(customer_phone == ""){ err++;document.getElementById("ecustomer_phone").innerHTML = "Required"; }  
    if(customer_city == ""){ err++;document.getElementById("ecustomer_city").innerHTML = "Required"; }  
    if(customer_postcode == ""){ err++;document.getElementById("ecustomer_postcode").innerHTML = "Required"; }  
    if(customer_country == ""){ err++;document.getElementById("ecustomer_country").innerHTML = "Required"; }  

    if(shipping_name == ""){ err++;document.getElementById("eshipping_name").innerHTML = "Required"; }  
    if(shipping_email == ""){ err++;document.getElementById("eshipping_email").innerHTML = "Required"; }  
    if(shipping_add == ""){ err++;document.getElementById("eshipping_add").innerHTML = "Required"; }  
    if(shipping_city == ""){ err++;document.getElementById("eshipping_city").innerHTML = "Required"; }  
    if(shipping_country == ""){ err++;document.getElementById("eshipping_country").innerHTML = "Required"; }  
    if(shipping_postcode == ""){ err++;document.getElementById("eshipping_postcode").innerHTML = "Required"; }  
    if(product_desc == ""){ err++;document.getElementById("eproduct_desc").innerHTML = "Required"; }  
    if(amount == ""){ err++;document.getElementById("eamount").innerHTML = "Required"; }  
    if(currency == ""){ err++;document.getElementById("ecurrency").innerHTML = "Required"; }   
    if(approve_url == ""){ err++;document.getElementById("eapprove_url").innerHTML = "Required"; }  
    if(cancel_url == ""){ err++;document.getElementById("ecancel_url").innerHTML = "Required"; }  
    if(decline_url == ""){ err++;document.getElementById("edecline_url").innerHTML = "Required"; }   
    
    if(err == 0)
    {   
        $.ajax({
                type:'POST',
                data: {
                        "_token": "{{ csrf_token() }}",
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
                    },
                url: 'https://payment.paperlessltd.com/api/v1/gateway/payment-process/initiate',
                dataType:'json',
                success:function(data){ 
                    //alert(JSON.stringify(data));
                    //alert(data.token);
                    window.location = 'https://payment.paperlessltd.com/api/v1/gateway/payment-process/' + data.token;
                },
                error: function (request, status, error) {
                    alert(request.responseText);
                }
            });
            
    }
});

    </script>


  @endsection