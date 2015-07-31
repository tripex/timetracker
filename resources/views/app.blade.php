<!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
    <html>
    <head>
        <meta charset="UTF-8">
        <title>WorkNicer.dk - @yield('title','Vi giver dig overblik')</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('/css/datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <link href="{{ asset('/css/datetimepicker/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
        <![endif]-->
    </head>
    <body class="skin-blue">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="dashboard" class="logo" title="Go to dashboard"><b>Work</b>Nicer</a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">@if(Auth::user()){{ Auth::user()->firstname ." ". Auth::user()->lastname}}@endif</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                      <a href="{{ url('user/'.Auth::id().'/edit') }}" class="btn btn-default btn-flat">Edit profile</a>
                                    </div>
                                    <div class="pull-right">
                                      <a href="{{ url('/auth/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar Menu -->
                <ul class="sidebar-menu">
                    <!-- Optionally, you can add icons to the links -->
                    @if(Auth::user())
                        @if (Auth::user()->user_type == "superadmin")
                            <li><a href="{{ url('/users') }}">Users</a></li>
                            <li><a href="{{ url('/user/create') }}">Add user</a></li>
                            <hr/>
                        @endif
                            <li><a href="{{ url('/worklog') }}">Worklog</a></li>
                            <li><a href="{{ url('/worklog/create') }}">Add work</a></li>
                            <hr/>
                            <li><a href="{{ url('/clients') }}">Clients</a></li>
                            <li><a href="{{ url('/client/create') }}">Add client</a></li>
                    @endif
                </ul><!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    @yield('header')
                    <small>@yield('sub_header')</small>
                </h1>
                <!--<ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                    <li class="active">Here</li>
                </ol>-->
            </section>

            <!-- Main content -->
            <section class="content">
                @yield('content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright © 2015 <a href="#">WorkNicer.dk</a>.</strong> All rights reserved.
        </footer>

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.3 -->
    <script src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset ("/bower_components/admin-lte/dist/js/app.min.js") }}" type="text/javascript"></script>

    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience -->
    <script src="{{ asset('/js/datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript">
        $('.datetimepicker').datetimepicker({
            format: 'dd/mm/yyyy hh:ii',
            autoclose: 'true',
            linked: 'true',
            language: 'dk',
            minuteStep: 15,
            fontAwesome: 'true',
        });
    </script>

    @yield('footer')
    </body>
</html>