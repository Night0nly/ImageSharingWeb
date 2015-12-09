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
                            url: 'http://localhost:8000/image/1',
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
                                    $('#marker-end').lazyLoadXT({visibleOnly: false, checkDuplicates: false});
                                });
                    })
                    .lazyLoadXT({visibleOnly: false});
        }
    });
</script>
<div class="showimages">

    <div id="infinit">
            <img src="./images/{{$photos[0]->image}}">
    </div>
    <div id="marker-end"></div>
</div>

@stop
