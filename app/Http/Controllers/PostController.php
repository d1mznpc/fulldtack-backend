<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show']),
        ]; 
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
        ]);

        // $post = post::create($fields);

        // post with auth

        $post = $request->user()->posts()->create($validate);

        return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(post $post)
    {
        return $post; 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
        $fields = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
        ]);

        $post->update($fields);

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        $post->delete();

        return ['message' => 'Post deleted'];
    }
}
