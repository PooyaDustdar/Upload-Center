@extends('app')
@section('content')
    <form method="post" class="dropzone" id="addFile">
        {{csrf_field()}}
    </form>
    @if(count($files)>0)
        <form class="box">

            <div style="width: 100%;border-bottom: 2px solid #e65050;"></div>
            @foreach($files as $key => $val)
                <a href="{{$val['link']}}">
                <div class="item">
                        <div style="width: 100%;height: 50px;box-sizing: border-box;line-height: 50px;vertical-align: middle;text-align: center;padding: 0px;color: #F4F4F4;">
                            <span class="fa {{$val['image']}} fa-3x"></span>
                        </div>
                        <div style="width: 100%;height: auto;background-color: #F4F4F4;box-sizing: border-box;margin-top: 5px;padding: 5px;border-radius: 5px;text-align: center;font-weight: 500;font-size: 12px;">
                            {{$val['name']}}
                        </div>
                </div>
                </a>
            @endforeach
        </form>
    @endif

    <script src="js/dropzone.js"></script>
    <script>
        Dropzone.autoDiscover = false;
        var md = new Dropzone(".dropzone", {
            url: "{{ url('/upload')}}",
            paramName: "file"
        });
        md.on("complete", function (file) {
            if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
                location.reload();
            }
        });


    </script>
@endsection
