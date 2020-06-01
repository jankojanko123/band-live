<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $title ='Welcome to Laravel';
        //pass in methods
        //return view('pages.index', compact('title')) ;
        return view('dashboard')->with('title', $title);
    }
    public function about()
    {
        $title ='About us';
        return view('pages.about')->with('title', $title);
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
