<?php

//require_once './vendor/autoload.php';

use NewTwitchApi\HelixGuzzleClient;
use NewTwitchApi\NewTwitchApi;

function getTwitch(){
    include '../database/config.php';
// Assuming you already have the access token.


// The Guzzle client used can be the included `HelixGuzzleClient` class, for convenience.
// You can also use a mock, fake, or other double for testing, of course.
    $helixGuzzleClient = new HelixGuzzleClient($clientId);

// Instantiate NewTwitchApi. Can be done in a service layer and injected as well.
    $newTwitchApi = new NewTwitchApi($helixGuzzleClient, $clientId, $clientSecret);




// ["id"]=>
//      string(5) "26936"
//      ["name"]=>
//      string(23) "Music & Performing Arts"
//      ["box_art_url"]=>
//      string(90) "https://static-cdn.jtvnw.net/ttv-boxart/Music%20&%20Performing%20Arts-{width}x{height}.jpg"

//https://static-cdn.jtvnw.net/previews-ttv/live_user_koshkamoroshka-400x400.jpg

    try {
        // Make the API call. A ResponseInterface object is returned.
        $response = $newTwitchApi->getStreamsApi()->getStreams($null, $null, $gameIds, $null, $lang, $first, null, null, $accessToken);

        $responseObj = json_decode($response->getBody()->getContents());

        return $responseObj->data;

    } catch (GuzzleException $e) {
        // Handle error appropriately for your application
    }


    /* u need accesstoken ... this should get it  https://twitchapps.com/tokengen/
     *
     * GET https://id.twitch.tv/oauth2/authorize
        ?client_id=08248ch672bkkbxn88tz3bpt16o29k
        &redirect_uri=www.google.si
        &response_type=code
        &scope=analytics:read:extensions analytics:read:games bits:read

    curl -i -H "Accept: application/xml" -H "Content-Type: application/json" -X GET https://id.twitch.tv/oauth2/authorize?client_id=08248ch672bkkbxn88tz3bpt16o29k&redirect_uri=www.google.si&response_type=token&scope=analytics:read:extensions analytics:read:games bits:read

    <a href="https://www.twitch.tv/login?client_id=08248ch672bkkbxn88tz3bpt16o29k&amp;redirect_params=client_id%3D08248ch672bkkbxn88tz3bpt16o29k">Found</a>.


     */

}
?>
