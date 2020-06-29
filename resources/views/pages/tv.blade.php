@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="pt-4">
            <div class="row">
                <div class="col-12">
                    <div class="media">
                        <!-- Load the Yt embed script -->
                        @include('media_players.youtubeTV')
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
