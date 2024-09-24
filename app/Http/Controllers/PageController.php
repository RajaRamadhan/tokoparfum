<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('home');
    }
    public function home()
    {
        return view('layouts.home');
    }

    public function about()
    {
        return view('layouts.about');
    }

    public function contact()
    {
        return view('layouts.contact');
    }
    
    public function posts()
    {
        return view('posts.index');
    }
}
