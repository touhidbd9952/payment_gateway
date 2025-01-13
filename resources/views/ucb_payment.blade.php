@extends('layouts.master')

@section('content')
    <script type="text/javascript" src="jquery-1.7.min.js"></script>
    <style>
        a {
            font-size: 1.0em;
            text-decoration: none;
        }

        input[type=submit] {
            margin-top: 10px;
        }

        span {
            font-weight: bold;
            width: 350px;
            display: inline-block;
        }

        .fieldName {
            width: 400px;
            font-weight: bold;
            vertical-align: top;
        }

        .fieldValue {
            width: 400px;
            font-weight: normal;
            vertical-align: top;
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">

                <h3>UCB Secure Acceptance - Payment Form</h3>

                <form id="payment_form" action="{{ route('ucb_payment_confirmation') }}" method="post">

                    @csrf

                    <input type="hidden" name="access_key" value="<?php echo env('UCB_access_key')?>">
                    <!--production value will be different-->
                    <input type="hidden" name="profile_id" value="<?php echo env('UCB_profile_id') ?>">
                    <!--production value will be different-->

                    <input type="hidden" name="transaction_uuid" value="<?php echo uniqid(); ?>">
                    <input type="hidden" name="signed_field_names"
                        value="bill_to_forename,bill_to_surname,bill_to_address_city,bill_to_address_country,bill_to_address_line1,bill_to_address_postal_code,bill_to_address_state,bill_to_email,access_key,profile_id,transaction_uuid,signed_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency,auth_trans_ref_no">
                    <!--<input type="hidden" name="unsigned_field_names" value="">-->
                    <input type="hidden" name="signed_date_time" value="<?php echo gmdate('Y-m-d\TH:i:s\Z'); ?>">
                    <input type="hidden" name="locale" value="en">

                    <!-- variable values from customer details start-->
                    <input type="hidden" name="bill_to_forename" value="shihab">
                    <input type="hidden" name="bill_to_surname" value="Ahmed">
                    <input type="hidden" name="bill_to_address_city" value="Dhaka">
                    <input type="hidden" name="bill_to_address_country" value="BD">
                    <input type="hidden" name="bill_to_address_line1" value="elephant road">
                    <input type="hidden" name="bill_to_address_postal_code" value="1205">
                    <input type="hidden" name="bill_to_address_state" value="Dhaka">
                    <input type="hidden" name="bill_to_email" value="shihab.ahmed@ucb.com.bd">
                    <!-- <input type="hidden" name="card_type" value="002"> --optional field not required actually> -->
                    <!-- variable values from customer details end-->


                    <fieldset>
                        <legend>Payment Details</legend>
                        <div id="paymentDetailsSection" class="section">

                            <span>transaction_type:</span>
                            <input type="text" name="transaction_type" value="sale" size="25"> <br />

                            <!-- variable values from merchant details start
                            1. reference_number and auth_trans_ref_no value should be unique for each transaction
                            2. reference_number and auth_trans_ref_no must be same for same transaction-->
                            
                            <span>reference_number:</span>
                            <input type="text" name="reference_number" value="Ucb1241" size="25"> <br />

                            <span>auth_trans_ref_no:</span>
                            <input type="text" name="auth_trans_ref_no" value="Ucb1241" size="25"> <br />

                            <span>amount:</span>
                            <input type="text" name="amount" value="50" size="25"> <br />
                            <!-- variable values from merchant details end-->

                        </div>
                    </fieldset>

                    <input type="hidden" name="currency" value="BDT">

                    <input type="submit" id="submit" name="submit" value="Submit" />

                </form>

            </div>
        </div>
    </div>

    <script>
        $(function() {
            payment_form = $('form').attr('id');
            addLinkToSetDefaults();
        });


        function setDefaultsForAll() {
            if (payment_form === "payment_confirmation") {
                setDefaultsForUnsignedDetailsSection();
            } else {
                setDefaultsForPaymentDetailsSection();
            }
        }

        function addLinkToSetDefaults() {
            $(".section").prev().each(function(i) {
                legendText = $(this).text();
                $(this).text("");

                var setDefaultMethod = "setDefaultsFor" + capitalize($(this).next().attr("id")) + "()";

                newlink = $(document.createElement("a"));
                newlink.attr({
                    id: 'link-' + i,
                    name: 'link' + i,
                    href: '#'
                });
                newlink.append(document.createTextNode(legendText));
                newlink.bind('click', function() {
                    eval(setDefaultMethod);
                });

                $(this).append(newlink);
            });

            newbutton = $(document.createElement("input"));
            newbutton.attr({
                id: 'defaultAll',
                value: 'Default All',
                type: 'button',
                onClick: 'setDefaultsForAll()'
            });
            newbutton.bind('click', function() {
                setDefaultsForAll;
            });
            $("#" + payment_form).append(newbutton);
        }

        function capitalize(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        function setDefaultsForPaymentDetailsSection() {
            $("input[name='transaction_type']").val("authorization");
            $("input[name='reference_number']").val(new Date().getTime());
            $("input[name='amount']").val("100.00");
            $("input[name='currency']").val("USD");
        }

        function setDefaultsForUnsignedDetailsSection() {
            $("input[name='card_type']").val("001");
            $("input[name='card_number']").val("4242424242424242");
            $("input[name='card_expiry_date']").val("11-2020");
        }
    </script>
@endsection
