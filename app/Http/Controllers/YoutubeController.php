<?php

namespace App\Http\Controllers;



use Alaouy\Youtube\Facades\Youtube;
use Symfony\Component\Console\Input\Input;

class YoutubeController extends Controller {

    public function index()
    {
        //$video = Youtube::getVideoInfo('rie-hPVJ7Sw');
        $videoList = Youtube::searchVideos('Live Music');
        dd($videoList);


    }

}
