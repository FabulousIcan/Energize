@extends('layouts.app')

@section('title')
Show Article
@stop

@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <h2 class="panel-title">{{ $article->title }}</h2></div>
    <div class="panel-body"><p>{{ $article->body}}</p></div>
    <div class="panel-footer" style="text-align: right;"><span>{{ $article->created_at }} {{ $article->user->name}}</span></div>
</div>
<!-- comments will be added here -->

<div>
	@foreach($article->comments as $comment)
	<div>{{ $comment->comment }} <small><span style="color: grey;">{{ $comment->created_at }}</span></small></div>
	@endforeach
</div>

@if( Auth::check() )
<div>
	<form class="form-horizontal" method="POST" action="/addComment">
	    <div class="form-group">
	        <label class="control-label col-sm-2">Comment</label>
	        <div class="col-sm-10">
	            <textarea class="form-control" rows="8" name="comment"></textarea>
	       </div> 
	    </div>
	    <div class="col-sm-offset-2 col-sm-10">
	        {{ csrf_field() }}
	        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
	        <input type="hidden" name="article_id" value="{{ $article->id }}">
	        <input class="btn btn-default pull-right" type="submit" value="Comment">
	    </div>
	</form>
</div>
@endif
@stop
