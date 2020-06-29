<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TvController extends Controller
{
    public function index()
    {
        $title ='ssssss';
        //pass in methods
        //return view('pages.index', compact('title')) ;
        return view('pages.tv')->with('title', $title);
    }
}
