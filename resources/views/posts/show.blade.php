@extends('layouts.app')

@section('content')
    <!-- links -->
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <!-- twicth -->
    <script src="https://embed.twitch.tv/embed/v1.js"></script>
    <!-- style links -->


    <!-- social media buttons -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- links -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <!-- scripts -->
    <script>
        $(document).ready(function () {
            $(".btn").click(function () {
                $("#myModal").modal('show');
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#flip1").ready(function () {
                $("#panel1").slideDown("slow");
            });
            $("#flip1").click(function () {
                $("#panel1").slideDown("slow");
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#panel1").click(function () {
                $("#panel1").slideUp("slow");
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#flip2").ready(function () {
                $("#panel2").slideDown("slow");
            });
            $("#flip2").click(function () {
                $("#panel2").slideDown("slow");
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#panel2").click(function () {
                $("#panel2").slideUp("slow");
            });
        });
    </script>
    <script>

        $(document).ready(function () {
            $("#panel3").click(function () {
                $("#panel3").slideUp();
            });
            $("#flip3").click(function () {
                $("#panel3").slideDown();
            });
        });
    </script>
    <!-- scripts -->


    <div class="row pl-4">
        <h1>{{$post->title}}</h1>
    @if(!\Illuminate\Support\Facades\Auth::guest()) <!-- if the user not a guest-->
    @if(\Illuminate\Support\Facades\Auth::user()->id == $post->user_id ) <!-- the user has to match the posts id-->
        <div class="row float-right pl-5 pb-1">
            <div class="row flex-center">
                <a href="/posts/{{$post->id}}/edit" class="btn btn-dark">Edit</a>
            </div>
            <div class="row flex-center pl-3">
                {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=>'POST', 'class'=>'float-right' ])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-dark'])}}
                {!! Form::close() !!}
                @endif
                @endif
            </div>
        </div>
    </div>
    <div class="container-all flex-center pl-3 pr-4">
        <div class="backdrop-left">
            <div class="row">
                <div class="col-12">
                    <div class="media">
                        <!-- Load the Twitch embed script  -->

                        @if($post->service_name == 'twitch')
                            @include('media_players.twitch')

                        @elseif($post->service_name == 'youtube')

                            @include('media_players.youtube')

                        @endif
                    </div>
                </div>
            </div>

            <div class="row pt-2">
                <div class="col-12">
                    <div class="media-info-title-box-left pl-4 float-left flex-center">
                        <div class="media-info-title-box">
                            <h6 class="media-info-title pt-2 pl-3 pr-3"
                                id="flip3"
                                style="color: seashell">{{$post->sub_title}}</h6>
                        </div>

                    </div>
                    <a class="secret" href="https://youtu.be/zUnVLELDzzI?t=15"> a secret egg</a>
                    <div class="media-info-count-box-right pr-4 float-right flex-center">
                        <div class="flex-center pt-0" style="color: rgba(255,251,255,0.96);">
                            <div class="media-info-count-box">
                                <div>
                                    <h6 class="media-info-count pt-2 pl-2 pr-2"
                                        style="color: seashell">123
                                        viewers</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container-all-right float-right">
            <div class="row ">
                <div class="col-12">
                    <div class="backdrop-right">
                        <div class="backdrop-artist-foundation">
                            <div class="flex-center pt-4">
                                <img src="{{$post->cover}}" alt="Image"
                                     class="rounded-circle tm-img-timeline animated">
                                <div class="pl-3" id="flip1">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn" data-toggle="modal"
                                            data-target="#exampleModalCenter">
                                        <div class="d-flex" style="color: seashell">
                                            <h4>{{$post->artist_name}}</h4>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="pt-0 " id="panel1">
                            <div class="flex-center">
                                <div class="artist-text pt-4 pl-3 pr-3 text-center">
                                    <text>{!! $post->body !!}
                                    </text>
                                </div>
                            </div>
                        </div>
                        <div class="pt-0">
                            <div class="backdrop-artist-foundation">
                                <div class="flex-center pt-4">
                                    <div class="pl-3" id="flip2">
                                        <a href="https://www.twitch.tv/videos/604037253">
                                            <button type="button" class="btn btn-lg" style="color: seashell"
                                                    data-toggle="modal">
                                                <h4>Artist Links</h4>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-0 " id="panel2">
                                <div class="align-items-center">
                                    <a href="https://www.twitch.tv/videos/604037253"
                                       class="fa fa-spotify"></a>
                                    <a href="https://www.twitch.tv/videos/604037253"
                                       class="fa fa-apple"></a>
                                    <a href="https://www.twitch.tv/videos/604037253"
                                       class="fa fa-youtube"></a>
                                    <a href="https://www.twitch.tv/videos/604037253"
                                       class="fa fa-instagram"></a>
                                    <a href="https://www.twitch.tv/videos/604037253"
                                       class="fa fa-soundcloud"></a>
                                    <a href="https://www.twitch.tv/videos/604037253"
                                       class="fa fa-bandcamp"></a>
                                    <a href="https://www.twitch.tv/videos/604037253"
                                       class="fa fa-external-link-square"></a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="hidden pl-2 spaceinv"
                         id="panel3">
                        <a href="/space_invaders">
                            <img
                                src="https://pluspng.com/img-png/space-invaders-png-space-invaders-png-hd-1134.png"
                                style="height: 27px;
                                                width: 30px;
                                                -webkit-filter: invert(1);
                                                filter: invert(1);">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

