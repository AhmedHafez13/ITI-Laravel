@extends('layouts.app')

@section('title') Edit @endsection

@section('content')
<form method="POST" action="{{route('posts.update', ['post' => $post->id])}}" class="mt-5">
    @csrf
    @method('PATCH')
    <div class="mb-3">
        <label for="titleInput" class="form-label">Title</label>
        <input name="title" type="text" value="{{$post->title}}" class="form-control" id="titleInput"
            aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="descriptionInput" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="descriptionInput">{{$post->description}}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Post Creator</label>
        <select name="user_id" class="form-control">
            <option disabled>Creator</option>
            @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif|
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection
