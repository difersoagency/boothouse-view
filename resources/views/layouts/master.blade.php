<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boothouse</title>
    <meta name="description"
        content="A modern CRM Dashboard Template with reusable and flexible components for your SaaS web applications by hencework. Based on Bootstrap." />

    <!-- Favicon -->
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="icon" href="{{ asset('assets/admin/dist/js/favicon.ico') }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Daterangepicker CSS -->
    <link href="{{ asset('assets/admin/vendor/daterangepicker/daterangepicker.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Data Table CSS -->
    <link href="{{ asset('assets/admin/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/admin/vendor/datatables.net-responsive-\bs5/css/responsive.bootstrap5.min.css') }}"
        rel="stylesheet" type="text/css" />

    <!-- CSS -->
    <link href="{{ asset('assets/admin/dist/css/style.css') }}" rel="stylesheet" type="text/css">
    @yield('custom_css')
</head>

<body>
    <!-- Wrapper -->
    <div class="hk-wrapper" data-layout="vertical" data-layout-style="default" data-menu="light" data-footer="simple">
        <!-- Top Navbar -->
        <nav class="hk-navbar navbar navbar-expand-xl navbar-light fixed-top">
			<div class="container-fluid">
			<!-- Start Nav -->
			<div class="nav-start-wrap">
				<button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle d-xl-none"><span class="icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span></button>
					
				<!-- Search -->
				<form class="dropdown navbar-search">
					<div class="dropdown-toggle no-caret" data-bs-toggle="dropdown" data-dropdown-animation data-bs-auto-close="outside">
						<a href="#" class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover  d-xl-none"><span class="icon"><span class="feather-icon"><i data-feather="search"></i></span></span></a>
						<div class="input-group d-xl-flex d-none">
							<span class="input-affix-wrapper input-search affix-border">
								<input type="text" class="form-control  bg-transparent"  data-navbar-search-close="false" placeholder="Search..." aria-label="Search">
								<span class="input-suffix"><span>/</span>
									<span class="btn-input-clear"><i class="bi bi-x-circle-fill"></i></span>
									<span class="spinner-border spinner-border-sm input-loader text-primary" role="status">
										<span class="sr-only">Loading...</span>
									</span>
								</span>
							</span>
						</div>
					</div>
					<div  class="dropdown-menu p-0">
						<!-- Mobile Search -->
						<div class="dropdown-item d-xl-none bg-transparent">
							<div class="input-group mobile-search">
								<span class="input-affix-wrapper input-search">
									<input type="text" class="form-control" placeholder="Search..." aria-label="Search">
									<span class="input-suffix">
										<span class="btn-input-clear"><i class="bi bi-x-circle-fill"></i></span>
										<span class="spinner-border spinner-border-sm input-loader text-primary" role="status">
											<span class="sr-only">Loading...</span>
										</span>
									</span>
								</span>
							</div>
						</div>
						<!--/ Mobile Search -->
						<div data-simplebar class="dropdown-body p-2">
							<h6 class="dropdown-header">Recent Search
							</h6>
							<div class="dropdown-item bg-transparent">
								<a href="#" class="badge badge-pill badge-soft-secondary">Grunt</a>
								<a href="#" class="badge badge-pill badge-soft-secondary">Node JS</a>
								<a href="#" class="badge badge-pill badge-soft-secondary">SCSS</a>
							</div>
							<div class="dropdown-divider"></div>
							<h6 class="dropdown-header">Help
							</h6>
							<a href="javascript:void(0);" class="dropdown-item">
								<div class="media align-items-center">
									<div class="media-head me-2">
										<div class="avatar avatar-icon avatar-xs avatar-soft-light avatar-rounded">
											<span class="initial-wrap">
												<span class="svg-icon">
													<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-corner-down-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
														<path d="M6 6v6a3 3 0 0 0 3 3h10l-4 -4m0 8l4 -4"></path>
													 </svg>
												</span>
											</span>
										</div>
									</div>
									<div class="media-body">
										How to setup theme?
									</div>
								</div>
							</a>
							<a href="javascript:void(0);" class="dropdown-item">
								<div class="media align-items-center">
									<div class="media-head me-2">
										<div class="avatar avatar-icon avatar-xs avatar-soft-light avatar-rounded">
											<span class="initial-wrap">
												<span class="svg-icon">
													<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-corner-down-right" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
														<path d="M6 6v6a3 3 0 0 0 3 3h10l-4 -4m0 8l4 -4"></path>
													 </svg>
												</span>
											</span>
										</div>
									</div>
									<div class="media-body">
										View detail documentation
									</div>
								</div>
							</a>
							<div class="dropdown-divider"></div>
							<h6 class="dropdown-header">Users
							</h6>
							<a href="javascript:void(0);" class="dropdown-item">
								<div class="media align-items-center">
									<div class="media-head me-2">
										<div class="avatar avatar-xs avatar-rounded">
											<img src="dist/img/avatar3.jpg" alt="user" class="avatar-img">
										</div>
									</div>
									<div class="media-body">
										Sarah Jone
									</div>
								</div>
							</a>
							<a href="javascript:void(0);" class="dropdown-item">
								<div class="media align-items-center">
									<div class="media-head me-2">
										<div class="avatar avatar-xs avatar-soft-primary avatar-rounded">
											<span class="initial-wrap">J</span>
										</div>
									</div>
									<div class="media-body">
										Joe Jackson
									</div>
								</div>
							</a>
							<a href="javascript:void(0);" class="dropdown-item">
								<div class="media align-items-center">
									<div class="media-head me-2">
										<div class="avatar avatar-xs avatar-rounded">
											<img src="dist/img/avatar4.jpg" alt="user" class="avatar-img">
										</div>
									</div>
									<div class="media-body">
										Maria Richard
									</div>
								</div>
							</a>
						</div>
						<div class="dropdown-footer d-xl-flex d-none"><a href="#"><u>Search all</u></a></div>
					</div>
				</form>
				<!-- /Search -->
			</div>
			<!-- /Start Nav -->
			
			<!-- End Nav -->
			<!-- /End Nav -->
			</div>									
		</nav>
        <!-- /Top Navbar -->

        <!-- Vertical Nav -->
        <div class="hk-menu">
            <!-- Brand -->
            @include('layouts.partials.logo')

            <!-- /Brand -->

            <!-- Main Menu -->
            @include('layouts.partials.sidebar')
            <!-- /Main Menu -->
        </div>
        <div id="hk_menu_backdrop" class="hk-menu-backdrop"></div>
        <!-- /Vertical Nav -->

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <div class="container-xxl">
                <!-- Page Header -->
                @yield('content_header')

                <!-- /Page Header -->
                @yield('body')
                <!-- Page Body -->

                <!-- /Page Body -->
            </div>

            <!-- Page Footer -->
            @include('layouts.partials.footer')

            <!-- / Page Footer -->

        </div>
        <!-- /Main Content -->
    </div>
    <!-- /Wrapper -->

    <!-- jQuery -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js" type="text/javascript"></script>
    <!-- <script src="{{ asset('assets/admin/vendor/jquery/dist/jquery.min.js') }}"></script> -->

    <!-- Bootstrap Core JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script> -->
    <!-- <script src="{{ asset('assets/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script> -->

    <!-- FeatherIcons JS -->
    <script src="{{ asset('assets/admin/dist/js/feather.min.js') }}"></script>

    <!-- Fancy Dropdown JS -->
    <script src="{{ asset('assets/admin/dist/js/dropdown-bootstrap-extended.js') }}"></script>

    <!-- Simplebar JS -->
    <script src="{{ asset('assets/admin/vendor/simplebar/dist/simplebar.min.js') }}"></script>

    <!-- Data Table JS -->
    <script src="{{ asset('assets/admin/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>

    <!-- Daterangepicker JS -->
    <script src="{{ asset('assets/admin/vendor/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/admin/dist/js/daterangepicker-data.js') }}"></script>

    <!-- Amcharts Maps JS -->
    <script src="{{ asset('assets/admin/vendor/@amcharts/amcharts4/core.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/@amcharts/amcharts4/maps.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/@amcharts/amcharts4-geodata/worldLow.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/@amcharts/amcharts4-geodata/worldHigh.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/@amcharts/amcharts4/themes/animated.js') }}"></script>

    <!-- Apex JS -->
    <script src="{{ asset('assets/admin/vendor/apexcharts/dist/apexcharts.min.js') }}"></script>

    <!-- Init JS -->
    <script src="{{ asset('assets/admin/dist/js/init.js') }}"></script>
    <script src="{{ asset('assets/admin/dist/js/chips-init.js') }}"></script>
    <script src="{{ asset('assets/admin/dist/js/dashboard-data.js') }}"></script>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-bJIjYUlD5RrvI9Er"></script>

    @yield('custom_js')
</body>

</html>
