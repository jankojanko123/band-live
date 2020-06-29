<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $title ='';
        //pass in methods
        //return view('pages.index', compact('title')) ;
        return view('dashboard')->with('title', $title);
    }
    public function about()
    {
        $title ='About us';
        return view('pages.about')->with('title', $title);
    }
    public function archive()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10); //makes pagebar possible


        return view('pages.archive')->with('posts', $posts);
    }
    public function services()
    {
        $data = array(
            'title' => 'Services',
            'services' => ['Web Ass', 'Programmass', 'SEOASS'],


        );
        return view('pages.services')->with($data);
    }
}
