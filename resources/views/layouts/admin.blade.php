<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/libs.css')}}" rel="stylesheet">

    {{-- <link href="{{asset('css/app.css')}}" rel="stylesheet"> --}}
    

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- CSRF Token -->
    

    

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">




</head>

<body id="admin-page">

    <div id="wrapper">

        {{-- laravel navigation  --}}
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/home') }}">
                                Home
                            </a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fa fa-user fa-fw"></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a href="" class="dropdown-item"><i class="fa fa-user fa-fw"></i> User Profile</a>
                                    <a href="" class="dropdown-item"><i class="fa fa-gear fa-fw"></i> Settings</a>
                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        {{-- ends here  --}}

        <div class="navbar collapse navbar-collapse col-md-3"  role="navigation">
       

            <ul class="nav nav-pills flex-column" id="">
        
                <li class="nav-item sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                    </div>
                    <!-- /input-group -->
                </li>
                <li class="nav-item">
                    <a href="/admin" class="nav-link"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                </li>

                <li class="nav-item">
                    <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" aria-controls="userSubmenu"><i class="fa fa-wrench fa-fw"></i>Users<span class="fa arrow"></span></a>
                    <ul class="collapse list-unstyled" id="userSubmenu">
                        <li>
                            <a href="{{route('users.index')}}">All Users</a> 
                            {{--  --}}
                        </li>

                        <li>
                            <a href="{{route('users.create')}}">Create User</a>
                            {{--  --}}
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li class="nav-item">
                    <a href="#postSubmenu" data-toggle="collapse"  aria-expanded="false" aria-controls="postSubmenu"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                    <ul class="collapse list-unstyled" id="postSubmenu">
                        <li>
                            <a href="{{route('posts.index')}}">All Posts</a>
                        </li>

                        <li>
                            <a href="{{route('posts.create')}}">Create Post</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li class="nav-item">
                    <a href="#categorySubmenu" data-toggle="collapse" class="dropdown-toggle nav-link"><i class="fa fa-wrench fa-fw"></i>Categories<span class="fa arrow"></span></a>
                    <ul class="collapse list-unstyled" id="categorySubmenu">
                        <li>
                            <a href="/categories">All Categories</a>
                        </li>

                        <li>
                            <a href="/categories/create">Create Category</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li class="nav-item">
                    <a href="#mediaSubmenu" data-toggle="collapse" class="dropdown-toggle nav-link"><i class="fa fa-wrench fa-fw"></i>Media<span class="fa arrow"></span></a>
                    <ul class="collapse list-unstyled" id="mediaSubmenu">
                        <li>
                            <a href="/media">All Media</a>
                        </li>

                        <li>
                            <a href="">Upload Media</a>
                        </li>

                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li class="nav-item">
                    <a href="#chartSubmenu" data-toggle="collapse" class="dropdown-toggle  nav-link"><i class="fa fa-bar-chart-o fa-fw"></i> Charts<span class="fa arrow"></span></a>
                    <ul class="collapse list-unstyled" id="chartSubmenu">
                        <li>
                            <a href="flot.html">Flot Charts</a>
                        </li>
                        <li>
                            <a href="morris.html">Morris.js Charts</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li class="nav-item">
                    <a href="tables.html" class=" nav-link"><i class="fa fa-table fa-fw"></i> Tables</a>
                </li>
                <li>
                    <a href="forms.html" class=" nav-link"><i class="fa fa-edit fa-fw"></i> Forms</a>
                </li>

                <li class="nav-item">
                    <a href="#elementSubmenu" data-toggle="collapse" class="dropdown-toggle  nav-link"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>
                    <ul class="collapse list-unstyled" id="elementSubmenu">
                        <li>
                            <a href="panels-wells.html">Panels and Wells</a>
                        </li>
                        <li>
                            <a href="buttons.html">Buttons</a>
                        </li>
                        <li>
                            <a href="notifications.html">Notifications</a>
                        </li>
                        <li>
                            <a href="typography.html">Typography</a>
                        </li>
                        <li>
                            <a href="icons.html"> Icons</a>
                        </li>
                        <li>
                            <a href="grid.html">Grid</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li class="nav-item">
                    <a href="#multiSubmenu" data-toggle="collapse" class="dropdown-toggle  nav-link"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>
                    <ul class="collapse list-unstyled" id="multiSubmenu">
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#">Second Level Item</a>
                        </li>
                        <li>
                            <a href="#multiTwoSubmenu" data-toggle="collapse" class="dropdown-toggle  nav-link">Third Level <span class="fa arrow"></span></a>
                            <ul class="collapse list-unstyled" id="multiTwoSubmenu">
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Item</a>
                                </li>
                            </ul>
                            <!-- /.nav-third-level -->
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

                <li class="nav-item">
                    <a href="#pagesSubmenu" data-toggle="collapse" class="dropdown-toggle  nav-link"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>
                    <ul class="collapse list-unstyled" id="pagesSubmenu">
                        <li>
                            <a class=" nav-link" href="blank.html">Blank Page</a>
                        </li>
                        <li>
                            <a href="login.html" class=" nav-link">Login Page</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

            </ul>
        </div>

        <div class="navbar" role="navigation">
            <div class="navbar navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-item">
                        <a href="/profile" class=" nav-link"><i class="fa fa-dashboard fa-fw"></i>Profile</a>
                    </li>
    
                    <li class="nav-item">
                        <a href="#personalSubmenu" data-toggle="collapse" class="dropdown-toggle nav-link"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                        <ul class="collapse list-unstyled" id="personalSubmenu">
                            <li>
                                <a href="" class=" nav-link">All Posts</a>
                            </li>
    
                            <li>
                                <a href="" class=" nav-link">Create Post</a>
                            </li>
    
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
    
    
    
    
    
                </ul>
    
            </div>
    
        </div>

    </div>

    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"></h1>
    
                   @yield('content')
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->



{{-- <script src="https://kit.fontawesome.com/b71cc94d1f.js" crossorigin="anonymous"></script> --}}

<!-- jQuery -->
<script src="{{asset('js/libs.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>


@yield('footer')





</body>

</html>
