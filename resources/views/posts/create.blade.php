@extends('layouts.app')

@section('title') Create @endsection

@section('content')
<form method="POST" action="{{route('posts.store')}}" class="mt-5">
    @csrf
    <div class="mb-3">
        <label for="titleInput" class="form-label">Title</label>
        <input name="title" type="text" value="mail" class="form-control" id="titleInput" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="descriptionInput" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="descriptionInput"></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Post Creator</label>
        <select name="post_creator" class="form-control">
            <option disabled>Creator</option>
            <option value="1">Ahmed</option>
            <option value="2">Mohamed</option>
            <option value="3">Gana</option>
            <option value="4">Youssef</option>
            <option value="5">Ramy</option>
            <option value="6">Maged</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection
