@extends('layouts.app')

@section('content')

<div class="container first-container">
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-heading">
                {{ $post->title }}
            </div>
            <div class="panel-body">
                <h4>{!! $post->text !!}</h4>
            </div>
            <div class="panel-footer">
                <small>
                    created by: {{ $post->author->name }}<br>
                    created: {{ $post->created_at->diffForHumans() }}
                </small>
            </div>
        </div>
    </div>

    <div class="row">
    @foreach($comments as $comment)
        <div class="panel panel-info">
            <div class="panel-heading">
                Reply from: {{ $comment->author->name }}
            </div>
            <div class="panel-body">
                {{ $comment->comment }}
            </div>
            <div class="panel-footer">
                {{ $comment->created_at->diffForHumans() }}
            </div>
        </div>
        @endforeach
        <div class="col-md-offset-5">
            {{ $comments->links() }}
        </div>
        <form method="post" action="{{ url('/post/' . $post->slug) }}">
            {{ csrf_field() }}
            <div class="col-md-12 form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" name="comment" rows="4" placeholder="Reply"></textarea>
                <input name="post_id" type="hidden" class="hidden" value="{{ $post->id }}">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </form>
    </div>
</div>
@stop
