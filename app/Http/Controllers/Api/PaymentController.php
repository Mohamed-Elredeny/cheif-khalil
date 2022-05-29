<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public $paymentMethods;
    //Live
    public $apiURL = 'https://api.myfatoorah.com';
    public $apiKey = '0pCW4aV2oW2vbzMKXqzdZeVPN5ARNRN137OnpMkM_YKZWP-1huoQyqV3_GmBJjLzyLnFZK7BUiKEAeBdG3oKvmEd2E2_Pgm0prMOBaOVcx056BUjJtIJ9b_U6V5BTbr1zZTRHzdzdD1SB2i2YSbbw0yt-_qegALrfFEu--XFP8fzHI7kjmvwG4pxofWz0VldZd_oOQ8BFUyKRemKKFEP4n0-zFlKL5ybaE5aLyqCE8BAqtk-ERtRtr7qbxvb6jtYM9snmTdnZpLMujUUe0jHR_SXNogRDjFGdRdDM8zxwyQTdHzDYJ85_bcLAzF39J4b_J3rRjTzKKOpKRxBz8tAeBfcXivdBXMZFxcfhB1Gu-PJtfVbK_Y3Gar_RCGJjh8cTarO_EkCoVgkIV8A7GyZmnF4PQv6bh2Kn-EDZQMKIRbRMmfMuGXaXP0uOung9Aogqh64Ew0fOU4kZEaD2QDTNdL9NLDeZ7WmmDzQIMUzTWz2aGna9dQFTRMvY4OtHpW6ZCeUE-B3pyAo91PmXXpMvL-aqoUso35lVMn4ek49-gqX2IBaZOkt1A1H4NlJ5m8SWWP5xC3s54-no8GZKk3CNIpDCt_NNCp6xrbiz_P9BhKIUt18OFaxaHA6MlKkPyxjCM4T_y-NP-2NCLEAXVsRzJbElod0K66X0Uufg4YE5-w8XLeB_gAQ-I4wz9YRRZSepCskCQ'; //Live token value to be placed here: https://myfatoorah.readme.io/docs/live-token
    public $ipPostFields = ['InvoiceAmount' => 100, 'CurrencyIso' => 'SAR'];
    public $price = 123;
    public $success_link = 'https://www.youtube.com/';
    public $error_link = 'https://www.google.com/';

    function __construct()
    {
        $this->paymentMethods = $this->initiatePayment($this->apiURL, $this->apiKey, $this->ipPostFields);
        foreach ($this->paymentMethods as $pm) {
            if ($pm->PaymentMethodEn == 'VISA/MASTER') {
                $this->paymentMethodId = $pm->PaymentMethodId;
                break;
            }
        }
    }


    public function onlinePay($paymentMethodId, $apiURL, $apiKey, $price, $success_link, $error_link)
    {
        $postFields = [
            //Fill required data
            'paymentMethodId' => $paymentMethodId,
            'InvoiceValue' => $price,
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
        $data = $this->executePayment($apiURL, $apiKey, $postFields);

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

    public function initiatePayment($apiURL, $apiKey, $postFields)
    {

        $json = $this->callAPI("$apiURL/v2/InitiatePayment", $apiKey, $postFields);
        return $json->Data->PaymentMethods;
    }

//------------------------------------------------------------------------------
    /*
     * Execute Payment Endpoint Function
     */

    public function executePayment($apiURL, $apiKey, $postFields)
    {

        $json = $this->callAPI("$apiURL/v2/ExecutePayment", $apiKey, $postFields);
        return $json->Data;
    }

//------------------------------------------------------------------------------
    /*
     * Call API Endpoint Function
     */
    public function callAPI($endpointURL, $apiKey, $postFields)
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

        $error = $this->handleError($response);
        if ($error) {
            die("Error: $error");
        }

        return json_decode($response);
    }

//------------------------------------------------------------------------------
    /*
     * Handle Endpoint Errors Function
     */
    public function handleError($response)
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

    public function charge(Request $request)
    {
        $price = $request->price;
        $package_id = $request->package_id;
        $email = $request->email;
        $link = $this->onlinePay($this->paymentMethodId, $this->apiURL, $this->apiKey, $price, 'https://www.youtube.com', 'https://github.com/');
        if ($link) {
            return [
                'link' => $link
            ];
        }else{
            return [
                'link' => ''
            ];
        }
    }

    public function Webcharge($price, $email, $package_id)
    {
        $link = $this->onlinePay($this->paymentMethodId, $this->apiURL, $this->apiKey, $price, route('success_package.update', ['package_id' => $package_id, 'email' => $email]),route('getPackages') );
        if ($link) {
            return redirect($link);
        }else{
            return 1;
        }

    }
}
