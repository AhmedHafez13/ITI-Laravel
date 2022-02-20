<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        //dd($posts); //to stop excution and dump the $posts
        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('posts.create',[
            'users' => $users,
        ]);
    }

    public function store()
    {
        //fetch request data
        $requestData = request()->all();
        // dd($requestData);

        //store request data in db
        Post::create($requestData);

        //redirection to posts.index
        // return to_route('posts.index'); in laravel 9 only
        return redirect()->route('posts.index');
    }

    public function show($postId)
    {
        $post = Post::where('id', $postId)->first();
        //dd($post);
        //Carbon::parse($quotation[0]->created_at)->format('d/m/Y')
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
        $post = $this->getPost($postId);
        return $post
            ? view('posts.edit', ['post' => $post])
            : abort(404);
    }

    public function update($postId)
    {
        // Update the post of id $postId in database

        return redirect()->route('posts.index');
    }

    public function getPosts()
    {
        return [
            ['id' => 1, 'title' => 'first post', 'body' => 'first post body', 'posted_by' => 'Ahmed', 'email' => 'Ahmed@mail.com', 'created_at' => '2022-02-10 10:00:02'],
            ['id' => 2, 'title' => 'second post', 'body' => 'second post body', 'posted_by' => 'Mohamed', 'email' => 'Mohamed@mail.com', 'created_at' => '2022-02-15 05:00:11'],
            ['id' => 3, 'title' => 'third post', 'body' => 'third post body', 'posted_by' => 'Gana', 'email' => 'Gana@mail.com', 'created_at' => '2022-02-16 04:55:14'],
            ['id' => 4, 'title' => 'forth post', 'body' => 'forth post body', 'posted_by' => 'Youssef', 'email' => 'Youssef@mail.com', 'created_at' => '2022-17-15 03:14:53'],
            ['id' => 5, 'title' => 'fifth post', 'body' => 'fifth post body', 'posted_by' => 'Ramy', 'email' => 'Ramy@mail.com', 'created_at' => '2022-02-18 01:41:41'],
            ['id' => 6, 'title' => 'sixth post', 'body' => 'sixth post body', 'posted_by' => 'Maged', 'email' => 'Maged@mail.com', 'created_at' => '2022-02-19 11:33:20'],
        ];
    }

    public function getPost($id)
    {
        $posts = $this->getPosts();
        foreach ($posts as $post) {
            if ($post['id'] == $id) {
                return $post;
            }
        }
        return null;
    }
}
