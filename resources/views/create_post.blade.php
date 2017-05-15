@extends('layouts.app')
@section('content')

<div class="container">
    <form method="post" action="{{ url('/create_post') }}">
        {{ csrf_field() }}
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Title</h3>
            <input type="text" name="title" class="form-control" placeholder="Title">
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Slug</h3>
            <input type="text" name="slug" class="form-control" placeholder="Slug">
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h3>Text</h3>
            <textarea class="form-control" name="text" rows="4" placeholder="Text"></textarea>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1 col-md-offset-2">
            <h3></h3>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    </form>
</div>
@stop