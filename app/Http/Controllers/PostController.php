<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_post');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $post = new Post();
        $post->title = $request->title;
        $post->description = $request->description;
        $user->post()->save($post);
        return back()->with('status', 'Posted Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //route model binding
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('edit_post', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return redirect(route('dashboard'))->with('status', 'Post Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect(route('dashboard'))->with('status', 'Post deleted');
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $post = Post::where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        })
            ->get();
        return view('dashboard', compact('post', 'search'));
    }
}
