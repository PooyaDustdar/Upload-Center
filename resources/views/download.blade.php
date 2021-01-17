@extends('app')
@section('content')
    <div class="download box">
        <div id="links">
            <button class="button" id="create_link">Create Download Link</button>
        </div>
        <div style="width: 100%;border-bottom: 2px solid #e65050;"></div>
        <div class="item">
            <div style="width: 100%;height: 50px;box-sizing: border-box;line-height: 50px;vertical-align: middle;text-align: center;padding: 0px;color: #F4F4F4;">
                <span class="fa fa-file-text-o fa-3x"></span>
            </div>
            <div style="color: #454545;width: 100%;height: auto;background-color: #F4F4F4;box-sizing: border-box;margin-top: 5px;padding: 5px;border-radius: 5px;text-align: center;font-weight: 500;font-size: 12px;">
                {{$name}}
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script>
        $('#create_link').click(function () {
            $.ajax({
                type: "POST",
                url: '{{url('/download/'.$id)}}',
                data: {_token: '{{csrf_token()}}', id: '{{$id}}'},
                success: function (data) {
                    $('#links').html(data);
                }
            });
        });
    </script>
@endsection
