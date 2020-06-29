<?php

namespace App\Http\Controllers;

require_once '../resources/api/twitchApi.php';
require_once '../resources/api/youtubeApi.php';


use App\Artist;
use App\Post;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class AutoPostsController extends Controller
{
    protected function getAllData()
    {
        //Executes the seperate functions.
        $this->getdataTwitch();
        $this->getdataYouTube();
        return redirect('/posts')->with('success', 'Post Created'); // sets the messahe
    }

    public function getdataYouTube()
    {
        $searchItems = getYoutubeSearch();

        foreach ($searchItems as $searchItem) {
            $videoId = $searchItem->id->videoId;
            $videoData = getYoutubeVideoInfo($videoId);
            //dd($videoData);

            if ($videoData->status->embeddable == true ||
                $videoData->status->publicStatsViewable == true ||
                $videoData->snippet->categoryId == 10 ||
                (strlen($videoData->snippet->title) == strlen(utf8_decode($videoData->snippet->title))))
            {
                //dd($videoData);
                //is_english($str);
                $this->storeYoutube($videoData); //if in music category
            }
        }


    }

    function storeYoutube($item)
    {

        //create post
        $post = new Post;
        $post->user_id = 123; //just for now
        $post->title = $item->snippet->title; //saves into $post everything that is subbmitted to the form
        $text = substr($item->snippet->description, 0, 300);

        $post->body = $text;
        $post->media_id = $item->id;
        $post->sub_title = $item->snippet->channelTitle . ' playing music';
        $post->service_name = 'youtube';
        //
        $post-> show = 1;
        $post-> donately_url = '';
        $post-> fund_url = '';
        $post-> fund_name = '';
        $post-> fund_text = '';
        //
        $post->artist_name = $item->snippet->channelTitle;
        $post->apple_music = '';
        $post->spotify_id = '';
        $post->youtube_id = '';
        $post->band_camp_id = '';
        $post->soundcloud_id = '';
        $post->webpage = '';
        $post->views = $item->statistics->viewCount;
        $post->cover = $item->snippet->thumbnails->high->url;
        $post->save();

    }


    public function getdataTwitch()
    {
        $data = getTwitch(); //twitch data
        $posts = Post::all(); //db data


        if (!isset($posts->items)) {
            //dd($data);
            foreach ($data as $item) {
                if (strlen($item->title) == strlen(utf8_decode($item->title))) {
                    $this->storeTwitch($item);
                }
            }

        } else { //check if already exists
            foreach ($data as $item) {
                $new_post_id = $item->id; //"38732393424"

                if (empty($posts->items)) {

                    foreach ($posts as $post) {

                        $saved_post = $post->attributes['id'];
                        if ($new_post_id != $saved_post) {

                            if (strlen($item->title) == strlen(utf8_decode($item->title))) {
                                $this->storeTwitch($item);
                            }
                        }
                    }
                }
            }
        }
    }

    function storeTwitch($item)
    {

        //create post
        $post = new Post;
        $post->user_id = $item->user_id;
        $post->title = $item->title; //saves into $post everything that is subbmitted to the form
        $post->body = $item->user_name . 'playing music for ' . $item->viewer_count . ' people';
        $post->media_id = $item->user_name;
        $post->sub_title = $item->user_name . ' playing music';
        $post->service_name = 'twitch';
        //
        $post-> show = 1;
        $post-> donately_url = '';
        $post-> fund_url = '';
        $post-> fund_name = '';
        $post-> fund_text = '';
        //
        //var_dump(phpinfo());
        $post->artist_name = $item->user_name;
        $post->apple_music = '';
        $post->spotify_id = '';
        $post->youtube_id = '';
        $post->band_camp_id = '';
        $post->soundcloud_id = '';
        $post->webpage = '';
        $post->views = $item->viewer_count;


        $url = explode('-', $item->thumbnail_url);
        $post->cover = $url[0] . '-' . $url[1] . '-' . $url[2] . '.jpg';

        //dd($post);

        if ($item->viewer_count >= 10) { //viewer min limit
            $post->save();
        }


        /*
         *   +"id": "38725232880"
            +"user_id": "114774737"
            +"user_name": "선바"
            +"game_id": "26936"
            +"type": "live"
            +"title": "기타를 치고 놀아요"
            +"viewer_count": 2378
            +"started_at": "2020-06-17T11:01:05Z"
            +"language": "ko"
            +"thumbnail_url": "https://static-cdn.jtvnw.net/previews-ttv/live_user_sunbaking-{width}x{height}.jpg"
            +"tag_ids": array:1 [▶]
         */

    }


}
