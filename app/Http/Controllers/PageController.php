<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function welcome()
    {
        $title = 'Projek e-Usahawan RISDA';
        // return view('welcome', ['title' => $title]);
        // return view('welcome')->with('title', $title);
        return view('welcome', compact('title'));
    }
}
