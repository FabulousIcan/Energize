<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>{{ config('app.name', 'YuServe') }} - @yield('title')</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<meta name="description" content="YuServe acts as a central point for users to receive assistance on various issues within the organization. It is a service desk application built for Yudala - The largest online and offline retail chain in Nigeria" />
	<meta name="author" content="Ikeanyi Chiamaka A. N. - ICAN" />
	@yield('refresh')
	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="/assets/css/bootstrap.css" />
	<link rel="stylesheet" href="/components/font-awesome/css/font-awesome.css" />

	<!-- page specific plugin styles -->
	@yield('pagespecificpluginstyles')

	<!-- text fonts -->
	<link rel="stylesheet" href="/assets/css/ace-fonts.css" />


	<!-- ace styles -->
	<link rel="stylesheet" href="/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

	<!--[if lte IE 9]>
		<link rel="stylesheet" href="/assets/css/ace-part2.css" class="ace-main-stylesheet" />
	<![endif]-->
	<link rel="stylesheet" href="/assets/css/ace-skins.css" />
	<link rel="stylesheet" href="/assets/css/ace-rtl.css" />

	<link rel="stylesheet" href="/css/yuserve.css" />
	<link rel="shortcut icon" type="image/x-icon" href="/img/favicon.png" />

	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css" /> -->
	
	<!--[if lte IE 9]>
	  <link rel="stylesheet" href="/assets/css/ace-ie.css" />
	<![endif]-->

	<!-- inline styles related to this page -->

	<!-- ace settings handler -->


	<script src="/assets/js/ace-extra.js"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

	<noscript>Sorry, your browser does not support JavaScript!</noscript>

	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

	<!--[if lte IE 8]>
	<script src="/components/html5shiv/dist/html5shiv.min.js"></script>
	<script src="/components/respond/dest/respond.min.js"></script>
	<![endif]-->
</head>


