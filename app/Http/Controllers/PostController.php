<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class PostController extends Controller
{

    public function index()
    {
        $posts = Posts::all();
        return view('admin.dashboard', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {

        $post = new Posts();
        $post->title = $request->title;
        $post->description = $request->description;
        $image = $request->image;
        $imagename = time() . '.' . $image->getClientOriginalExtension();
        $post->image = $imagename;
        $post->user_name = Auth::User()->name;
        $post->user_id = Auth::User()->id;
        $post->save();
        if ($post->save()) {
            $request->image->move('images', $imagename);
        }
        return redirect()->route('admin.dashboard')->with('success', 'Post created successfully!');
    }

    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Posts::findOrFail($id);

        $post->title = $request->title;
        $post->description = $request->description;

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $post->image = $imagename;
        }

        $post->user_name = Auth::user()->name;
        $post->user_id = Auth::user()->id;


        $post->save();

        if ($post->save() && $request->hasFile('image')) {
            $image->move(public_path('images'), $imagename);
        }

        return redirect()->route('admin.dashboard')
            ->with('success', 'Post updated successfully!');
    }

    public function destroy($id){
        Posts::destroy($id);
        return redirect()->route('admin.dashboard'); 
    }
}
