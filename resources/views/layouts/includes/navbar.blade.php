<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
    <!-- Navbar Brand-->
    <!-- * * Tip * * You can use text or an image for your navbar brand.-->
    <!-- * * * * * * When using an image, we recommend the SVG format.-->
    <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->

    @auth
        @if (Auth::user()->isAdmin())
            <a class="navbar-brand" href="{{ route('admin.dashboard.index') }}">Invoice Management System</a>
        @elseif (Auth::user()->isClient())
            <a class="navbar-brand" href="{{ route('client.dashboard.index') }}">Invoice Management System</a>
        @endif
    @endauth
    
    <!-- Sidenav Toggle Button-->
    <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 mr-lg-2" id="sidebarToggle"><i data-feather="menu"></i></button>
   
    <!-- Navbar Items-->
    <ul class="navbar-nav align-items-center ml-auto">

        <!-- User Dropdown-->
        <li class="nav-item dropdown no-caret mr-3 mr-lg-0 dropdown-user">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="{{ env('APP_URL') }}/storage/{{ Auth::user()->picture }}" /></a>
            <div class="dropdown-menu dropdown-menu-right border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                <h6 class="dropdown-header d-flex align-items-center">
                    <!-- <img class="dropdown-user-img" src="assets/img/illustrations/profiles/profile-1.png" /> -->
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">{{ Auth::user()->name }}</div>
                        <div class="dropdown-user-details-email">{{ Auth::user()->email }}</div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                @auth
                    @if (Auth::user()->isAdmin())
                        <a class="dropdown-item" href="{{ route('admin.accounts.profile', Auth::user()->id) }}">
                        <div class="dropdown-item-icon"><i data-feather="settings"></i></div>Profile</a>
                    @elseif (Auth::user()->isClient())
                        <a class="dropdown-item" href="{{ route('client.accounts.profile', Auth::user()->id) }}">
                        <div class="dropdown-item-icon"><i data-feather="settings"></i></div>Profile</a>
                    @endif
                @endauth
               

                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                    Logout

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
                </a>
            </div>
        </li>
    </ul>
</nav>