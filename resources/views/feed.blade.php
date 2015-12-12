@extends('layouts.menu')
@section('title')New Feed @stop
@section('content')
<script type="text/javascript">document.getElementById('navbar-display').style.display = 'block';</script>
<script>
    $(document).ready(function () {
        if(!$.lazyLoadXT.forceLoad) {
            $('#marker-end')
                    .on('lazyshow', function () {
                        $.ajax({
                            url: 'http://localhost:8000/image',
                            dataType: "html"
                        })
                                .done(function (responseText) {
                                    // add new elements
                                    $('#infinite').append(
                                            $('<div>')
                                                    .append($.parseHTML(responseText))
                                                    .find('#infinite')
                                                    .children()
                                    );
                                    // process added elements
                                    $(window).lazyLoadXT();
                                    $('#marker-end').lazyLoadXT({visibleOnly: false, checkDuplicates:true});
                                });
                    })
                    .lazyLoadXT({visibleOnly: false});
        }

    });
</script>
<div class="showimages">

    <div id="infinite">
        @for($i=0;$i< sizeof($images);$i++)
            <img src="./images/{{$images[$i]->url_path}}">
        @endfor

    </div>
    <div id="marker-end"></div>
</div>

@stop
