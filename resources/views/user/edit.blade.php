@extends('layouts.menu')
@section('title') Image {{$image->url_path}} @stop
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

    <div class="container" style="margin-left: 300px">

        <div class="editI" style="margin-top: 50px; width: 60%; font-family: 'Open Sans Regular', sans-serif; font-size: 18px; color: #00619a">
            <p>Image:
            <div class="ima" style="margin: 30px 20%">
                <img width="300px" src="{{url()}}/images/Amazing Lock Screen/{{$image->url_path}}">
            </div>
            </p>
            {!! Form::open(array('action' =>'ImageController@updateImage')) !!}
            {!! csrf_field() !!}
            <p>Title:
            <div class="form-group">
                <input class="form-control" type="text" name="title" value=""  />
            </div>
            </p>
            <p>Caption:
            <div class="form-group">
                <input class="form-control" type="text" name="caption" value=""  />
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
            <input hidden name="imageId" value="{{$image->id}}">
            <button type="submit" style="margin-left: 20%" class="btn btn-default btn-wide btn-primary">
                Update
            </button>
        </div>

    </div>
    {!! Form::close() !!}

@stop
