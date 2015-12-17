@extends('layouts.menu')
@section('title')New Feed @stop
@section('content')
<script type="text/javascript">document.getElementById('navbar-display').style.display = 'block';</script>
<style>
    a {
        color: #13A41F;
        text-decoration: none;
        -webkit-transition: .25s;
        transition: .25s;
    }
    a:hover,
    a:focus {
        color: #fffa39;
        text-decoration: none;
    }
    a:focus {
        outline: none;
    }
    .voteButton{
        background-color: #d0d2b5;
    }
</style>
<script type="text/javascript">

</script>
@if(count($errors)>0)
    <div class="errMes">
        <p>{{count($errors)}} Error:
            @foreach($errors->all() as $error)
                {{$error}}.
            @endforeach
        </p>
    </div>
@endif
@if(Auth::check())
<div class="text-content" style="margin-top: 50px;margin-left: 20%">
    <div class="span7 offset1">

        @if(Session::has('success'))
            <div class="alert-box success">
                <h2>{!! Session::get('success') !!}</h2>
            </div>
        @endif

        <h3>Upload Images</h3>
        {!! Form::open(array('url'=>'/images/upload','method'=>'POST', 'files'=>true)) !!}
            {!! csrf_field() !!}
            <div class="control-group">
            <div class="controls">
                {!! Form::file('images[]', array('multiple'=>true,'class'=>'btn btn-default')) !!}
            </div>
                <p>Title:
                <div class="form-group">
                    <input class="form-control"  type="text" name="title" value=""/>
                </div>
                </p>
                <p>Caption:
                <div class="form-group">
                    <input class="form-control" type="text" name="caption" value=""/>
                </div>
                </p>
                <p>Type:
                    <select class="form-control select select-primary select-block mbl" name="type">
                            <option value="0">Nature</option>
                            <option value="1">Wild</option>
                            <option value="2">Street</option>
                            <option value="3">Men</option>
                            <option value="4">Woman</option>
                            <option value="4">Animal</option>
                    </select>
                    <script type="text/javascript">
                        $("select").select2({dropdownCssClass: 'dropdown-inverse'});
                    </script>
                </p>
        </div>
        {!! Form::submit('Submit', array('class'=>'btn btn-default')) !!}
        {!! Form::close() !!}
    </div>
</div>
@endif

<div style="margin: 70px 0px 0px 20%;color: #a21605">

            <div style="margin: 50px auto 50px 25%;">
                {!! $images->render() !!}
            </div>
            @foreach($images as $image)
                <div class="row">
                    <div class="col-sm-9">
                        <a href="#"><img width="100%" src="{{url()}}/images/Amazing Lock Screen/{{$image->url_path}}"></a>
                    </div>
                    <div class="col-sm-3">
                        <h3>Title: {{$image->title}}</h3>
                        @if(Auth::check())
                        <form action="{{url('/vote')}}" method="POST">
                            {!! csrf_field() !!}
                        <button class="btn btn-default voteButton" type="submit"
                                @foreach($votes as $vote)
                                    @if($vote->image_id==$image->id)
                                        style="background-color: #ff0b0b"
                                    @endif
                                @endforeach
                                >Vote: {{$image->vote_count}}</button>
                            <input type="hidden" name="voteImageId" value="{{$image->id}}">
                        </form>
                        @else
                                <h5>Vote: {{$image->vote_count}}</h5>
                        @endif
                        {{--////////////////////////////////////////////////////////////////////--}}
                        @foreach($tags as $tag)
                            @if($image->tag_id == $tag->id)
                                <h5>Type: {{$tag->tag_name}}</h5>
                            @endif
                        @endforeach
                        <h5>{{$image->caption}}</h5>
                        <h5>Comment:</h5>
                        <form action="{{url('/comment')}}" method="POST">
                        {!! csrf_field() !!}
                        <input type="hidden" name="imageId" value="{{$image->id}}" class="form-control" />
                        <input type="text" placeholder="Name" name="guestName" class="form-control" />
                        <input type="text" placeholder="Comment" name="comment" class="form-control" />
                        <input type="submit" hidden />
                        </form>
                    </div>
                </div>
            @endforeach
            <div style="margin: 50px auto 50px 25%;">
                {!! $images->render() !!}
            </div>

    </div>
@stop
{{--<ul style="margin: 75px auto 75px 20%" class="pagination-plain">--}}
{{--<li class="previous">--}}
{{--<a style="color:#13A41F;" href="@if($i>0)http://localhost:8000/feed/{{$i-1}}@endif">Previous</a>--}}
{{--</li>--}}
{{--@for($l=4;$l>0;$l--)--}}
{{--@if(($i-$l)>=0)--}}
{{--<li>--}}
{{--<a style="color:#13A41F;" href="http://localhost:8000/feed/{{$i-$l}}">{{$i+1-$l}}</a>--}}
{{--</li>--}}
{{--@endif--}}
{{--@endfor--}}
{{--<li>--}}
{{--<a style="color:#cc1915;" href="http://localhost:8000/feed/{{$i}}">{{$i+1}}</a>--}}
{{--</li>--}}
{{--@for($k=1;$k<5;$k++)--}}
{{--@if((sizeof($photos)/10-$k)>0)--}}
{{--<li>--}}
{{--<a style="color:#13A41F;" href="http://localhost:8000/feed/{{$i+$k}}">{{$i+1+$k}}</a>--}}
{{--</li>--}}
{{--@endif--}}
{{--@endfor--}}
{{--@for($j=1;$j<(5-$i);$j++)--}}
{{--<li>--}}
{{--<a style="color:#13A41F;" href="http://localhost:8000/feed/{{$i+4+$j}}">{{$i+5+$j}}</a>--}}
{{--</li>--}}
{{--@endfor--}}
{{--<li class="next">--}}
{{--<a style="color:#13A41F;" href="http://localhost:8000/feed/{{$i+1}}">Newer</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--***************************************************************--}}
