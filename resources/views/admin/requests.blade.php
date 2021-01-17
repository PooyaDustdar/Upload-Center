@extends('admin.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">درخواست ها</h1>
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
                                <th>موضوع</th>
                                <th>نام کاربری</th>
                                <th>ایمیل</th>
                                <th>اولویت</th>
                                <th>خواندن</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($data as $val )
                                <tr>
                                    <th>{{$val->subject}}</th>
                                    <th>{{$val->User->name}}</th>
                                    <th>{{$val->User->email}}</th>
                                    <th>{{$val->level}}</th>
                                    <td>
                                        <a href="{{url('/requests/' . $val->id) }}"><code>نمایش</code></a>
                                    </td>
                                    <td>
                                        <form method="post" action="{{url('/requests/'.$val->id)}}">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
                                            <button type="submit"
                                                    style="border: none;background: none; padding: inherit;">
                                                <code>حذف</code>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a class="animated btn btn-success" href="{{url("requests/create")}}">ارسال درخواست جدید</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection