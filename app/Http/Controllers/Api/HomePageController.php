<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\models\Footer;
use App\models\Trans\Achievement;
use App\models\Trans\StudentReview;
use Illuminate\Http\Request;
class HomePageController extends Controller
{
    use GeneralTrait;

    public function achievement(){
        $data = Achievement::get();
         return $this->returnData(['achievements'], [$data]);
    }
    public function studentsReview(){
       $data=  StudentReview::get();
        return $this->returnData(['studentsReview'], [$data]);
    }
    public function footer()
    {
       $data=  Footer::get();
        return $this->returnData(['footer'], [$data]);

    }
}
