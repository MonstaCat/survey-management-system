<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 ps bg-white" id="sidenav-main">
	<div class="sidenav-header">
		<i class="fas fa-times p-3 cursor-pointer text-dark opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
		<a class="navbar-brand m-0" href="{{ route('home') }}" target="_blank">
			<img src="{{ asset('material-dashboard/assets/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
			<span class="ms-1 font-weight-bold text-dark">Smart Quality Mapping</span>
		</a>
	</div>
	<hr class="horizontal light mt-0 mb-2">
	<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="{{ isRouteActive('home') ? 'active bg-gradient-warning' : '' }} nav-link text-dark" href="{{ route('home') }}">
					<div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
						<i class="material-icons opacity-10">home</i>
					</div>
					<span class="nav-link-text ms-1">Home</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="{{ isRouteActive('survey') ? 'active bg-gradient-warning' : '' }} nav-link text-dark " href="{{ route('survey') }}">
					<div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
						<i class="material-icons opacity-10">table_view</i>
					</div>
					<span class="nav-link-text ms-1">Survey</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-dark " href="{{ asset('material-dashboard/pages/billing.html') }}">
					<div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
						<i class="material-icons opacity-10">receipt_long</i>
					</div>
					<span class="nav-link-text ms-1">report</span>
				</a>
			</li>
			<!-- <li class="nav-item">
				<a class="nav-link text-dark " href="{{ asset('material-dashboard/pages/virtual-reality.html') }}">
					<div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
						<i class="material-icons opacity-10">view_in_ar</i>
					</div>
					<span class="nav-link-text ms-1">Virtual Reality</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-dark " href="{{ asset('material-dashboard/pages/rtl.html') }}">
					<div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
						<i class="material-icons opacity-10">format_textdirection_r_to_l</i>
					</div>
					<span class="nav-link-text ms-1">RTL</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-dark " href="{{ asset('material-dashboard/pages/notifications.html') }}">
					<div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
						<i class="material-icons opacity-10">notifications</i>
					</div>
					<span class="nav-link-text ms-1">Notifications</span>
				</a>
			</li> -->
			<li class="nav-item mt-3">
				<h6 class="ps-4 ms-2 text-uppercase text-xs text-dark font-weight-bolder opacity-8">Account pages</h6>
			</li>
			<li class="nav-item">
				<a class="{{ isRouteActive('profile') ? 'active bg-gradient-warning' : '' }} nav-link text-dark " href="{{ route('profile') }}">
					<div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
						<i class="material-icons opacity-10">person</i>
					</div>
					<span class="nav-link-text ms-1">Profile</span>
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link text-dark " action="{{ route('logout') }}">
					<div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
						<i class="material-icons opacity-10">logout</i>
					</div>
					<span class="nav-link-text ms-1">Log Out</span>
				</a>
			</li>
			<!-- <li class="nav-item">
				<a class="nav-link text-dark " href="{{ asset('material-dashboard/pages/sign-up.html') }}">
					<div class="text-dark text-center me-2 d-flex align-items-center justify-content-center">
						<i class="material-icons opacity-10">assignment</i>
					</div>
					<span class="nav-link-text ms-1">Sign Up</span>
				</a>
			</li> -->
		</ul>
	</div>
	<!-- <div class="sidenav-footer position-absolute w-100 bottom-0 ">
		<div class="mx-3">
			<a class="btn btn-outline-primary mt-4 w-100" href="https://www.creative-tim.com/learning-lab/bootstrap/overview/material-dashboard?ref=sidebarfree" type="button">Documentation</a>
			<a class="btn bg-gradient-primary w-100" href="https://www.creative-tim.com/product/material-dashboard-pro?ref=sidebarfree" type="button">Upgrade to pro</a>
		</div>
	</div> -->
</aside>