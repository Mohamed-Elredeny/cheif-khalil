<?php

/* ------------------------ Configurations ---------------------------------- */
//Test
$package_price='';
//Live
$apiURL = 'https://api.myfatoorah.com';
$apiKey = '0pCW4aV2oW2vbzMKXqzdZeVPN5ARNRN137OnpMkM_YKZWP-1huoQyqV3_GmBJjLzyLnFZK7BUiKEAeBdG3oKvmEd2E2_Pgm0prMOBaOVcx056BUjJtIJ9b_U6V5BTbr1zZTRHzdzdD1SB2i2YSbbw0yt-_qegALrfFEu--XFP8fzHI7kjmvwG4pxofWz0VldZd_oOQ8BFUyKRemKKFEP4n0-zFlKL5ybaE5aLyqCE8BAqtk-ERtRtr7qbxvb6jtYM9snmTdnZpLMujUUe0jHR_SXNogRDjFGdRdDM8zxwyQTdHzDYJ85_bcLAzF39J4b_J3rRjTzKKOpKRxBz8tAeBfcXivdBXMZFxcfhB1Gu-PJtfVbK_Y3Gar_RCGJjh8cTarO_EkCoVgkIV8A7GyZmnF4PQv6bh2Kn-EDZQMKIRbRMmfMuGXaXP0uOung9Aogqh64Ew0fOU4kZEaD2QDTNdL9NLDeZ7WmmDzQIMUzTWz2aGna9dQFTRMvY4OtHpW6ZCeUE-B3pyAo91PmXXpMvL-aqoUso35lVMn4ek49-gqX2IBaZOkt1A1H4NlJ5m8SWWP5xC3s54-no8GZKk3CNIpDCt_NNCp6xrbiz_P9BhKIUt18OFaxaHA6MlKkPyxjCM4T_y-NP-2NCLEAXVsRzJbElod0K66X0Uufg4YE5-w8XLeB_gAQ-I4wz9YRRZSepCskCQ'; //Live token value to be placed here: https://myfatoorah.readme.io/docs/live-token


/* ------------------------ Call InitiatePayment Endpoint ------------------- */
//Fill POST fields array
$ipPostFields = ['InvoiceAmount' => 100, 'CurrencyIso' => 'SAR'];

//Call endpoint
$paymentMethods = initiatePayment($apiURL, $apiKey, $ipPostFields);

//You can save $paymentMethods information in database to be used later
foreach ($paymentMethods as $pm) {
    if ($pm->PaymentMethodEn == 'VISA/MASTER') {
        $paymentMethodId = $pm->PaymentMethodId;
        break;
    }
}

/* ------------------------ Call ExecutePayment Endpoint -------------------- */
//Fill customer address array
/* $customerAddress = array(
  'Block'               => 'Blk #', //optional
  'Street'              => 'Str', //optional
  'HouseBuildingNo'     => 'Bldng #', //optional
  'Address'             => 'Addr', //optional
  'AddressInstructions' => 'More Address Instructions', //optional
  ); */

//Fill invoice item array
/* $invoiceItems[] = [
  'ItemName'  => 'Item Name', //ISBAN, or SKU
  'Quantity'  => '2', //Item's quantity
  'UnitPrice' => '25', //Price per item
  ]; */
//Fill POST fields array
$price = 123;
$success_link = 'https://www.youtube.com/';
$error_link = 'https://www.google.com/';
function onlinePay($paymentMethodId,$apiURL,$apiKey,$price,$success_link,$error_link){
    $postFields = [
        //Fill required data
        'paymentMethodId' => $paymentMethodId,
        'InvoiceValue' =>$price,
        'CallBackUrl' => $success_link,
        'ErrorUrl' => $error_link,
        //'ErrorUrl' => 'https://example.com/callback.php', //or 'https://example.com/error.php'
        //'CallBackUrl' => 'https://example.com/callback.php',
        //Fill optional data
        //'CustomerName'       => 'fname lname',
        //'DisplayCurrencyIso' => 'KWD',
        //'MobileCountryCode'  => '+965',
        //'CustomerMobile'     => '1234567890',
        //'CustomerEmail'      => 'email@example.com',
        //'Language'           => 'en', //or 'ar'
        //'CustomerReference'  => 'orderId',
        //'CustomerCivilId'    => 'CivilId',
        //'UserDefinedField'   => 'This could be string, number, or array',
        //'ExpiryDate'         => '', //The Invoice expires after 3 days by default. Use 'Y-m-d\TH:i:s' format in the 'Asia/Kuwait' time zone.
        //'SourceInfo'         => 'Pure PHP', //For example: (Laravel/Yii API Ver2.0 integration)
        //'CustomerAddress'    => $customerAddress,
        //'InvoiceItems'       => $invoiceItems,
    ];
    //Call endpoint
    $data = executePayment($apiURL, $apiKey, $postFields);

    //You can save payment data in database as per your needs
    $invoiceId = $data->InvoiceId;
    $paymentLink = $data->PaymentURL;
    return $paymentLink;
}
//Redirect your customer to the payment page to complete the payment process
//Display the payment link to your customer

