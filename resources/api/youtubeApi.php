<?php

//$video = Youtube::getVideoInfo('rie-hPVJ7Sw');
use Alaouy\Youtube\Facades\Youtube;
include '../database/config.php';

function getYoutubeSearch(){
    include '../database/config.php';
    $videoList = Youtube::searchVideos($searchTerm, $num, $order);
    return $videoList;//flipped for relevance
}
function getYoutubeVideoInfo($videoId){
    $videoInfo = Youtube::getVideoInfo($videoId);
    return $videoInfo;
}



//// Return an STD PHP object
//$video = Youtube::getVideoInfo('rie-hPVJ7Sw');
//
//// Get multiple videos info from an array
//$videoList = Youtube::getVideoInfo(['rie-hPVJ7Sw','iKHTawgyKWQ']);
//
//// Get localized video info
//$video = Youtube::getLocalizedVideoInfo('vjF9GgrY9c0', 'pl');
//
//// Get multiple videos related to a video
//$relatedVideos = Youtube::getRelatedVideos('iKHTawgyKWQ');
//
//// Get comment threads by videoId
//$commentThreads = Youtube::getCommentThreadsByVideoId('zwiUB_Lh3iA');
//
//// Get popular videos in a country, return an array of PHP objects
//$videoList = Youtube::getPopularVideos('us');
//
//// Search playlists, channels and videos. return an array of PHP objects
//$results = Youtube::search('Android');
//
//// Only search videos, return an array of PHP objects
//$videoList = Youtube::searchVideos('Android');
//
//// Search only videos in a given channel, return an array of PHP objects
//$videoList = Youtube::searchChannelVideos('keyword', 'UCk1SpWNzOs4MYmr0uICEntg', 40);
//
//// List videos in a given channel, return an array of PHP objects
//$videoList = Youtube::listChannelVideos('UCk1SpWNzOs4MYmr0uICEntg', 40);
//
//$results = Youtube::searchAdvanced([ /* params */ ]);
//
//// Get channel data by channel name, return an STD PHP object
//$channel = Youtube::getChannelByName('xdadevelopers');
//
//// Get channel data by channel ID, return an STD PHP object
//$channel = Youtube::getChannelById('UCk1SpWNzOs4MYmr0uICEntg');
//
//// Get playlist by ID, return an STD PHP object
//$playlist = Youtube::getPlaylistById('PL590L5WQmH8fJ54F369BLDSqIwcs-TCfs');
//
//// Get playlists by multiple ID's, return an array of STD PHP objects
//$playlists = Youtube::getPlaylistById(['PL590L5WQmH8fJ54F369BLDSqIwcs-TCfs', 'PL590L5WQmH8cUsRyHkk1cPGxW0j5kmhm0']);
//
//// Get playlist by channel ID, return an array of PHP objects
//$playlists = Youtube::getPlaylistsByChannelId('UCk1SpWNzOs4MYmr0uICEntg');
//
//// Get items in a playlist by playlist ID, return an array of PHP objects
//$playlistItems = Youtube::getPlaylistItemsByPlaylistId('PL590L5WQmH8fJ54F369BLDSqIwcs-TCfs');
//
//// Get channel activities by channel ID, return an array of PHP objects
//$activities = Youtube::getActivitiesByChannelId('UCk1SpWNzOs4MYmr0uICEntg');
//
//// Retrieve video ID from original YouTube URL
//$videoId = Youtube::parseVidFromURL('https://www.youtube.com/watch?v=moSFlvxnbgk');
//// result: moSFlvxnbgk

