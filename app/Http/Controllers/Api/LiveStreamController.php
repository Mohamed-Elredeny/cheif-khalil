<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\models\admin\Category;
use App\models\LiveStreamVideos;
use DateInterval;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Cloner\Data;
class myclass
{

}
class LiveStreamController extends Controller
{
    use GeneralTrait;

    public function getStreams(){
        $streams = $this->getStreamsAccordingToState();
        $msg= '';
        return $this->returnData(['streams'], [$streams], $msg);
    }

    public function time($date1,$date2){
        date_default_timezone_set('Asia/Riyadh');

        $diff = abs($date2 - $date1);
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24)
            / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 -
                $months*30*60*60*24)/ (60*60*24));
        $hours = floor(($diff - $years * 365*60*60*24
                - $months*30*60*60*24 - $days*60*60*24)
            / (60*60));
        $minutes = floor(($diff - $years * 365*60*60*24
                - $months*30*60*60*24 - $days*60*60*24
                - $hours*60*60)/ 60);
        $seconds = floor(($diff - $years * 365*60*60*24
            - $months*30*60*60*24 - $days*60*60*24
            - $hours*60*60 - $minutes*60));
        $days += 30 * $months;
        return [
            'years'=>$years,
            'months'=>$months,
            'days'=>$days,
            'hours'=>$hours,
            'minutes'=>$minutes,
            'seconds'=>$seconds
        ];
    }
    public function getNearStreams(){
        date_default_timezone_set('Asia/Riyadh');
        $near_stream = LiveStreamVideos::
        orderBy('start_date', 'desc')
        ->first();
        if (date('y-m-d', strtotime($near_stream->start_date)) >= date('y-m-d')) {

            //return $near_stream->start_date;
            $origin = strtotime(date('Y-m-d h:i:s'));
            $target = strtotime(date('Y-m-d h:i:s', strtotime($near_stream->start_date)));

            $times= [
                'days'=>$this->time($target,$origin)['days'],
                'hours'=>$this->time($target,$origin)['hours'],
                'minutes'=>$this->time($target,$origin)['minutes'],
                'seconds'=>$this->time($target,$origin)['seconds'],
            ];
            $youtubeID = $this->getYouTubeVideoId($near_stream->url);
            $near_stream->thumbURL = 'https://img.youtube.com/vi/' . $youtubeID . '/mqdefault.jpg';;
            $near_stream->times = $times;
            return $this->returnData(['near_stream'], [$near_stream]);
        }else{
            $msg = 'There is no streams !';
            $obj=new myclass;

            return $this->returnData(['near_stream'], [$obj],$msg);
        }


    }

    function getYouTubeVideoId($url) {
        $parts = parse_url($url);
        if(isset($parts['query'])){
            parse_str($parts['query'], $qs);
            if(isset($qs['v'])){
                return $qs['v'];
            }else if(isset($qs['vi'])){
                return $qs['vi'];
            }
        }
        if(isset($parts['path'])){
            $path = explode('/', trim($parts['path'], '/'));
            return $path[count($path)-1];
        }
        return false;
    }
    public function getStreamsAccordingToState(){
        $streams = LiveStreamVideos::get();
        $today=[];
        $upcoming=[];
        $finished=[];
        foreach($streams as $stream) {
            $stream->category_name_ar = Category::find($stream->category_id)->name_ar;
            $stream->category_name_en = Category::find($stream->category_id)->name_en;
            $youtubeID = $this->getYouTubeVideoId($stream->url);
            $stream->thumbURL = 'https://img.youtube.com/vi/' . $youtubeID . '/mqdefault.jpg';;

            if (date('y-m-d', strtotime($stream->start_date)) > date('y-m-d')) {
                $upcoming []=$stream;
            } elseif (date('y-m-d', strtotime($stream->start_date)) < date('y-m-d')) {
                    $finished []=$stream;
            } else {
                    $today []=$stream;
            }
        }
        $streams=[
            'todayStreams'=>$today,
            'comingStreams'=>$upcoming,
            'finishedStreams'=>$finished,
        ];

        return $streams;

    }
}
