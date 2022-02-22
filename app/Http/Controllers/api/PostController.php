<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);

        //dd($posts);

        //return $posts;
        return PostResource::collection($posts);
    }

    public function show($postId)
    {
        $post = Post::find($postId);

        //return $post;
        return new PostResource($post);
    }

    public function store(StorePostRequest $request)
    {
        //fetch request data
        $requestData = request()->all();
        // dd($requestData);

        //store request data in db
        // Post::create([
        //     'title' => $requestData['title'],
        //     'description' => $requestData['description'],
        //     'user_id' => $requestData['post_creator']
        // ]);

        $post = Post::create($requestData);

        //return $post;
        return new PostResource($post);
    }
}
