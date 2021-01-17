<!DOCTYPE html>
<html lang="en" style="overflow-x: hidden;">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>SB Admin 2 - Bootstrap Admin Theme</title>
    <link href="/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/vendor/bootstrap/css/bootstrap.rtl.css" rel="stylesheet">
    <link href="/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="/vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/admin')}}">پنل ادمین</a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="{{ url('/logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout').submit();">Logout</a></li>
                    <form id="logout" method="post" action="{{ url('/logout') }}">{{csrf_field()}}</form>
                </ul>
            </li>
        </ul>
        @if(Auth::user()->type == "admin" )
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{url('/home')}}"><i class="fa fa-dashboard fa-fw"></i> داشبورد</a>
                        </li>
                        <li>
                            <a href="{{url('/files')}}"><i class="fa fa-files-o fa-fw"></i> فایل ها</a>
                        </li>
                        <li>
                            <a href="{{url('/users')}}"><i class="fa fa-user fa-fw"></i> کاربران</a>
                        </li>
                        <li>
                            <a href="{{url('/requests')}}"><i class="fa fa-file fa-fw"></i> درخواست ها</a>
                        </li>
                    </ul>
                </div>
            </div>
        @elseif(Auth::user()->type == "user" )
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{url('/home')}}"><i class="fa fa-dashboard fa-fw"></i> داشبورد</a>
                        </li>
                        <li>
                            <a href="{{url('/files')}}"><i class="fa fa-files-o fa-fw"></i> فایل ها</a>
                        </li>
                        <li>
                            <a href="{{url('/downloads')}}"><i class="fa fa-user fa-fw"></i> دانلود ها</a>
                        </li>
                        <li>
                            <a href="{{url('/requests')}}"><i class="fa fa-file fa-fw"></i> درخواست ها</a>
                        </li>
                    </ul>
                </div>
            </div>
        @endif
    </nav>
    <div id="page-wrapper">
        @yield('content')
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.js"></script>
<script>
    Dropzone.autoDiscover = false;
    var md = new Dropzone(".dropzone", {
        url: "{{ url('/upload')}}",
        paramName: "file"
    });
    md.on("complete", function (file) {
        if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
//            location.reload();
        }
    });
</script>
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/vendor/metisMenu/metisMenu.min.js"></script>
<script src="/vendor/raphael/raphael.min.js"></script>
<script src="/vendor/morrisjs/morris.min.js"></script>
<script src="/data/morris-data.js"></script>
<script src="/dist/js/sb-admin-2.js"></script>
<script src="/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="/vendor/datatables-responsive/dataTables.responsive.js"></script></body>
</html>
