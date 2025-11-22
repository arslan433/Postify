<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function home () {
        $posts = Posts::all();
        return view('home.index', compact('posts'));
    }
    public function postDetail ($id) {
        $post = Posts::findOrFail($id);
        return view('posts.detail', compact('post'));
    }

    public function user(Request $request)
    {
        if ($request->user()->usertype == 'User') {
            return view('dashboard');
        } else {
            return redirect()->route('admin.dashboard');
        }
    }
    public function admin(Request $request)
    {
        if ($request->user()->usertype == 'Admin') {
            return view('admin.dashboard');
        } else {
           return redirect()->route('dashboard');
        }
    }
}
