@extends('admin.app')
@section('content')
    <div class="row">
        <div class="col-lg-12" style="margin-top: 3%">
            <div class="panel panel-default">
                <div class="panel-heading">نمایش درخواست</div>
                <div class="panel-body">
                    <form method="post" action="{{ url("requests") }}" role="form">
                        <div class="form-group input-group">
                            <span class="input-group-addon">موضوع:</span>
                            <div type="text" class="form-control">{{$subject}}</div>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon">متن درخواست:</span>
                            <div class="form-control" rows="3">{{$content}}</div>
                        </div>
                        <div class="form-group">
                            <label>نوع درخواست:</label>
                            @if($level == 2)
                                فوری
                            @elseif($level == 1)
                                عادی
                            @endif
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection