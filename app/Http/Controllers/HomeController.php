<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view("Home", ["posts" => $posts]);
    }

    public function about()
    {
        return view("About");
    }

}
