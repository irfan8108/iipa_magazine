sidebar wrapper -->
	<div class="sidebar-wrapper" data-simplebar="true">
		<div class="sidebar-header">
			{{-- <div>
				<img src="{{ asset('admin/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
			</div> --}}
			<div>
				<h4 class="logo-text">IIPA Magazines</h4>
			</div>
			<div class="toggle-icon ms-auto"><i class='bx bx-first-page'></i>
			</div>
		</div>
		<!--navigation-->
		<ul class="metismenu" id="menu">
			<li>
				<a href="{{ route('dashboard') }}">
					<div class="parent-icon"><i class='bx bx-home'></i>
					</div>
					<div class="menu-title">Dashboard</div>
				</a>
			</li>
			{{-- <li>
				<a href="{{ route('admin.invoice') }}">
					<div class="parent-icon"><i class='bx bx-edit'></i>
					</div>
					<div class="menu-title">Generate Invoice</div>
				</a>
			</li> --}}
			{{-- <li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="bx bxs-group"></i>
					</div>
					<div class="menu-title">Users</div>
				</a>
				<ul>
					<li> <a href="{{ route('admin.add_user') }}"><i class="bx bx-right-arrow-alt"></i>Add User</a>
					</li>
					<li> <a href="{{ route('admin.users') }}"><i class="bx bx-right-arrow-alt"></i>All Users</a>
					</li>
				</ul>
			</li> --}}
			<li class="menu-label">Items</li>
			{{-- <li>
				<a href="#">
					<div class="parent-icon"><i class='bx bx-briefcase-alt-2'></i>
					</div>
					<div class="menu-title">Add Stock</div>
				</a>
			</li> --}}
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="fadeIn animated bx bx-book-bookmark"></i>
					</div>
					<div class="menu-title">Magazines</div>
				</a>
				<ul>
					<li> <a href="{{ route('blog.create') }}"><i class="bx bx-right-arrow-alt"></i>Add New Magazine</a>
					</li>
					<li> <a href="{{ route('blog.index') }}"><i class="bx bx-right-arrow-alt"></i>View All Magazines</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class='bx bx-edit'></i>
					</div>
					<div class="menu-title">Articles</div>
				</a>
				<ul>
					<li> <a href="{{ route('article.create') }}"><i class="bx bx-right-arrow-alt"></i>New Article</a>
					</li>
					<li> <a href="{{ route('article.index') }}"><i class="bx bx-right-arrow-alt"></i>All Articles</a>
					</li>
				</ul>
			</li>
			{{-- <li>
				<a href="{{ route('admin.orders') }}">
					<div class="parent-icon"><i class="bx bx-cart-alt"></i>
					</div>
					<div class="menu-title">Orders</div>
				</a>
			</li>
			<li>
				<a href="{{ route('admin.order_details') }}">
					<div class="parent-icon"><i class="bx bx-right-arrow-alt"></i>
					</div>
					<div class="menu-title">Order Details</div>
				</a>
			</li> --}}
			<li class="menu-label">Others</li>
			<li>
				<a href="#" target="_blank">
					<div class="parent-icon"><i class='bx bx-headphone' ></i>
					</div>
					<div class="menu-title">Support</div>
				</a>
			</li>
		</ul>
		<!--end navigation-->
	</div>
<!--end sidebar wrapper 