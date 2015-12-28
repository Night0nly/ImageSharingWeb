@extends('layouts.menu')
@section('title')My Photos @stop
@section('content')
    <script type="text/javascript">document.getElementById('navbar-display').style.display = 'block';</script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("select").select2({dropdownCssClass: 'dropdown-inverse'});
        });
    </script>
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
    </style>
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
                        <input class="form-control" type="text" name="title" value=""/>
                    </div>
                    </p>
                    <p>Caption:
                    <div class="form-group">
                        <input class="form-control" type="text" name="caption" value=""/>
                    </div>
                    </p>
                    <p>Type:

                        <select multiple="multiple" class="form-control multiselect multiselect-info" name="type[]">
                            <option value="1">Nature</option>
                            <option value="2">Wild</option>
                            <option value="3">Street</option>
                            <option value="4">Men</option>
                            <option value="5">Woman</option>
                            <option value="6">Animal</option>
                        </select>

                    </p>
                </div>
                {!! Form::submit('Submit', array('class'=>'btn btn-default')) !!}
                {!! Form::close() !!}
            </div>
        </div>
    @endif
    <div style="margin: 50px auto 50px auto; text-align: center;width: 100%">
        {!! $images->render() !!}
    </div>
    <div style="margin: 70px 0px 0px 20%;color: #a21605">

        @foreach($images as $image)
            <div class="row">
                <div class="col-sm-9">
                    <a href="http://localhost:8000/image/{{$image->id}}"><img width="100%" src="{{url()}}/images/Amazing Lock Screen/{{$image->url_path}}"></a>
                </div>
                <div class="col-sm-3">
                    <h3>Title: {{$image->title}}</h3>
                    <h5>Created At: {{$image->created_at}}</h5>
                    <tr>
                        <td>Type:</td>
                        <td>
                            @foreach($phototags as $phototag)
                                @if($phototag->image_id == $image->id)
                                    @foreach($tags as $tag)
                                        @if($phototag->tag_id == $tag->id)
                                            <span>{{$tag->tag_name}}</span>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </td>
                    </tr>
                    <h5>{{$image->caption}}</h5>
                </div>
            </div>
        @endforeach
    </div>
    <div style="margin: 50px auto 50px auto; text-align: center;width: 100%">
        {!! $images->render() !!}
    </div>
@stop
