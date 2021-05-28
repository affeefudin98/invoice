<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <!-- Sidenav Heading (Addons)-->
                <div class="sidenav-menu-heading">Home</div>
                <!-- Sidenav Link (Charts)-->
                @include('layouts.includes.sidebarDashboard')
                    <div class="nav-link-icon"><i data-feather="home"></i></div>
                    Dashboard
                </a>
                <!-- Sidenav Heading (App Views)-->
                <div class="sidenav-menu-heading">App Views</div>
                
                <!-- Sidenav Accordion (companies)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseCompany" aria-expanded="false" aria-controls="collapseFlows">
                    <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                    Companies
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCompany" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav">
                        
                        @include('layouts.includes.sidebarCompany')

                    </nav>
                </div>

                <!-- Sidenav Accordion (products)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="false" aria-controls="collapseFlows">
                    <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                    Products
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseProduct" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav">

                        @include('layouts.includes.sidebarProduct')

                    </nav>
                </div>

                <!-- Sidenav Accordion (paymethod)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapsePaymethod" aria-expanded="false" aria-controls="collapseFlows">
                    <div class="nav-link-icon"><i data-feather="repeat"></i></div>
                    Payment Methods
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePaymethod" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav">

                        @include('layouts.includes.sidebarPaymethod')

                    </nav>
                </div>
                <!-- Sidenav Accordion (Invoice)-->
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseInvoice" aria-expanded="false" aria-controls="collapsePages">
                    <div class="nav-link-icon"><i data-feather="grid"></i></div>
                    Invoices
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseInvoice" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPagesMenu">

                        @include('layouts.includes.sidebarInvoice')

                    </nav>
                </div>
               
                <!-- Sidenav Heading (Addons)-->
                <div class="sidenav-menu-heading">Plugins</div>
                <!-- Sidenav Link (Charts)-->
                <a class="nav-link" href="charts.html">
                    <div class="nav-link-icon"><i data-feather="bar-chart"></i></div>
                    Charts
                </a>
                <!-- Sidenav Link (Tables)-->
                <a class="nav-link" href="tables.html">
                    <div class="nav-link-icon"><i data-feather="filter"></i></div>
                    Tables
                </a>
            </div>
        </div>
        <!-- Sidenav Footer-->
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{ Auth::user()->name }} </div>
            </div>
        </div>
    </nav>
</div>