<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="#" class="navbar-brand">
						<small>
							<i class="fa fa-sitemap"></i>
							YuServe 
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->

					<!-- /section:basics/navbar.toggle -->

				</div>

				<!-- #section:basics/navbar.dropdown -->
					<?php
				 	$assignedemail = session('email');      
       				$admin_dept = session('admin_dept');


            		$count_high = App\Newrequest::where('priority', 'high')->where('status', '!=', 'Resolved')->where('employee_assigned_to', $assignedemail)->orWhere('assign_to', $admin_dept)->where('priority', 'high')->where('status', '!=', 'Resolved')->count();
            		$show_high = App\Newrequest::where('priority', 'high')->where('status', '!=', 'Resolved')->where('employee_assigned_to', $assignedemail)->orWhere('assign_to', $admin_dept)->where('priority', 'high')->where('status', '!=', 'Resolved')->orderBy("created_at","desc")->take(3)->get();
            	?>


				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
                    
						<li class="purple dropdown-modal">
							<a href="{{url('/help')}}">
								<i class="ace-icon fa fa-question-circle"></i>
							</a>
						</li>
						
						<li class="purple dropdown-modal">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-important">{{$count_high}}</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									Latest Requests with High Priority
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
									 
										@foreach($show_high as $highpriority)
										<?php $subject = $highpriority->subject;
											  $sub_string = substr($subject,0,25); 
										?>
									 	<li>
											<a href="#">
												<span class="pink"><b> {{$highpriority->emp_name}} </b></span> : {{$sub_string}} ...
												<br/>
												<div class="pull-right"><i class="fa fa-calendar"></i> 
												{{date("M d", strtotime($highpriority->created_at))}}</div>
											</a>
										</li>
										@endforeach	
											
									</ul>
								</li>

								<li class="dropdown-footer">
									<a class="request_dropdown_link" href="{{url('/requests')}}">
										<div class="yucolor"> See all requests 
											<i class="ace-icon fa fa-arrow-right"></i>
										</div>
									</a>
								</li>
							</ul>
							
						</li>

						<!-- #section:basics/navbar.user_menu -->
						<li class="dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="/assets/avatars/user.jpg" alt="User's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo session('name'); ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								
								<li>
									<a href="{{url('/about')}}">
										<i class="ace-icon fa fa-cogs"></i>
										About
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="{{url('/logout')}}"  onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"">
										<i class="ace-icon fa fa-power-off"></i>
										Logout 
									</a>
									<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<ul class="nav nav-list">


					<li class="active">
						<a href="{{url('/')}}">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>


					<li class="">
						<a href="{{url('/new/request')}}">
							<i class="menu-icon fa fa-plus"></i>
							<span class="menu-text"> New Request </span>
						</a>


						<b class="arrow"></b>						
					</li>
					
					<li class="">
						<a href="{{url('/change/request')}}">
							<i class="menu-icon fa fa-recycle"></i>
							<span class="menu-text"> Change Request </span>
						</a>


						<b class="arrow"></b>						
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-tasks"></i>
							<span class="menu-text">
								Requests
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu" style="font-size: 13px;">
							<li class="">
								<a href="{{url('/requests')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									All Requests
								</a>

								<b class="arrow"></b>
							</li>



							<li class="">
								<a href="{{url('/open/requests')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Open
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{url('/processing/requests')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									In Progress
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{url('/escalated/requests')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Escalated
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{url('/awaiting/confirmation')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Awaiting Confirmation
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{url('/resolved/requests')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Resolved
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>

					
					<li class="">
						<a href="{{url('/assigned/requests')}}">
							<i class="menu-icon fa fa-puzzle-piece"></i>
							<span class="menu-text"> Assigned to Me </span>
						</a>
						
					</li>

					
					@if(session('admin_email'))
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-group"></i>
							<span class="menu-text">
								Team Requests
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu" style="font-size: 13px;">
							<li class="">
								<a href="{{url('/team/assigned')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Assigned 
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{url('/team/escalated')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Escalated 
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
					@endif

					@if(session('admin_email') && session('admin_role') == 1)
					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-suitcase"></i>
							<span class="menu-text">
								Administration
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>


						<ul class="submenu" style="font-size: 13px;">

							<li class="">
								<a href="{{url('/view/administrators')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Administrators 
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="{{url('/admin')}}">
									<i class="menu-icon fa fa-caret-right"></i>
									Add New Category
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
						@endif



						<li class="">
							<a href="{{url('/team/assigned')}}">
								<i class="menu-icon fa fa-list"></i>
								<span class="menu-text"> Manage Requests </span>
							</a>

							<b class="arrow"></b>								
						</li>

					</li>


					
					<!-- #section:basics/sidebar.layout.minimize -->
					<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
						<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
					</div>

					<!-- /section:basics/sidebar.layout.minimize -->
							
				</ul><!-- /.nav-list -->

				
			</div>


			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							@yield('topbreadcrumb')
							@yield('subbreadcrumb')
						</ul><!-- /.breadcrumb -->

					</div>


					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<!-- #section:settings.box -->
						<div class="ace-settings-container hidden-480" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div>
									<span class="layout_options">Layout Personalization</span>
									<div class="hr hr-18 dotted"></div>
								</div>

								<div class="pull-left width-50">

									<!-- #section:settings.container -->
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Compact Board
										</label>
									</div>


									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<!-- /section:settings.container -->
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">

									<!-- #section:settings.container -->
									<!-- <div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div> -->

									<!-- /section:settings.container -->
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
								
						</div><!-- /.ace-settings-container -->


						<!-- /section:settings.box -->
						<div class="page-header">
						
							<h1>
								
								@yield('pageheader')
								@yield('subheading')
							
								@yield('breadcrumb')
								
							</h1>
						</div><!-- /.page-header -->


						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								@yield('content')



								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->



<div class="footer">
	<div class="footer-inner">
		<!-- #section:basics/footer -->
		<div class="footer-content">
			<span class="bigger-120">
				<span class="yucolor bolder">YuServe</span>
				 &copy; <?php echo date('Y'); ?>
			</span>
		</div>

		<!-- /section:basics/footer -->
	</div>
</div>


<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="/components/jquery/dist/jquery.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="/components/jquery.1x/dist/jquery.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='/components/_mod/jquery.mobile.custom/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="/components/bootstrap/dist/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->
		@yield('pagespecificpluginscripts')
		<!-- /page specific plugin scripts -->

		<!-- inline scripts related to this page -->
		@yield('inlinescriptsrelatedtothispage')
		<!-- /inline scripts related to this page -->

		
		<script src="/components/_mod/jquery-ui.custom/jquery-ui.custom.js"></script>
		<script src="/components/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="/components/_mod/easypiechart/jquery.easypiechart.js"></script>
		<script src="/components/jquery.sparkline/index.js"></script>
		<script src="/components/Flot/jquery.flot.js"></script>
		<script src="/components/Flot/jquery.flot.pie.js"></script>
		<script src="/components/Flot/jquery.flot.resize.js"></script>

				<!--[if lte IE 8]>
		  <script src="/components/ExplorerCanvas/excanvas.js"></script>
		<![endif]-->
		<script src="/components/_mod/jquery-ui.custom/jquery-ui.custom.js"></script>
		<script src="/components/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="/components/chosen/chosen.jquery.js"></script>
		<script src="/components/fuelux/js/spinbox.js"></script>
		<!-- <script src="/components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>
		<script src="/components/bootstrap-timepicker/js/bootstrap-timepicker.js"></script> -->
		<script src="/components/moment/moment.js"></script>
		<!-- <script src="/components/bootstrap-daterangepicker/daterangepicker.js"></script>
		<script src="/components/eonasdan-bootstrap-datetimepicker/src/js/bootstrap-datetimepicker.js"></script>
		<script src="/components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js"></script> -->
		<script src="/components/jquery-knob/js/jquery.knob.js"></script>
		<script src="/components/autosize/dist/autosize.js"></script>
		<script src="/components/jquery-inputlimiter/jquery.inputlimiter.js"></script>
		<script src="/components/jquery.maskedinput/dist/jquery.maskedinput.js"></script>
		<script src="/components/_mod/bootstrap-tag/bootstrap-tag.js"></script>

		<!-- ace scripts -->
		<script src="/assets/js/src/elements.scroller.js"></script>
		<!-- <script src="/assets/js/src/elements.colorpicker.js"></script> -->
		<script src="/assets/js/src/elements.fileinput.js"></script>
		<script src="/assets/js/src/elements.typeahead.js"></script>
		<!-- <script src="/assets/js/src/elements.wysiwyg.js"></script> -->
		<script src="/assets/js/src/elements.spinner.js"></script>
		<script src="/assets/js/src/elements.treeview.js"></script>
		<script src="/assets/js/src/elements.wizard.js"></script>
		<script src="/assets/js/src/elements.aside.js"></script>
		<script src="/assets/js/src/ace.js"></script>
		<script src="/assets/js/src/ace.basics.js"></script>
		<script src="/assets/js/src/ace.scrolltop.js"></script>
		<script src="/assets/js/src/ace.ajax-content.js"></script>
		<script src="/assets/js/src/ace.touch-drag.js"></script>
		<script src="/assets/js/src/ace.sidebar.js"></script>
		<script src="/assets/js/src/ace.sidebar-scroll-1.js"></script>
		<script src="/assets/js/src/ace.submenu-hover.js"></script>
		<script src="/assets/js/src/ace.widget-box.js"></script>
		<script src="/assets/js/src/ace.settings.js"></script>
		<script src="/assets/js/src/ace.settings-rtl.js"></script>
		<script src="/assets/js/src/ace.settings-skin.js"></script>
		<script src="/assets/js/src/ace.widget-on-reload.js"></script>
		<script src="/assets/js/src/ace.searchbox-autocomplete.js"></script>

		<!-- inline scripts related to this page -->

		<!-- the following scripts are used in demo only for onpage help and you don't need them -->
		<!-- <link rel="stylesheet" href="/assets/css/ace.onpage-help.css" />
		<link rel="stylesheet" href="/assets/js/themes/sunburst.css" />

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="/assets/js/src/elements.onpage-help.js"></script>
		<script src="/assets/js/src/ace.onpage-help.js"></script>
		<script src="/assets/js/rainbow.js"></script>
		<script src="/assets/js/language/generic.js"></script>
		<script src="/assets/js/language/html.js"></script>
		<script src="/assets/js/language/css.js"></script>
		<script src="/assets/js/language/javascript.js"></script> -->
	</body>
</html>
