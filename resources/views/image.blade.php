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
            <div class="row">
                <div class="col-sm-1">
                    <form action="http://localhost:8000/editimage/{{$image->id}}">
                        <button class="btn btn-inverse" onclick="">  Edit  </button>
                    </form>
                </div>
                <div class="col-sm-1">
                <form action="/deleteimage" method="POST" onsubmit="return ConfirmDelete()">
                    {!! csrf_field() !!}
                    <input hidden name="imageId" value="{{$image->id}}">
                    <button type="submit" class="btn btn-danger">
                        Delete
                    </button>
                </form>
                <script>

                    function ConfirmDelete()
                    {
                        var x = confirm("Are you sure you want to delete?");
                        if (x)
                            return true;
                        else
                            return false;
                    }

                </script>
                    </div>
        @endif
        @endif
            </div>
        <form action="{{url('/comment')}}" method="POST">
            {!! csrf_field() !!}
            <input type="hidden" name="imageId" value="{{$image->id}}" class="form-control" />
            @if(Auth::check())
                <input type="hidden" placeholder="Name" name="guestName" value="{{Auth::user()->username}}" class="form-control" />
            @else
                <input type="text" placeholder="Name" name="guestName" class="form-control" />
            @endif
            <input type="text" placeholder="Comment" name="comment" class="form-control" />
            <input type="submit" hidden />
        </form>
        <h4>Comments:</h4>
        @foreach($comments as $comment)
        <p style="font-weight: bold; color: #5489b3;font-style: italic">{{$comment->guestName}} : <span style="font-weight: normal;font-style: normal;color: #101010">{{$comment->comment}}</span></p>
        @endforeach

        <div style="text-align: center;width: 100%;margin-top: 50px;margin-bottom: 50px">
            {!! $comments->render() !!}
        </div>
    </div>

@stop