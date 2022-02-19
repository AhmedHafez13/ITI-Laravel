@extends('layouts.app')

@section('title') Create @endsection

@section('content')
<form method="PUT" action="{{route('posts.update', ['post' => $post['id']])}}" class="mt-5">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="titleInput" class="form-label">Title</label>
        <input name="title" type="text" value="{{$post['title']}}" class="form-control" id="titleInput"
            aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="descriptionInput" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="descriptionInput">{{$post['body']}}</textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Post Creator</label>
        <select name="post_creator" class="form-control">
            <option disabled>Creator</option>
            <option value="1" {{$post['posted_by']=="Ahmed" ? "selected" : "" }}>Ahmed</option>
            <option value="2" {{$post['posted_by']=="Mohamed" ? "selected" : "" }}>Mohamed</option>
            <option value="3" {{$post['posted_by']=="Gana" ? "selected" : "" }}>Gana</option>
            <option value="4" {{$post['posted_by']=="Youssef" ? "selected" : "" }}>Youssef</option>
            <option value="5" {{$post['posted_by']=="Ramy" ? "selected" : "" }}>Ramy</option>
            <option value="6" {{$post['posted_by']=="Maged" ? "selected" : "" }}>Maged</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection
