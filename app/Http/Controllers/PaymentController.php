<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    function createRandomPassword()
    {

        $chars = '023456789';
        srand((double)microtime() * 1000000);
        $i = 0;
        $pass = '';

        while ($i <= 7) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass = $pass . $tmp;
            $i++;
        }

        return $pass;

    }
    public function verificationCode(){
        $number ='966503522883';
        $bytes =  $this->createRandomPassword();
        $msg = "        من فضلك قم بإدخال الكود لاتمام عملية التسجيل : ".$bytes."";
        $response =redirect('https://www.oursms.net/api/sendsms.php?return=json&username=chefkhalil&password=chefkhalil&numbers='.$number.'&message='.$msg.'&sender=Chefkhalil&datetime=YYYY-MMM-DD%20HH:MM');
    return $response;
    }
}
