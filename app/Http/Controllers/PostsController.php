<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use model
use App\Post;
use App\User;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * added constructor, for authentication with exceptions for index and show
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('title', 'desc')->get();
        //$posts = Post::where('title', 'Post Two')->get(); //eliquent
        //$posts =  Post::orderBy('title', 'desc')->take(2)->get(); //takes just 2 posts

        //$posts = DB::select('SELECT * FROM posts'); u can do it like that too

        $posts = Post::orderBy('created_at', 'desc')->paginate(10); //makes pagebar possible


        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required|max:255',
            'media_id' => 'required',
            'sub_title' => 'required',
            'service_name' => 'required',
            //
            'artist_name' => 'required|max:255',
            'apple_music' => 'max:255',
            'spotify_id' => 'max:255',
            'youtube_id' => 'max:255',
            'band_camp_id' => 'max:255',
            'soundcloud_id' => 'max:255',
            'webpage' => 'max:255',
            'cover' => 'max:1255',
        ]);


        //create post
        $post = new Post;
        $post->title = $request->input('title'); //saves into $post everything that is subbmitted to the form
        $post->body = $request->input('body');
        $post->media_id = $request->input('media_id');
        $post->sub_title = $request->input('sub_title');
        $post->service_name = $request->input('service_name');
        //
        $post->artist_name = $request->input('artist_name');
        $post->apple_music = $request->input('apple_music');
        $post->spotify_id = $request->input('spotify_id');
        $post->youtube_id = $request->input('youtube_id');
        $post->band_camp_id = $request->input('band_camp_id');
        $post->soundcloud_id = $request->input('soundcloud_id');
        $post->webpage = $request->input('webpage');
        $post->cover = $request->input('cover');

        $post->user_id = auth()->user()->id;

        $post->save();

        return redirect('/posts')->with('success', 'Post Created'); // sets the messahe
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id); //finds it by id
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::find($id); //finds it by id

        //check for correct user
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized page');
        }

        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required|max:255',
            'media_id' => 'required',
            'sub_title' => 'required',
            'service_name' => 'required',
            //
            'artist_name' => 'required|max:255',
            'apple_music' => 'max:255',
            'spotify_id' => 'max:255',
            'youtube_id' => 'max:255',
            'band_camp_id' => 'max:255',
            'soundcloud_id' => 'max:255',
            'webpage' => 'max:255',
        ]);

        //create post
        $post = Post::find($id);
        $post->title = $request->input('title'); //saves into $post everything that is subbmitted to the form
        $post->body = $request->input('body');
        $post->media_id = $request->input('media_id');
        $post->sub_title = $request->input('sub_title');
        $post->service_name = $request->input('service_name');
        //
        //
        $post->artist_name = $request->input('artist_name');
        $post->apple_music = $request->input('apple_music');
        $post->spotify_id = $request->input('spotify_id');
        $post->youtube_id = $request->input('youtube_id');
        $post->band_camp_id = $request->input('band_camp_id');
        $post->soundcloud_id = $request->input('soundcloud_id');
        $post->webpage = $request->input('webpage');
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated'); // sets the messahe

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        //check for correct user
        if (auth()->user()->id !== $post->user_id) {
            return redirect('/posts')->with('error', 'Unauthorized page');
        }


        $post->delete();
        return redirect('/posts')->with('success', 'Post Deleted');
    }
}
