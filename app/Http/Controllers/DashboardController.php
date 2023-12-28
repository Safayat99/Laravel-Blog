<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show_post(Request $request)
    {
        $user_id = $request->user()->id;
        $post = Post::where('user_id', $user_id)->get();
        return view('dashboard', ['post' => $post]);
    }
}
