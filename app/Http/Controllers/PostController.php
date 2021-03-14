<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => ['required', 'string']
        ]);

        $post = Post::create($validate);

        return response()->json(['sucess', $post]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        $post->load('image');

        return response()->json([$post]);
    }
}
