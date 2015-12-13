@extends('layouts.menu')
@section('title')New Feed @stop
@section('content')
<script type="text/javascript">document.getElementById('navbar-display').style.display = 'block';</script>
        <div style="margin: 70px 0px 0px 20%;">
            <ul style="margin: 75px auto 75px 20%" class="pagination-plain">
                <li class="previous">
                    <a style="color:#13A41F;" href="@if($i>0)http://localhost:8000/feed/{{$i-1}}@endif">Previous</a>
                </li>
                @for($l=4;$l>0;$l--)
                    @if(($i-$l)>=0)
                        <li>
                            <a style="color:#13A41F;" href="http://localhost:8000/feed/{{$i-$l}}">{{$i+1-$l}}</a>
                        </li>
                    @endif
                @endfor
                <li>
                    <a style="color:#cc1915;" href="http://localhost:8000/feed/{{$i}}">{{$i+1}}</a>
                </li>
                @for($k=1;$k<5;$k++)
                    @if((sizeof($photos)/10-$k)>0)
                        <li>
                            <a style="color:#13A41F;" href="http://localhost:8000/feed/{{$i+$k}}">{{$i+1+$k}}</a>
                        </li>
                    @endif
                @endfor
                @for($j=1;$j<(5-$i);$j++)
                    <li>
                        <a style="color:#13A41F;" href="http://localhost:8000/feed/{{$i+4+$j}}">{{$i+5+$j}}</a>
                    </li>
                @endfor
                <li class="next">
                    <a style="color:#13A41F;" href="http://localhost:8000/feed/{{$i+1}}">Newer</a>
                </li>
            </ul>
            {{--***************************************************************--}}
            @foreach($images as $image)
                <div class="row">
                    <div class="col-sm-9">
                        <a href="#"><img width="100%" src="{{url()}}/images/Amazing Lock Screen/{{$image->url_path}}"></a>
                    </div>
                    <div class="col-sm-3">
                        <h3>Title: {{$image->title}}</h3>
                        <h5>Vote: {{$image->vote_count}}</h5>
                        <h5>{{$image->caption}}</h5>
                    </div>
                </div>
            @endforeach
            {{--*********************************************************************--}}
        <ul style="margin: 75px auto 75px 20%" class="pagination-plain">
            <li class="previous">
                <a style="color:#13A41F;" href="@if($i>0)http://localhost:8000/feed/{{$i-1}}@endif">Previous</a>
            </li>
            @for($l=4;$l>0;$l--)
                @if(($i-$l)>=0)
                    <li>
                        <a style="color:#13A41F;" href="http://localhost:8000/feed/{{$i-$l}}">{{$i+1-$l}}</a>
                    </li>
                @endif
            @endfor
            <li>
                <a style="color:#cc1915;" href="http://localhost:8000/feed/{{$i}}">{{$i+1}}</a>
            </li>
            @for($k=1;$k<5;$k++)
                @if((sizeof($photos)/10-$k)>0)
                <li>
                    <a style="color:#13A41F;" href="http://localhost:8000/feed/{{$i+$k}}">{{$i+1+$k}}</a>
                </li>
                @endif
            @endfor
            @for($j=1;$j<(5-$i);$j++)
                <li>
                    <a style="color:#13A41F;" href="http://localhost:8000/feed/{{$i+4+$j}}">{{$i+5+$j}}</a>
                </li>
            @endfor
            <li class="next">
                <a style="color:#13A41F;" href="http://localhost:8000/feed/{{$i+1}}">Newer</a>
            </li>
        </ul>
    </div>
@stop
