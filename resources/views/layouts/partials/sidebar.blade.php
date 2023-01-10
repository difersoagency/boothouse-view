<div data-simplebar class="nicescroll-bar">
				<div class="menu-content-wrap">
					<div class="menu-group">
						<ul class="navbar-nav flex-column">
							<li class="nav-item">
								<a class="nav-link" href="/admin/dashboard">
									<span class="nav-icon-wrap">
										<span class="svg-icon">
											<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-template" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
												<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
												<rect x="4" y="4" width="16" height="4" rx="1" />
												<rect x="4" y="12" width="6" height="8" rx="1" />
												<line x1="14" y1="12" x2="20" y2="12" />
												<line x1="14" y1="16" x2="20" y2="16" />
												<line x1="14" y1="20" x2="20" y2="20" />
											</svg>
										</span>
									</span>
									<span class="nav-link-text">Dashboard</span>
								</a>
							</li>
						</ul>	
					</div>
					<div class="menu-gap"></div>

					@if(Auth::user()->karyawan->Divisi->nama == 'Karyawan')
					<div class="menu-group">
						<div class="nav-header">
							<span>Master</span>
						</div>
						<ul class="navbar-nav flex-column">
							<li class="nav-item">
								<a class="nav-link" href="/master/customer">
									<span class="nav-icon-wrap">
										<span class="svg-icon">
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
										<circle cx="12" cy="7" r="4" />
										<path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
										</svg>
										</span>
									</span>
									<span class="nav-link-text">Customer</span>
								</a>
							</li>	
							<li class="nav-item">
								<a class="nav-link" href="/master/kota">
									<span class="nav-icon-wrap">
										<span class="svg-icon">
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none"/>
										<circle cx="12" cy="11" r="3" />
										<path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
										</svg>
										</span>
									</span>
									<span class="nav-link-text">Kota</span>
									
								</a>	
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/master/provinsi">
									<i data-feather="map"></i>
									<span class="nav-link-text">&nbsp;&nbsp;&nbsp;Provinsi</span>
									
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="/master/booth">
									<i data-feather="box"></i>
									<span class="nav-link-text">&nbsp;&nbsp;&nbsp;Booth</span>
									
								</a>
							</li>
							
						</ul>
					</div>
					<div class="menu-gap"></div>
					<div class="menu-group">
						<div class="nav-header">
							<span>Transaksi</span>
						</div>
						<ul class="navbar-nav flex-column">
							<li class="nav-item">
								<a class="nav-link" href="/transaksi/order">				
								<i data-feather="shopping-bag"></i>
									<span class="nav-link-text">&nbsp;&nbsp;&nbsp;Order</span>
								</a>
							</li>						
							</ul>
						</div>

						@endif

						@if(Auth::user()->karyawan->Divisi->nama == 'Owner')
						<div class="menu-group">
							<div class="nav-header">
								<span>Laporan</span>
							</div>
							<ul class="navbar-nav flex-column">
								<li class="nav-item">
									<a class="nav-link" href="/transaksi/order">				
									<i data-feather="shopping-bag"></i>
										<span class="nav-link-text">&nbsp;&nbsp;&nbsp;Order</span>
									</a>
								</li>						
								</ul>
							</div>
						@endif
						<div class="menu-gap"></div>
						<div class="menu-group">
							<ul class="navbar-nav flex-column">
								<li class="nav-item">
									<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">
										
										<span class="nav-link-text">Keluar</span>
									</a>
								</li>	
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
								</form>					
								</ul>
						</div>	
				</div>
			</div>