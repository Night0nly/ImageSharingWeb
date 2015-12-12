@extends('layouts.menu')
@section('title')Edit Profile @stop
@section('content')
    <script type="text/javascript">document.getElementById('navbar-display').style.display = 'block';</script>
  <div class="container" style="align-content: center;margin-left: 300px">

      <div class="editp" style="margin-top: 50px; width: 60%; font-family: 'Open Sans Regular', sans-serif; font-size: 18px; color: #00619a">
          <p>First Name:
          <div class="form-group">
              <input class="form-control" type="text" placeholder="{{Auth::user()->firstname}}" disabled />
          </div>
          </p>
          <p>Last Name
              <div class="form-group">
                  <input class="form-control" type="text" placeholder="{{Auth::user()->lastname}}" disabled />
              </div>
          </p>
          <p>Email
              <div class="form-group">
                  <input class="form-control" type="text" placeholder="{{Auth::user()->email}}" disabled />
              </div>
          </p>
          {{--<p>Change Password--}}
          {{----}}
          {{--</p>--}}
          <p>Dislay Name
              <div class="form-group">
                  <input class="form-control" type="text" placeholder="{{Auth::user()->username}}" disabled />
              </div>
          </p>
          <p>Phone
              <div class="form-group">
                  <input class="form-control" type="text" placeholder="{{Auth::user()->phone}}" disabled />
              </div>
          </p>
          <p>Birthday
              <div class="form-group">
                  <input class="form-control" type="text" placeholder="{{Auth::user()->birthday}}" disabled />
              </div>
          </p>
          <p>Introduction
              <div class="form-group">
                  <input class="form-control" type="text" placeholder="{{Auth::user()->introduction}}" disabled />
              </div></p>
          <form action="http://localhost:8000/auth/edit" style="margin-left:28%">
              <button  class="btn btn-default btn-wide btn-primary">
                  Edit
              </button>
          </form>
      </div>
  </div>
@stop
