<?php
use App\models\Footer;
$footer = Footer::First();
if($footer){
    $phone =  $footer->phone;
    $address_ar =$footer->address_ar;
    $address_en = $footer->address_en;
    $email = $footer->email;
    $facebook = $footer->facebook;
    $twitter = $footer->twitter;
    $instagram = $footer->instagram;
    $snapchat = $footer->snapchat;
}else{
    $phone = 'Enter Phone From Dashboard';
    $address_ar = 'Enter Arabic Address From Dashboard';
    $address_en = 'Enter English Address From Dashboard';
    $email = 'Enter Email  From Dashboard';
    $facebook = 'Enter you account';
    $twitter ='Enter you account';
    $instagram = 'Enter you account';
    $snapchat = 'Enter you account';
}
return [
    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */
    'phone' => $phone,
    'address' => $address_en,
    'email' => $email,
    'facebook' => $facebook,
    'twitter' =>$twitter,
    'instagram' =>$instagram,
    'snapchat' => $snapchat
];
