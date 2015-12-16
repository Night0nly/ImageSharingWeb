@extends('layouts.menu')
@section('title')User Information @stop
@section('content')
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        th{padding: 5px;
            text-align: center;
        }
        td {
            text-align: center;
        }
        a {
            color: #1ABC9C;
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
    </style>
    <script type="text/javascript">document.getElementById('navbar-display').style.display = 'block';</script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".deleteUser").click(function(event){
                event.preventDefault();
                $html_will_delete=$(this).parent().parent().parent();
                if (confirm("Delete this user ?")) {
                    $.post("{{url('/deleteuser')}}", $( this ).closest("form").serialize(), function() {
                        $html_will_delete.remove();
                    });
                }
            });
            $(".rank").click(function(event){
                event.preventDefault();
                $this = $(this);
                if($this.text().trim()=='Up'){
                    $.post("{{url('/uprank')}}", $( this ).closest("form").serialize(), function() {
                        $this.text('Down');
                    });
                }else{
                    $.post("{{url('/downrank')}}", $( this ).closest("form").serialize(), function() {
                        $this.text('Up');
                    });
                }
            });
        });
    </script>


    <div style="margin: 70px 0px 0px 0px;">
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-2"><h4>Search Username:</h4></div>
            <form action="{{ url('/searchuser') }}" method="POST">
                {!! csrf_field() !!}
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="searchUser" placeholder="Username" />
                </div>
                <div class="col-sm-4">
                    <button type="submit" class="search btn btn-embossed btn-primary">Search</button>
                </div>
            </form>
        </div>
        @if(Session::has('message'))
            <h1 class='alert alert-success'>
                {{Session::get('message')}}
            </h1>
        @endif
        @if(!empty($users))
        <table style="width: 100%;text-align: center">
            <tr style="color: #1b2537;background-color: #a3c4d2">
                <th>Username</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Birthday</th>
                <th>Introduction</th>
                <th>Change</th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{$user->username}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->firstname}}</td>
                <td>{{$user->lastname}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->birthday}}</td>
                <td>{{$user->introduction}}</td>
                <td style="width: 100px">
                    <form action="{{url()}}" method= "POST">
                        {!! csrf_field() !!}
                        <input type="hidden" name="userid" value="{{$user->id}}" />
                        <a href="" class="deleteUser">Delete</a>

                    </form>
                    <form action="{{url()}}" method= "POST">
                        {!! csrf_field() !!}
                        <input type="hidden" name="userid" value="{{$user->id}}" />
                        @if($user->rank == 1)
                            <a href="" class="rank">Down</a>
                        @else
                            <a href="" class="rank">Up</a>
                        @endif
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        <div style="text-align: center;width: 100%;margin-top: 50px;margin-bottom: 50px">
            {!! $users->render() !!}
        </div>
        @endif
        {{--*******************************************************************************--}}
        {{--<ul style="margin: 30px 35%" class="pagination-plain">--}}
            {{--<li class="previous">--}}
                {{--<a style="color:#13A41F;" href="@if($i>0)http://localhost:8000/userinfo/{{$i-1}}@endif">Previous</a>--}}
            {{--</li>--}}
            {{--@for($l=4;$l>0;$l--)--}}
                {{--@if(($i-$l)>=0)--}}
                    {{--<li>--}}
                        {{--<a style="color:#13A41F;" href="http://localhost:8000/userinfo/{{$i-$l}}">{{$i+1-$l}}</a>--}}
                    {{--</li>--}}
                {{--@endif--}}
            {{--@endfor--}}
            {{--<li>--}}
                {{--<a style="color:#cc1915;" href="http://localhost:8000/userinfo/{{$i}}">{{$i+1}}</a>--}}
            {{--</li>--}}
            {{--@for($k=1;$k<5;$k++)--}}
                {{--@if((sizeof($all)/10-$k)>0)--}}
                    {{--<li>--}}
                        {{--<a style="color:#13A41F;" href="http://localhost:8000/userinfo/{{$i+$k}}">{{$i+1+$k}}</a>--}}
                    {{--</li>--}}
                {{--@endif--}}
            {{--@endfor--}}
            {{--@for($j=1;$j<(5-$i);$j++)--}}
                {{--<li>--}}
                    {{--<a style="color:#13A41F;" href="http://localhost:8000/userinfo/{{$i+4+$j}}">{{$i+5+$j}}</a>--}}
                {{--</li>--}}
            {{--@endfor--}}
            {{--<li class="next">--}}
                {{--<a style="color:#13A41F;" href="http://localhost:8000/userinfo/{{$i+1}}">Next</a>--}}
            {{--</li>--}}
        {{--</ul>--}}

    </div>

@stop