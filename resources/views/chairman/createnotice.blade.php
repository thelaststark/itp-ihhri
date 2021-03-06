@extends('backend.layout')

@include('chairman.nav')

@section('content')
<div class="container">
    <form class="form" action="/aboutus" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="title">Title</label>
            <input name="title" maxlength="20" id="title" class="form-control" type="text" placeholder="Title">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" maxlength="250" id="description" class="form-control"
                placeholder="Description"></textarea>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" name="image" id="image">
        </div>

        <div class="form-group">
            <input type="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
</div>
@endsection