/* ------------------------ Functions --------------------------------------- */
/*
 * Initiate Payment Endpoint Function
 */

function initiatePayment($apiURL, $apiKey, $postFields)
{

    $json = callAPI("$apiURL/v2/InitiatePayment", $apiKey, $postFields);
    return $json->Data->PaymentMethods;
}

//------------------------------------------------------------------------------
/*
 * Execute Payment Endpoint Function
 */

function executePayment($apiURL, $apiKey, $postFields)
{

    $json = callAPI("$apiURL/v2/ExecutePayment", $apiKey, $postFields);
    return $json->Data;
}

//------------------------------------------------------------------------------
/*
 * Call API Endpoint Function
 */
function callAPI($endpointURL, $apiKey, $postFields)
{

    $curl = curl_init($endpointURL);
    curl_setopt_array($curl, array(
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($postFields),
        CURLOPT_HTTPHEADER => array("Authorization: Bearer $apiKey", 'Content-Type: application/json'),
        CURLOPT_RETURNTRANSFER => true,
    ));

    $response = curl_exec($curl);
    $curlErr = curl_error($curl);

    curl_close($curl);

    if ($curlErr) {
        //Curl is not working in your server
        die("Curl Error: $curlErr");
    }

    $error = handleError($response);
    if ($error) {
        die("Error: $error");
    }

    return json_decode($response);
}

//------------------------------------------------------------------------------
/*
 * Handle Endpoint Errors Function
 */
function handleError($response)
{

    $json = json_decode($response);
    if (isset($json->IsSuccess) && $json->IsSuccess == true) {
        return null;
    }

    //Check for the errors
    if (isset($json->ValidationErrors) || isset($json->FieldsErrors)) {
        $errorsObj = isset($json->ValidationErrors) ? $json->ValidationErrors : $json->FieldsErrors;
        $blogDatas = array_column($errorsObj, 'Error', 'Name');

        $error = implode(', ', array_map(function ($k, $v) {
            return "$k: $v";
        }, array_keys($blogDatas), array_values($blogDatas)));
    } else if (isset($json->Data->ErrorMessage)) {
        $error = $json->Data->ErrorMessage;
    }

    if (empty($error)) {
        $error = (isset($json->Message)) ? $json->Message : (!empty($response) ? $response : 'API key or API URL is not correct');
    }

    return $error;
}

/* -------------------------------------------------------------------------- */

/*<a href='$paymentLink' target='_blank'>$paymentLink</a> to pay with invoiceID $invoiceId.";*/
function php_func($paymentMethodId,$apiURL,$apiKey,$price){
  $paymentLink = onlinePay($paymentMethodId,$apiURL,$apiKey,$price,'https://chefkhalil.com/api/updateUserPackage/1/1','https://chefkhalil.com/en/package');
    echo $paymentLink;
}
?>
@extends('site.layouts.site')
@section('loading')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    Loading...
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    ...جاري التحميل
    @endif
@endsection

@section('title')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    Packages
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    الباقات
    @endif
@endsection

@section('titleName')
    @if (    LaravelLocalization::getCurrentLocaleName() == 'English')
    Packages
    @elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')
    الباقات
    @endif
@endsection

@section('header')
    @include('site.includes.header')
@endsection

@section('content')
@if (    LaravelLocalization::getCurrentLocaleName() == 'English')


