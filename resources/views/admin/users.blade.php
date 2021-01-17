@extends('admin.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">کاربران</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>نام کاربری</th>
                                <th>ایمیل</th>
                                <th>حجم استفاده شده</th>
                                <th>حجم مانده</th>
                                <th>فضای کاربر</th>
                                <th>فایل های کاربر</th>
                                <th>ویرایش کاربر</th>
                                <th>حذف کاربر</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $val )

                                <tr @if($val->used_size>=$val->size) style="background-color: #f2dede;" @endif>
                                    <th>{{$val->name}}</th>
                                    <td class="text-muted">{{$val->email}}</td>
                                    <td class="text-muted">{{explode(".",$val->used_size / 1024)[0]}} MB</td>
                                    <td class="text-muted">{{explode(".",($val->size - $val->used_size )/ 1024)[0]}}
                                        MB
                                    </td>
                                    <td class="text-muted">{{explode(".",$val->size / 1024)[0]}} MB</td>
                                    <td>
                                        <a href="{{url('/users/' . $val->id) }}"><code>view Files</code></a>
                                    </td>
                                    <td>
                                        <a href="{{url('/users/' . $val->id.'/edit') }}"><code>edite</code></a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{url('/users/'.$val->id)}}">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
                                            <button type="submit"
                                                    style="border: none;background: none; padding: inherit;">
                                                <code>
                                                    Delete
                                                </code>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection