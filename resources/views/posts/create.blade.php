@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="/posts" class="btn btn-dark float-right">Back</a>
        <h1>Create Post</h1>
        {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '', ['class' => 'from-control', 'placeholder' => 'title'])}}
        </div>
        <div class="form-group">
            {{Form::label('sub_title', 'Sub title')}}
            {{Form::text('sub_title', '', ['class' => 'from-control', 'placeholder' => 'enter sub title'])}}
        </div>
        <div class="form-group">
            {{Form::label('media_id', 'MediaID')}}
            {{Form::text('media_id', '', ['class' => 'from-control', 'placeholder' => 'enter twitch id'])}}
        </div>
        <div class="form-group">
            {{Form::label('service_name', 'Service')}}
            {{Form::radio('service_name', 'twitch', true)}} Twitch
            {{Form::radio('service_name', 'youtube', true)}} Youtube
        </div>

        <div class="form-group">
            {{Form::label('artist_name', 'Artist')}}
            {{Form::text('artist_name', '', ['class' => 'from-control', 'placeholder' => 'name'])}}
        </div>

        <div class="form-group">
            {{Form::label('cover', 'Pic URL')}}
            {{Form::text('cover', '', ['class' => 'from-control', 'placeholder' => 'pic url'])}}
        </div>


        <div class="form-group">
            {{Form::label('body', 'Artist text')}}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'from-control', 'placeholder' => 'Artist text'])}}
            <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('article-ckeditor');
            </script>
        </div>
        <div class="form-group">
            {{Form::label('apple_music', 'Apple MusicID')}}
            {{Form::text('apple_music', '', ['class' => 'from-control', 'placeholder' => 'apple_music_id'])}}
        </div>
        <div class="form-group">
            {{Form::label('spotify_id', 'SpotifyID')}}
            {{Form::text('spotify_id', '', ['class' => 'from-control', 'placeholder' => 'apple_music_id'])}}
        </div>
        <div class="form-group">
            {{Form::label('youtube_id', 'YouTubeID')}}
            {{Form::text('youtube_id', '', ['class' => 'from-control', 'placeholder' => 'youtube_id'])}}
        </div>
        <div class="form-group">
            {{Form::label('band_camp_id', 'BandCampID')}}
            {{Form::text('band_camp_id', '', ['class' => 'from-control', 'placeholder' => 'band_camp_id'])}}
        </div>
        <div class="form-group">
            {{Form::label('soundcloud_id', 'SoundCloudID')}}
            {{Form::text('soundcloud_id', '', ['class' => 'from-control', 'placeholder' => 'soundcloud_id'])}}
        </div>
        <div class="form-group">
            {{Form::label('webpage', 'Webpage URL')}}
            {{Form::text('webpage', '', ['class' => 'from-control', 'placeholder' => 'URL'])}}
        </div>

        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>


@endsection

