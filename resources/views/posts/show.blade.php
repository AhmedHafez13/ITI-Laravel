@extends('layouts.app')

@section('title') Create @endsection

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <h5>Title</h5>
            <p>{{ $post['title'] }}</p>
            <h5>Description</h5>
            <p>{{ $post['body'] }}</p>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            <h5>Name</h5>
            <p>{{ $post['posted_by'] }}</p>
            <h5>Email</h5>
            <p>{{ $post['email'] }}</p>
            <h5>Created at</h5>
            <p>{{ $post['created_at'] }}</p>
        </div>
    </div>
</div>
@endsection
