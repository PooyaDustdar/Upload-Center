@extends('admin.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">فایل ها</h1>
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
                                <th>نوع فایل</th>
                                <th>حجم</th>
                                <th>حذف فایل</th>
                                <th>دانلود</th>
                            </tr>
                            </thead>
                            <tbody>
			
                            @foreach($files as  $key=>$val)
                                <tr>
                                    <th>{{$val["name"]}}</th>
                                    <td class="text-muted"><i class="fa {{$val["mime_type"]}} fa-fw"></i></td>
                                    <td class="text-muted">{{$val["size"]}}</td>
                                    <td>
                                        <form method="post" action="{{url('files/'.$val["id"])}}">
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
                                    <td>
                                        <a href="{{url('/download/' . $val["id"]) }}"><code>Download</code></a>
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
