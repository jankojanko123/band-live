<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Post;
use Illuminate\Http\Request;

class ArtistsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'name' => 'required|max:255',
            'text' => 'required|max:600',
            'apple_music' => 'max:255',
            'spotify_id' => 'max:255',
            'youtube_id' => 'max:255',
            'band_camp_id' => 'max:255',
            'soundcloud_id' => 'max:255',
            'webpage' => 'max:255',
        ]);

        $artist = new Artist();
        $artist->name = $request->input('name');
        $artist->text = $request->input('text');
        $artist->apple_music = $request->input('apple_music');
        $artist->spotify_id = $request->input('spotify_id');
        $artist->youtube_id = $request->input('youtube_id');
        $artist->band_camp_id = $request->input('band_camp_id');
        $artist->soundcloud_id = $request->input('soundcloud_id');
        $artist->webpage = $request->input('webpage');

        $artist->save();

        return redirect('/posts')->with('success', 'Post Created');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
