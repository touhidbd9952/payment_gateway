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
                            <input type="radio" id="card_type_1" name="card_type" value="1" checked class=" @error('card_type') is-invalid @enderror"
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


				
				<div class="clearfix"></div>
		
			</div>		
			
		</div>
			
</div>




  @endsection