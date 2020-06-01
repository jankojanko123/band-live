@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background: #180707">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(count($posts) > 0)
                            <h3>Your Concerts</h3>
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

                                                                    <a href="posts/{{$post->id}}/edit"
                                                                       class="btn btn-dark">Edit</a>


                                                                    {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method'=>'POST', 'class'=>'float-right' ])!!}
                                                                    {{Form::hidden('_method', 'DELETE')}}
                                                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
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
                            {{print('U have no posts')}}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
