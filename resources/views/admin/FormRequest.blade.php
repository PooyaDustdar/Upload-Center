@extends('admin.app')
@section('content')
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <h1 class="page-header"></h1>
        </div>
        <div class="col-lg-3"></div>
    </div>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">ویرایش کاربر</div>
                <div class="panel-body">
                    <form method="post" action="{{ url("requests") }}" role="form">
                        {{csrf_field()}}
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="subject" placeholder="موضوع">
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-server"></i></span>
                            <textarea class="form-control" name="content" placeholder="متن درخواست" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>نوع درخواست:</label>
                            <label class="radio-inline">
                                <input type="radio" name="level" value="2">فوری
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="level" value="1">عادی
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">ارسال</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
@endsection