@extends('layouts.master')

@section('content')




<p style="text-align:center;">
    <a href="../index.html"><img src="mpgs.png" alt="Main Order Home Page" /></a>
</p>
<br><br><br><br>
<h1 align="center"> Hosted Checkout - PHP</h1>
<h2 align="center"> <u>Order Summary</u></h2>
<p style="text-align:center;"> <strong> Order Amount : ৳<?php if (isset($order_amount)) echo $order_amount ?></p>
<p style="text-align:center;"> Currency&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp: <?php if (isset($order_currency)) echo $order_currency ?></strong> </p>
<br>
   
<!-- Note in reality only one of the following functions will be called -->

{{-- <p style="text-align:center;">
    <input type="button" value="Pay with Embedded Page" data-toggle="modal" data-target="#exampleModal"  />
</p> --}}

<p style="text-align:center;"> <input type="button" value="Pay with Payment Page" onClick="Checkout.showPaymentPage();" /></p>

        
<p style="text-align:center;"><a href= "{{route('/')}}"><br><br><input type="button" value="Cancel Payment and Return to Main Index Page" /></a></p>


{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Merchant Name</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" id="hco-embedded"> </div>

    </div>
  </div>
</div> --}}

{{-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script> --}}

{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script> --}}

<script src="https://test-southeastbank.mtf.gateway.mastercard.com/static/checkout/checkout.min.js"
             data-error="errorCallback"
             data-cancel="cancelCallback"
             data-complete="${APP_URL}/southeast/callback"
            >
</script>

<script type="text/javascript">

  function errorCallback(error) {
    alert(JSON.stringify(error));
  }
        
  function completeCallback(resultIndicator, sessionVersion) {
    alert("Result Indicator");
    alert(JSON.stringify(resultIndicator));
    alert("Session Version:");
    alert(JSON.stringify(sessionVersion));
    alert("Successful Payment");
  }
       
  function cancelCallback() {
    alert('Payment cancelled');
  }

  Checkout.configure({
    session: { 
      id: <?php echo json_encode($session_id); ?>
    }
  });

  // after the modal is shown, then call Checkout.showEmbeddedPage('#hco-embedded')
                   
  $('#exampleModal').on('shown.bs.modal', function (e) {
      Checkout.showEmbeddedPage('#hco-embedded', () => { $('#exampleModal').modal() } // tell Checkout how to launch the modal
    )
  });

  $('#exampleModal').on('hide.bs.modal', function (e) {
    sessionStorage.clear(); // tell Checkout to clear sessionStorage when I close the modal
  });

</script>
    
    
    
        

  @endsection