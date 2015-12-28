@extends('layouts.menu')
@section('title') Search Image @stop
@section('content')
    <script type="text/javascript">document.getElementById('navbar-display').style.display = 'block';</script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('.check').removeClass('visible');
            $('.checkbox').attr("checked",false);
            $('.checkbox').click(function(){
                $select = $(this).parent().parent().find(".check");
                $select.toggleClass('visible');
            });
        });
    </script>

    <div style="margin: 70px 0px 0px 0px;">
        <form style="text-align: center" action="{{ url('/searchimage') }}" method="GET">
            {!! csrf_field() !!}
            <div class="row" style="text-align: left">
            <div class="col-sm-2"></div>
            <div class="col-sm-2"><h4>Search Image</h4></div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="title" placeholder="Image Title" />
                </div>
        </div>
            <div class="row" style="text-align: left;">
                <div class="col-sm-2"></div>
                <div class="col-sm-1"><h4>Type</h4></div>
                <div class="col-sm-1">
                    {!! Form::checkbox('typeCheck', true, false,['class'=>'checkbox']) !!}
                </div>
                <div class="col-sm-4">
                    <select multiple="multiple" class="form-control multiselect multiselect-info check" name="type[]">
                        <option value="1">Nature</option>
                        <option value="2">Wild</option>
                        <option value="3">Street</option>
                        <option value="4">Men</option>
                        <option value="5">Woman</option>
                        <option value="6">Animal</option>
                </select>
                {{--<script type="text/javascript">$("select").select2({dropdownCssClass: 'dropdown-inverse'});</script>--}}
                </div>
            </div>
            <div class="row" style="text-align: left;">
                <div class="col-sm-2"></div>
                <div class="col-sm-1"><h4>Belong To</h4></div>
                <div class="col-sm-1">
                    {!! Form::checkbox('ownerCheck', true, false,['class'=>'checkbox']) !!}
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control check" name="owner" placeholder="Owner" />
                </div>
            </div>
            <div class="row" style="text-align: left;">
                <div class="col-sm-2"></div>
                <div class="col-sm-1"><h4>Size</h4></div>
                <div class="col-sm-1">
                    {!! Form::checkbox('sizeCheck', true, false,['class'=>'checkbox']) !!}
                </div>
                <div class="col-sm-4">
                    <select class="form-control select select-info select-block mbl check" name="size">
                        <option value="1">< 1Mb</option>
                        <option value="2">1Mb -> 2Mb</option>
                        <option value="3">> 2Mb</option>
                    </select>
                    <script type="text/javascript">$("select").select2({dropdownCssClass: 'dropdown-inverse'});</script>
                </div>
            </div>
            <button type="submit" style="margin-top:20px" class="search btn btn-wide btn-primary">Search</button>

        </form>
        {{--//////////////////////////////////////////////////////////////////////////////////////////////////////--}}
        <div style="margin: 50px auto 50px auto; text-align: center">
            {!! $images->appends($requestSave)->render()!!}
        </div>
        <div style="margin: 70px 0px 0px 20%;color: #a21605">

            @foreach($images as $image)
                <div class="row">
                    <div class="col-sm-9">
                        <a href="http://localhost:8000/image/{{$image->id}}"><img width="100%" src="{{url()}}/images/Amazing Lock Screen/{{$image->url_path}}"></a>
                    </div>
                    <div class="col-sm-2">
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
                                        ><span class="voteClass">Vote: </span>{{$image->vote_count}}</button>
                                <input type="hidden" name="voteImageId" value="{{$image->id}}">
                            </form>
                        @else
                            <h5>Vote: {{$image->vote_count}}</h5>
                        @endif
                        {{--////////////////////////////////////////////////////////////////////--}}
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
                        <h5>Comment:</h5>
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
                    </div>
                </div>
            @endforeach
        </div>

        <div style="margin: 50px auto 50px auto; text-align: center">
            {!! $images->appends($requestSave)->render()!!}
        </div>
    </div>

@stop