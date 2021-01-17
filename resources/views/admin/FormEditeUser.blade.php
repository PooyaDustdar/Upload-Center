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
                    <form method="post" action="{{ url('/users/'.$id) }}" role="form">
                        {{csrf_field()}}
                        {{method_field("PUT")}}
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" value="{{$name}}" name="name"
                                   placeholder="نام و نام خانوادگی">
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="text" class="form-control" value="{{$email}}"
                                   placeholder="email@example.com" disabled>
                        </div>

                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="fa fa-server"></i></span>
                            <input type="text" class="form-control" value="{{$size/1024}}" name="size"
                                   placeholder="فضای کاربر">
                        </div>
                        <div class="form-group">
                            <label>نوع کاربری:</label>
                            <label class="radio-inline">
                                <input type="radio" name="type" value="admin"
                                       @if($type == "admin") checked @endif>مدیر
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="type" value="user"
                                       @if($type == "user") checked @endif>کاربر
                            </label>
                        </div>
                        <button type="submit" class="btn btn-default">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-3"></div>
    </div>
@endsection