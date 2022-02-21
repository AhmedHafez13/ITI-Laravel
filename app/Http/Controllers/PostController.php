<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(5);

        //dd($posts->links());

        if ($posts) {
            foreach ($posts as $post) {
                $post->formated_created_at = Carbon::parse($post->created_at)->format('Y-m-d');
            }
        }
        //dd($posts[0]->user->name); //to stop excution and dump the $posts
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create', [
            'users' => $users,
        ]);
    }

    public function store(StorePostRequest $request)
    {
        //fetch request data
        //$requestData = request()->all();
        // dd($requestData);

        // Validate the request data
        $validated = $request->validated();

        //store request data in db
        $post = Post::create($validated);

        //redirection to posts.index
        // return to_route('posts.index'); in laravel 9 only
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    public function show($postId)
    {
        $post = Post::where('id', $postId)->first();

        //dd($post);
        //dd(Carbon::parse($post->created_at)->format('l jS \\of F Y h:i:s A'));
        //dd($post->user);
        if ($post) {
            $post->formated_created_at = Carbon::parse($post->created_at)->format('l jS \\of F Y h:i:s A');
            return view('posts.show', ['post' => $post]);
        } else {
            abort(404);
        }
    }

    public function edit($postId)
    {
        $post = Post::where('id', $postId)->first();
        $users = User::all();

        return $post
            ? view('posts.edit', [
                'post' => $post,
                'users' => $users ?? []
            ])
            : abort(404);
    }

    public function update(StorePostRequest $request, $postId)
    {
        //fetch request data
        //$requestData = request()->all();

        // Validate the request data
        $validated = $request->validated();

        // Update the post of id $postId in database
        $post = Post::where('id', $postId)->first();
        if ($post) {
            $post->update($validated);
        }

        return redirect()->route('posts.show', ['post' => $postId]);
    }

    public function destroy($postId)
    {
        // Delete the post of id $postId in database
        $post = Post::where('id', $postId)->first();
        if ($post) {
            $post->delete();
        }

        return redirect()->route('posts.index');
    }
}
