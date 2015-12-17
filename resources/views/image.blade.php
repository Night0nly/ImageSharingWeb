@extends('layouts.menu')
@section('title') Image {{$image->url_path}} @stop
@section('content')
    <script type="text/javascript">document.getElementById('navbar-display').style.display = 'block';</script>

    <div class="ima" style="margin-top: 30px">
            <img src="{{url()}}/images/Amazing Lock Screen/{{$image->url_path}}">
    </div>
    <div class="imageInfo" style="margin: 30px auto 300px 20%; color: #1a6451;">
        <h2>Title: {{$image->title}}</h2>
        <h4>Vote: {{$image->vote_count}}</h4>
        @foreach($tags as $tag)
            @if($image->tag_id == $tag->id)
                <h4>Type: {{$tag->tag_name}}</h4>
            @endif
        @endforeach
        <h4>{{$image->caption}}</h4>
        @if(Auth::check())
        @if(Auth::User()->rank == 1 or Auth::User()->id== $image->user_id)
        <button class="btn btn-inverse" action="">Edit</button>
        @endif
        @endif
        <h4>Comments:</h4>
        @foreach($comments as $comment)
        <p style="font-weight: bold; color: #a6b3a2;font-style: italic">{{$comment->guestName}} : <span style="font-weight: normal;font-style: normal;color: #101010">{{$comment->comment}}</span></p>
        @endforeach

        <div style="text-align: center;width: 100%;margin-top: 50px;margin-bottom: 50px">
            {!! $comments->render() !!}
        </div>
    </div>

@stop