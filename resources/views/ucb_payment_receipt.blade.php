@extends('layouts.master')

@section('content')
    <script type="text/javascript" src="jquery-1.7.min.js"></script>
    <style>
        a {font-size: 1.0em;text-decoration: none;}
        input[type=submit] {margin-top: 10px;}
        span {font-weight: bold;width: 350px;display: inline-block;}
        .fieldName {width: 400px;font-weight: bold;vertical-align: top;}
        .fieldValue {width: 400px;font-weight: normal;vertical-align: top;}
    </style>
    <style>
        body {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
        
          h1 {
            color: #88B04B;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-weight: 900;
            font-size: 40px;
            margin-bottom: 10px;
          }
          p {
            color: #404F5E;
            font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
            font-size:20px;
            margin: 0;
          }
        i {
          color: #9ABC66;
          font-size: 100px;
          line-height: 200px;
          margin-left:-15px;
        }
        .card {
          background: white;
          padding: 60px;
          border-radius: 4px;
          box-shadow: 0 2px 3px #C8D0D8;
          display: inline-block;
          margin: 0 auto;
        }

        /* ** error ** */
        button{
  background: #F5F1E3;
  font-family: 'Armata', sans-serif;
}

@mixin scaleTransistion($val){
  -ms-transform: scale($val);
  -moz-transform:  scale($val);
  -webkit-transform:  scale($val);
  transform:  scale($val);
}
.errorModule{
  margin:40px auto 20px;
  text-align:center;
  color: #A80000;
  .errorIcon{
    font-size:34px;
    margin: 15px;
    animation: animateIcon 5s infinite;
  }
  .errorMsg{
    font-size:14px;
  }
  @keyframes animateIcon{
    0%   {background-color: red;}
  25%  {background-color: yellow;}
  50%  {background-color: blue;}
  100% {background-color: green;}
  }
}
      </style>

    @include('inc.ucb_security')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <h3>UCB Secure Acceptance - Result</h3>

                <fieldset id="response">
                    
                    <div>
                        
                            <?php 
                                if($result == "100")
                                {
                            ?>
                            <div class="card">
                                <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
                                  <i class="checkmark">✓</i>
                                </div>
                                  <h1>Success</h1> 
                                  <p>We received your purchase request;<br/> we'll be in touch shortly!</p>
                                </div>
                            <?php 
                                }
                                else
                                {
                            ?>
                            <div class="errorModule">
                                <div class="errorMsg">
                                    <h1>Error!!</h1>
                                    <?php echo "Error Code: ". $result;?> <br>
                                    <?php echo $message;?>
                                </div>
                              </div>
                            <?php 
                                }
                            ?>
                        
                    </div>
                </fieldset>

            </div>
        </div>
    </div>

    
@endsection
