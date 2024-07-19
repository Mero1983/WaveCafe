<!DOCTYPE html>
<html lang="en">
  <head>
@include('dashincludes.head')
</head>

<body class="nav-md">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="index.html" class="site_title"><i class="fa fa-graduation-cap"></i> <span>Beverages Admin</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- menu profile quick info -->
					@include('dashincludes.menuProfile')
					<!-- /menu profile quick info -->

					<br />

					<!-- sidebar menu -->
				@include('dashincludes.sideBar')
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					@include('dashincludes.menuFooter')
					<!-- /menu footer buttons -->
				</div>
			</div>

			<!-- top navigation -->
			@include('dashincludes.topNavigation')
			<!-- /top navigation -->

			<!-- page content -->
			@yield('content')
			<!-- /page content -->

			<!-- footer content -->
			@include('dashincludes.footer')

			<!-- /footer content -->
		</div>
	</div>

	<!-- jQuery -->
@include('dashincludes.jQuery')

</body>
</html>
