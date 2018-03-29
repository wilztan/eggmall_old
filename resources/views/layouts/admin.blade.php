@if(Auth::check())
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/fonts/fa/css/font-awesome.min.css') }}">
    @yield('header')

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    EGGMALL
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/') }}">Shop Now</a></li>
                                <li><a href="{{action('TransactionController@index')}}">Cart</a></li>
                                <li><a href="{{ url('/admin/setting') }}">Settings</a></li>
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ url('/home') }}">Dashboard</a></li>
                    @endif
                    <li class="disabled"><a href="" >Blog</a></li>
                    <li><a href="">custommer Service +6285754557777</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="start">

        <nav class="navbar navbar-inverse sidebar" role="navigation">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    {{-- <a class="navbar-brand disabled sidebar-brand" href="#">EggMall</a> --}}
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{ url('home') }}">Home<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-home"></span></a></li>
                        <li ><a href="{{action('ItemController@create')}}">Sell New Item<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-send"></span></a></li>
                        <li ><a href="{{action('ItemController@index')}}">Item To Sell<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-handshake-o"></span></a></li>
                        <li ><a href="{{action('TransactionController@index')}}">View Order<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-bar-chart"></span></a></li>
                        <li ><a href="{{ route('home') }}">Shop Now<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-shopping-cart"></span></a></li>
                        <li ><a href="{{action('OtherController@showTransaction')}}">View Transaction<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-money"></span></a></li>
                        <li ><a href="{{action('OtherController@showHistory')}}">View History<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-history"></span></a></li>
                        <li ><a href="{{ url('/admin/setting') }}">Settings<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-gear"></span></a></li>
                        @if(Auth::User()->role == 'admin')
                        <li ><a href="{{ action('OtherController@download') }}">Download Mock UP<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-gear"></span></a></li>
                        <li ><a href="{{ action('OtherController@webdownload') }}">Download Web<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-gear"></span></a></li>
                        @endif
                        <li ><a href="href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout<span style="font-size:16px;" class="pull-right hidden-xs showopacity fa fa-sign-out"></span></a></li>
                        
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div class="container">
        <div class="row">
            
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

<footer>
  copyright to asdasdasd 20{{date("y")}}
</footer>

    <!-- Scripts -->
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="{{ route('home') }}/public/js/app.js"></script>
    <script type="text/javascript">
        function htmlbodyHeightUpdate(){
            var height3 = $( window ).height()
            var height1 = $('.nav').height()+50
            height2 = $('.main').height()
            if(height2 > height3){
                $('html').height(Math.max(height1,height3,height2)+10);
                $('body').height(Math.max(height1,height3,height2)+10);
            }
            else
            {
                $('html').height(Math.max(height1,height3,height2));
                $('body').height(Math.max(height1,height3,height2));
            }
            
        }
        $(document).ready(function () {
            htmlbodyHeightUpdate()
            $( window ).resize(function() {
                htmlbodyHeightUpdate()
            });
            $( window ).scroll(function() {
                height2 = $('.main').height()
                htmlbodyHeightUpdate()
            });
        });
    </script>
    @yield('footer')
</body>
</html>
@endif
