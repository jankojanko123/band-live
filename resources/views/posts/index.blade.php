@extends('layouts.app')

@section('content')

    <div class="container">
        <h1 style="color: #757575;;">Concerts</h1>
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
