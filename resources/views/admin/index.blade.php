@extends('admin.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">داشبورد</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$count['user']}}</div>
                            <div>کاربران</div>
                        </div>
                    </div>
                </div>
                <a href="{{url('/users')}}">
                    <div class="panel-footer">
                        <span class="pull-left">نمایش کامل</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$count['file']}}</div>
                            <div>تعداد فایل ها</div>
                        </div>
                    </div>
                </div>
                <a href="{{url('/files')}}">
                    <div class="panel-footer">
                        <span class="pull-left">نمایش کامل</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$statistics['today']}}</div>
                            <div>بازدید امروز سایت</div>
                        </div>
                    </div>
                </div>
                <a href="{{url('/report/views')}}">
                    <div class="panel-footer">
                        <span class="pull-left">نمایش کامل</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-support fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{$statistics['download']['today']}}</div>
                            <div>دانلود های امروز</div>
                        </div>
                    </div>
                </div>
                <a href="{{url('/report/downloads')}}">
                    <div class="panel-footer">
                        <span class="pull-left">نمایش کامل</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i> فایل های جدید
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        @foreach($files as $key=>$val)
                            <a href="{{url('/download/' . $val->id)}}" class="list-group-item">
                                <i class="fa {{$val->mime_type}} fa-fw"></i>{{$val->name}}=>{{$val->new_name}}
                                <span class="pull-left text-muted small"><em>{{$val->created_at}}</em></span>
                            </a>
                        @endforeach
                    </div>
                    <a href="{{url('/files')}}" class="btn btn-default btn-block">دیدن همه فایل ها</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bell fa-fw"></i> امار سایت
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <a class="list-group-item">
                            <i class="fa fa-comment fa-fw"></i> بازدید امروز از سایت
                            <span class="pull-left text-muted small"><em>{{$statistics['today']}}</em></span>
                        </a>
                        <a class="list-group-item">
                            <i class="fa fa-twitter fa-fw"></i>دانلود های امروز
                            <span class="pull-left text-muted small"><em>{{$statistics['download']['today']}}</em></span>
                        </a>
                        <a class="list-group-item">
                            <i class="fa fa-envelope fa-fw"></i>اپلود های امروز
                            <span class="pull-left text-muted small"><em>{{$statistics['upload']['today']}}</em></span>
                        </a>
                        <a class="list-group-item">
                            <i class="fa fa-tasks fa-fw"></i>بازدید های این هفته از سایت
                            <span class="pull-left text-muted small"><em>{{$statistics['toweek']}}</em></span>
                        </a>
                        <a class="list-group-item">
                            <i class="fa fa-upload fa-fw"></i>دانلود های این هفته
                            <span class="pull-left text-muted small"><em>{{$statistics['download']['toweek']}}</em></span>
                        </a>
                        <a class="list-group-item">
                            <i class="fa fa-bolt fa-fw"></i>اپلود های این هفته
                            <span class="pull-left text-muted small"><em>{{$statistics['upload']['toweek']}}</em></span>
                        </a>
                        <a class="list-group-item">
                            <i class="fa fa-tasks fa-fw"></i>بازدید های این ماه از سایت
                            <span class="pull-left text-muted small"><em>{{$statistics['tomonth']}}</em></span>
                        </a>
                        <a class="list-group-item">
                            <i class="fa fa-upload fa-fw"></i>دانلود های این ماه
                            <span class="pull-left text-muted small"><em>{{$statistics['download']['tomonth']}}</em></span>
                        </a>
                        <a class="list-group-item">
                            <i class="fa fa-bolt fa-fw"></i>اپلود های این ماه
                            <span class="pull-left text-muted small"><em>{{$statistics['upload']['tomonth']}}</em></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
