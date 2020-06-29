@extends('layouts.app')

@section('content')
    <div class="row" style="background: #2c2c2c">
        <div class="pl-5 pt-2 pb-2 pr-5" style="">
            <h1 style="font-size: 24px">Archived Concerts</h1>
        </div>
    </div>
    <div class="container">

        @if(count($posts) > 0)


            <div class="well flex-center">
                <div class="grid-container">
                    @foreach($posts as $post)
                        <a href="/posts/{{$post->id}}">
                            <div class="img-wrap">
                                <ul class="clearfix">
                                    <li>
                                        <div class="grid-item">
                                            <img class="index-cover-images" src="{{$post->cover}}">
                                            <div class="img-description">
                                                <h2 class="index-links">
                                                    {{$post->title}}
                                                </h2>
                                            </div>
                                        </div>
                                    <li>
                                </ul>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

        @else
            <p>No Posts Found</p>
        @endif
    </div>
@endsection
