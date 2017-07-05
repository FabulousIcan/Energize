<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Official from the stable of CcHub for Visitors Tracking">
    <meta name="keyword" content="Visitors, Building, Tracking, Tech, CCHUB, Yaba, Lagos, Codecamp, ICT">
    <meta name="author" content="CCHUB Code Camp 2016 Team 2, Jerry Okafor, Chiamaka Ikeanyi, Justin Obi, Miracle Ofodi">

    <title>Energize</title>
    <link type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('css/login.css')}}">
    <link type="image/x-icon" rel="shortcut icon" href="{{asset('img/favicon.png')}}">
    <link href="{{ asset('https://fonts.googleapis.com/css?family=Pacifico') }}" rel="stylesheet">
    <link rel="author" href="humans.txt">
</head>
<body style="background-color:#eeeeee;" class="mybody">

<nav id="mainNav" class="navbar navbar-fixed-top affix-top mynav">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <!-- <a class="navbar-brand page-scroll" href="{{url('home')}}" style="font-size:25px; font-weight:600; color:#017cc2; font-family:cambria;">
                <span class="v">Energize</span></a> -->
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right naav">
                @yield('links')
                        <!-- All the other Links shall be entered here depending on the page  -->
                <li class="">

                    @if(Auth::user())
                        <a class="page-scroll" href="{{url('/energysupplies')}}">Dashboard</a>
                    @endif
                </li>


                <li class="">
                    <a class="page-scroll" href="{{url('/about')}}" >About</a>
                </li>


                 <li class="">
                    <a class="page-scroll" href="{{url('/contact')}}">Contact</a>
                </li>             


                @if(Auth::guest())
                <li class="">
                    <a class="page-scroll" href="{{url('/register')}}" >Join the community</a>
                </li>
                @endif


                <li>

                    {{--I will check for login status and then show login/logout button--}}
                    @if(Auth::user())

                            <!-- This links the current admin to the dashboard to add other admins -->



                    <a href="{{ url('/logout') }}"
                       onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                    @endif
                </li>

            </ul>
        </div>
        <!--Bread Crumb goes here-->
    </div>
    <!-- /.container-fluid -->

</nav>

    <section id="admin-index-page">
        <div class="container">
            <div class="row myrow">
                <div class="col-sm-6">
                    <div class="safe">
                        <h1 style="font-size:25px; font-weight:600; color:#017cc2; font-family:cambria;">
                <span class="v">Energize</span></a> </h1>
                        <p>A community for smart energy users</p>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div id="loginbox" style="margin-top:50px;" class="{{--mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2--}}">
                        <div class="panel panel-info mypanel" >
                            {{--<div class="panel-heading">
                                <div class="panel-title">Log In</div>
                                <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="{{ url('/password/reset') }}">
                                        Forgot Your Password? </a></div>
                            </div>--}}

                            <div style="padding-top:30px" class="panel-body" >

                                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12">

                                </div>

                                <form id="loginform" class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">

                                    {{csrf_field()}}
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="sr-only col-md-4 control-label"></label>

                                        <div class="col-md-8">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-mail Address" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="sr-only col-md-4 control-label"></label>

                                        <div class="col-md-8">
                                            <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" id="login_btn" class="btn btn-primary">
                                                Login
                                            </button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-7 col-md-offset-5">
                                            <div class="checkbox">
                                                <span>
                                                    <input type="checkbox" name="remember" > Remember Me
                                                </span>
                                                <span class="forgot"><a href="{{ url('/password/reset') }}">Forgot password?</a></span>
                                            </div>
                                        </div>
                                    </div>

                                </form>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>






            {{--<div class="row">
                <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info" >
                        <div class="panel-heading">
                            <div class="panel-title">Log In</div>
                            <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="{{ url('/password/reset') }}">
                                    Forgot Your Password? </a></div>
                        </div>

                        <div style="padding-top:30px" class="panel-body" >

                            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12">

                            </div>

                            <form id="loginform" class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">

                                {{csrf_field()}}
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email" class="col-md-4 control-label">E-mail Address</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label for="password" class="col-md-4 control-label">Password</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control" name="password" required>

                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-4">
                                        <button type="submit" id="login_btn" class="btn btn-primary">
                                            Login
                                        </button>
                                    </div>
                                </div>

                            </form>



                        </div>
                    </div>
                </div>
            </div>--}}




        </div>
    </section>


<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>





