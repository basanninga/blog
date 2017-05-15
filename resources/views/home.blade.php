@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <i class="fa fa-fort-awesome fa-4x" aria-hidden="true"></i>
                </div>
                <div class="panel-body text-center">
                    Welcome to the blog {{ Auth::user()->name }} !
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="row">
                @foreach($posts as $post)
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            {{ $post->title }}
                        </div>
                        <div class="panel-body">
                            {{$post->text}}
                        </div>
                        <div class="panel-footer">
                            <small>
                                Created by: {{ $post->author->name }}
                            </small>
                            @if(Auth::user()->role == 1)
                            <div class="pull-right">
                                <form method="post" action='/post/{{$post->id}}'>
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></button>
                                </form>
                            </div>
                            @endif
                            <div class="pull-right">
                                <a href="{{ url('/post/' . $post->slug) }}"><i class="fa fa-comments fa-2x" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