<section class="ls s-py-50">
    <div class="container">
        <div class="row">


            <div class="d-none d-lg-block divider-70"></div>


            <main class="col-lg-12">
                <article>
                    @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <div class="progress" style="height: 15px !important;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
                    <header class="entry-header">
                        <h4 class="margin-20 text-right">Packages
                        </h4>
                    </header>
                    <!-- .entry-header -->
                    <!-- <div dir="rtl"  class="entry-content"> -->

                        <!-- <section class="ls s-pt-75 s-pb-10 s-pt-lg-100 s-pb-lg-90 c-mb-20 c-mb-lg-60"> -->
                            <div class="container" style="padding: 3%;">

                                <div class="row">

                                    <div class="divider-65 d-none d-lg-block" ></div>
                                    @foreach($packages as $package)
                                    <div class="col-lg-4 col-md-6" style="padding: 3%;height:600px;width:300px ">

                                        <div class="pricing-plan bordered " >
                                            <div class="plan-name">
                                                <h3>
                                                    {{$package['name']}}
                                                </h3>
                                            </div>
                                            <div class="price-wrap bg-maincolor">
                                                <span class="plan-price" id="amount_mounth"><p>{{$package['price']}}</p></span>
                                                {{-- <span class="plan-decimals">.00</span> --}}
                                                <span class="plan-sign">$$</span>
                                            </div>

                                            <div class="col-sm-12 plan-features" style="height:100px;overflow-y: scroll">
                                                <ul class="list-bordered">
                                                    <li>duration: {{$package['duration']}} days</li>
                                                    @for($i = 0; $i < count($package->features); $i++)
                                                        <li>{{$package->features[$i]['name_en']}}</li>
                                                    @endfor

                                                </ul>
                                            </div>
                                            <div class="plan-button">

                                                <a href="{{route('charge.web',['price'=>$package->price,'email'=>session()->get('userId'),'package_id'=>$package['id']])}}" target='_blank' class="btn btn-outline-maincolor" >Subscribe</a>
                                            </div>
                                        </div>

                                    </div>
                                    @endforeach

                                </div>

                    <!-- </div> -->
                    <!-- .entry-content -->
                </article>

            </main>

            <div class="d-none d-lg-block divider-70"></div>
        </div>

    </div>
</section>

@elseif (    LaravelLocalization::getCurrentLocaleName() == 'Arabic')

<section dir="rtl" class="ls s-py-50">
    <div dir="rtl" class="container">
        <div dir="rtl" class="row">


            <div class="d-none d-lg-block divider-70"></div>


            <main dir="rtl" class="col-lg-12">
                <article>
                    @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <div class="progress" style="height: 15px !important;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
                    <header class="entry-header">
                        <h4 class="margin-20 text-right">الباقات
                        </h4>
                    </header>
                    <!-- .entry-header -->
                    <!-- <div dir="rtl"  class="entry-content"> -->

                        <!-- <section class="ls s-pt-75 s-pb-10 s-pt-lg-100 s-pb-lg-90 c-mb-20 c-mb-lg-60"> -->
                            <div class="container" style="padding: 3%;">

                                <div class="row">

                                    <div class="divider-65 d-none d-lg-block" ></div>
                                    @foreach($packages as $package)
                                    <div class="col-lg-4 col-md-6" style="padding: 3%;height:600px;width:300px ">

                                        <div class="pricing-plan bordered">
                                            <div class="plan-name">
                                                <h3>
                                                    {{$package['name']}}
                                                </h3>
                                            </div>
                                            <div class="price-wrap bg-maincolor">
                                                <span class="plan-price" id="amount_mounth"><p>{{$package['price']}}</p></span>
                                                {{-- <span class="plan-decimals">.00</span> --}}
                                                <span class="plan-sign">$$</span>
                                            </div>

                                            <div class="col-sm-12 plan-features" style="height:100px;overflow-y: scroll">
                                                <ul class="list-bordered" >
                                                    <li>المده: {{$package['duration']}} يوم</li>
                                                    @for($i = 0; $i < count($package->features); $i++)
                                                        <li>{{$package->features[$i]['name_ar']}}</li>
                                                    @endfor
                                                </ul>
                                            </div>
                                            <div class="plan-button">
                                                <a href="{{route('charge.web',['price'=>$package->price,'email'=>session()->get('userId'),'package_id'=>$package['id']])}}" class="btn btn-outline-maincolor" >اشترك</a>
                                            </div>
                                        </div>

                                    </div>
                                    @endforeach



                                </div>

                    <!-- </div> -->
                    <!-- .entry-content -->
                </article>

            </main>

            <div class="d-none d-lg-block divider-70"></div>
        </div>

    </div>
</section>

@endif
@endsection
<script>
    function clickMe(price){
        var result ="<?php
            php_func($paymentMethodId,$apiURL,$apiKey,  456); ?>"
        return result;
    }
</script>
@section('footer')
    @include('site.includes.footer')
@endsection
