@extends('layouts.app')

@section('content')

    <div class="container">
        <a href="/posts" class="btn btn-dark float-right">Back</a>
        <h1>Edit Post</h1>
        {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $post->title, ['class' => 'from-control', 'placeholder' => 'title'])}}
        </div>
        <div class="form-group">
            {{Form::label('sub_title', 'Sub Title')}}
            {{Form::text('sub_title', $post->sub_title, ['class' => 'from-control', 'placeholder' => 'title'])}}
        </div>
        <div class="form-group">
            {{Form::label('media_id', 'MediaID')}}
            {{Form::text('media_id', $post->media_id, ['class' => 'from-control', 'placeholder' => 'enter twitch id'])}}
        </div>
        <div class="form-group">
            {{Form::label('service_name', 'Service')}}
            {{Form::text('service_name', $post->service_name, ['class' => 'from-control', 'placeholder' => 'twitch/youtube'])}}
        </div>

        <div class="form-group">
            {{Form::label('artist_name', 'Artist')}}
            {{Form::text('artist_name', $post->artist_name, ['class' => 'from-control', 'placeholder' => 'name'])}}
        </div>

        <div class="form-group">
            {{Form::label('cover', 'Pic URL')}}
            {{Form::text('cover', $post->cover, ['class' => 'from-control', 'placeholder' => 'pic url'])}}
        </div>

        <div class="form-group">
            {{Form::label('body', 'Artist text')}}
            {{Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'from-control', 'placeholder' => 'body text'])}}
            <script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
            <script>
                CKEDITOR.replace('article-ckeditor');
            </script>
        </div>
        <div class="form-group">
            {{Form::label('apple_music', 'Apple MusicID')}}
            {{Form::text('apple_music', $post->apple_music, ['class' => 'from-control', 'placeholder' => 'apple_music_id'])}}
        </div>
        <div class="form-group">
            {{Form::label('spotify_id', 'SpotifyID')}}
            {{Form::text('spotify_id', $post->spotify_id, ['class' => 'from-control', 'placeholder' => 'apple_music_id'])}}
        </div>
        <div class="form-group">
            {{Form::label('youtube_id', 'YouTubeID')}}
            {{Form::text('youtube_id', $post->youtube_id, ['class' => 'from-control', 'placeholder' => 'youtube_id'])}}
        </div>
        <div class="form-group">
            {{Form::label('band_camp_id', 'BandCampID')}}
            {{Form::text('band_camp_id', $post->band_camp_id, ['class' => 'from-control', 'placeholder' => 'band_camp_id'])}}
        </div>
        <div class="form-group">
            {{Form::label('soundcloud_id', 'SoundCloudID')}}
            {{Form::text('soundcloud_id', $post->soundcloud_id, ['class' => 'from-control', 'placeholder' => 'soundcloud_id'])}}
        </div>
        <div class="form-group">
            {{Form::label('webpage', 'Webpage URL')}}
            {{Form::text('webpage', $post->webpage, ['class' => 'from-control', 'placeholder' => 'URL'])}}
        </div>
        {{Form::hidden('_method','PUT')}} <!--  //spoofs a post method into a put -->
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
@endsection

