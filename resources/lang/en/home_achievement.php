<?php

use App\models\Trans\Achievement;

$footer = Achievement::First();
if($footer){
        $title= $footer->title_en;
        $achievement_1= $footer->achievement_1_en;
        $achievement_2= $footer->achievement_2_en;
        $achievement_3= $footer->achievement_3_en;
        $achievement_details_1= $footer->achievement_details_1_en;
        $achievement_details_2= $footer->achievement_details_2_en;
        $achievement_details_3= $footer->achievement_details_3_en;
        $video= $footer->video;

}else{
    $title= 'Enter your Achievement Title';
    $achievement_1= 'Enter Achievement Number 1';
    $achievement_2= 'Enter Achievement Number 2';
    $achievement_3= 'Enter Achievement Number 3';
    $achievement_details_1= 'Enter Achievement Number 1 Details Achievement Number 1 Details Achievement Number 1 Details';
    $achievement_details_2= 'Enter Achievement Number 2 Details Achievement Number 2 Details Achievement Number 2 Details';
    $achievement_details_3= 'Enter Achievement Number 3 Details Achievement Number 3 Details Achievement Number 3 Details';
    $video=  'Enter Video';
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
    'title'=> $title,
    'achievement_1'=> $achievement_1,
    'achievement_2'=> $achievement_2,
    'achievement_3'=> $achievement_3,
    'achievement_details_1'=> $achievement_details_1,
    'achievement_details_2'=> $achievement_details_2,
    'achievement_details_3'=> $achievement_details_3,
    'video'=> $video,
];
