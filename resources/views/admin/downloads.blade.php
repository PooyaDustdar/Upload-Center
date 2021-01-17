@extends('admin.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">دانلود ها</h1>
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
                                <th>نام فایل</th>
                                <th>IP</th>
                                <th>token</th>
                                <th>تاریخ ساخت</th>
                                <th>انقضا</th>
                                <th>حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($links as $val)
                                <tr>
                                    <th>{{$val->File->name}}</th>
                                    <td class="text-muted">{{$val->ip}}</td>
                                    <td>{{$val->token}}</td>
                                    <td>{{$val->created_at}}</td>
                                    <td>2 روز بعد از ساخت لینک</td>
                                    <td>
                                        <form method="post" action="{{url('/downloads/'.$val->id)}}">
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