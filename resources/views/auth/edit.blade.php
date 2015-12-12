@extends('layouts.menu')
@section('title')Edit Profile @stop
@section('content')
    <script type="text/javascript">document.getElementById('navbar-display').style.display = 'block';</script>
    @if(count($errors)>0)
        <div class="errMes">
            <p>{{count($errors)}} Error:
                @foreach($errors->all() as $error)
                    {{$error}}.
                @endforeach
            </p>
        </div>
    @endif
    {!! Form::open(array('action' =>'Auth\AuthController@putUpdate')) !!}
    {!! csrf_field() !!}
    <div class="container" style="align-content: center;margin-left: 300px">

        <div class="editp" style="margin-top: 50px; width: 60%; font-family: 'Open Sans Regular', sans-serif; font-size: 18px; color: #00619a">
            <p>First Name:
            <div class="form-group">
                <input class="form-control" type="text" name="firstname" value="{{Auth::user()->firstname}}"/>
            </div>
            </p>
            <p>Last Name
                <div class="form-group">
                    <input class="form-control" type="text"  name="lastname" value="{{Auth::user()->lastname}}" />
                </div>
            </p>
            <p>Email
                <div class="form-group">
                    <input class="form-control" type="text" value="{{Auth::user()->email}}" disabled/>
                </div>
            </p>

            <p>Dislay Name
                <div class="form-group">
                    <input class="form-control" type="text" name="username" value="{{Auth::user()->username}}" />
                </div>
            </p>
            <p>Phone
                <div class="form-group">
                    <input class="form-control" type="text" name="phone" value="{{Auth::user()->phone}}"  />
                </div>
            </p>
            <p>Birthday
                <div class="form-group">
                    <input class="form-control" type="text" name="birthday" value="{{Auth::user()->birthday}}"  />
                </div>
            </p>
            <p>Introduction
                <div class="form-group">
                    <input class="form-control" type="text" name="introduction" value="{{Auth::user()->introduction}}"  />
                </div></p>
            <p>Change Password
            <div class="form-group">
                <input class="form-control" type="password" name="current_password"  placeholder="Current Password"/>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="New Password"/>
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password"/>
            </div>
            </p>
            <button type="submit"  class="btn btn-default btn-wide btn-primary">
                Update
            </button>
        </div>

    </div>
    {!! Form::close() !!}

@stop
