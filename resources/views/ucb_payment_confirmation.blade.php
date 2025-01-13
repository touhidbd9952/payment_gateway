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

    @include('inc.ucb_security')

    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3>UCB Secure Acceptance - Payment Form</h3>

                <form id="payment_confirmation" action="<?php echo env('UCB_gatewayUrl')?>" method="post" >
                <!-- production URL will be changed-->

                <fieldset id="confirmation">
                    <legend>Review Payment Details</legend>
                    <div>
                        <?php
                        
                        foreach ($data as $name => $value) {
                            echo '<div>';
                            echo "<span class=\"fieldName\">" . $name . "</span><span class=\"fieldValue\">" . $value . '</span>';
                            echo "</div>\n";
                        }
                        ?>
                    </div>
                </fieldset>

                <?php
                
                foreach ($data as $name => $value) {
                    echo "<input type=\"hidden\" id=\"" . $name . "\" name=\"" . $name . "\" value=\"" . $value . "\"/>\n";
                }
                echo "<input type=\"hidden\" id=\"signature\" name=\"signature\" value=\"" . sign($data) . "\"/>\n";
                
                ?>
                <input type="submit" id="submit" value="Confirm" />
                </form>
            </div>
        </div>
    </div>
@endsection
