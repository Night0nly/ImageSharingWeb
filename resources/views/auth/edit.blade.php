@extends('layouts.menu')
@section('title')Edit Profile @stop
@section('content')
    <script type="text/javascript">document.getElementById('navbar-display').style.display = 'block';</script>
    {!! Form::open(array('action' =>'Auth\AuthController@updateP')) !!}
    {!! csrf_field() !!}
    <div class="container" style="align-content: center;margin-left: 300px">

        <div class="editp" style="margin-top: 50px; width: 60%; font-family: 'Open Sans Regular', sans-serif; font-size: 18px; color: #00619a">
            <p>First Name:
            <div class="form-group">
                <input class="form-control" type="text" placeholder="{{Auth::user()->firstname}}" disabled />
            </div>
            </p>
            <h3>Last Name
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="{{Auth::user()->lastname}}" disabled />
                </div>
            </h3>
            <h3>Email
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="{{Auth::user()->email}}" disabled />
                </div>
            </h3>
            {{--<h3>Change Password--}}
            {{----}}
            {{--</h3>--}}
            <h3>Dislay Name
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="{{Auth::user()->username}}" disabled />
                </div>
            </h3>
            <h3>Phone
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="{{Auth::user()->phone}}" disabled />
                </div>
            </h3>
            <h3>Birthday
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="{{Auth::user()->birthday}}" disabled />
                </div>
            </h3>
            <h3>Introduction
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="{{Auth::user()->introduction}}" disabled />
                </div></h3>
        </div>
    </div>
    {!! Form::close() !!}

@stop
