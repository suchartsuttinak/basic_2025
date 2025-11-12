<div class="app-sidebar-menu">
    <div class="h-100" data-simplebar>

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <div class="logo-box">
                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-light.png" alt="" height="24">
                    </span>
                </a>
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="assets/images/logo-sm.png" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="assets/images/logo-dark.png" alt="" height="24">
                    </span>
                </a>
            </div>

            <ul id="side-menu">

                <li class="menu-title">Menu</li>

                <!-- Dashboard -->
                <li>
                    <a href="#sidebarDashboards" data-bs-toggle="collapse">
                     <i data-feather="home"></i>
                        <span> Dashboard </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarDashboards">
                        <ul class="nav-second-level">
                            <li>
                                <a href="index.html" class="tp-link">Analytical</a>
                            </li>
                            <li>
                                <a href="ecommerce.html" class="tp-link">E-commerce</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Landing -->
                 <li>
                    <a href="landing.html" target="_blank">
                        <i data-feather="globe"></i>
                        <span> Landing </span>
                    </a>
                    </li> 

                <li class="menu-title">Pages</li>

            <!-- Brand Manage -->
                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i data-feather="users"></i>
                        <span> Brand Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.brand') }}" class="tp-link">All Brand</a>
                            </li>
                            <li>
                                <a href="auth-register.html" class="tp-link">Register</a>
                            </li>
                            <li>
                                <a href="auth-recoverpw.html" class="tp-link">Recover Password</a>
                            </li>
                            <li>
                                <a href="auth-lock-screen.html" class="tp-link">Lock Screen</a>
                            </li>
                            <li>
                                <a href="auth-confirm-mail.html" class="tp-link">Confirm Mail</a>
                            </li>
                            <li>
                                <a href="email-verification.html" class="tp-link">Email Verification</a>
                            </li>
                            <li>
                                <a href="auth-logout.html" class="tp-link">Logout</a>
                            </li>
                        </ul>
                    </div>
                </li>

            <!-- WareHouse Manage -->
                <li>
                    <a href="#WareHouse" data-bs-toggle="collapse">
                        <i data-feather="alert-octagon"></i>
                        <span> Warehouse Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="WareHouse">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.warehouse') }}" class="tp-link">All Warehouse</a>
                            </li>                      
                        </ul>
                    </div>
                </li>

                <!-- Utility Pages -->
                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i data-feather="file-text"></i>
                        <span> Supplier Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.supplier') }}" class="tp-link">All Supplier</a>
                            </li>
                            <li>
                                <a href="pages-profile.html" class="tp-link">Profile</a>
                            </li>
                            <li>
                                <a href="pages-pricing.html" class="tp-link">Pricing</a>
                            </li>                      
                        </ul>
                    </div>
                </li>

                 <!-- Customer Pages -->
                <li>
                    <a href="#customer" data-bs-toggle="collapse">
                        <i data-feather="file-text"></i>
                        <span> Customer Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="customer">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.customer') }}" class="tp-link">All Customer</a>
                            </li>
                            <li>
                                <a href="pages-profile.html" class="tp-link">Profile</a>
                            </li>
                            <li>
                                <a href="pages-pricing.html" class="tp-link">Pricing</a>
                            </li>                      
                        </ul>
                    </div>
                </li>

                 <!-- ProductCategory Pages -->
                <li>
                    <a href="#product" data-bs-toggle="collapse">
                        <i data-feather="file-text"></i>
                        <span> Product Manage </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="product">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.category') }}" class="tp-link">All Category</a>
                            </li>
                            <li>
                                <a href="{{ route('all.product') }}" class="tp-link">AllProduct</a> 
                            </li>                          
                        </ul>
                    </div>
                </li>

                <!-- Calendar -->
                <li>
                    <a href="calendar.html" class="tp-link">
                        <i data-feather="calendar"></i>
                        <span> Calendar </span>
                    </a>
                </li>

                <li class="menu-title mt-2">General</li>

                <!-- Components -->
                <li>
                    <a href="#sidebarBaseui" data-bs-toggle="collapse">
                        <i data-feather="package"></i>
                        <span> Components </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarBaseui">
                        <ul class="nav-second-level">
                            <li>
                                <a href="ui-accordions.html" class="tp-link">Accordions</a>
                            </li>
                            <li>
                                <a href="ui-alerts.html" class="tp-link">Alerts</a>
                            </li>
                            <li>
                                <a href="ui-badges.html" class="tp-link">Badges</a>
                            </li>                      
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="widgets.html" class="tp-link">
                        <i data-feather="aperture"></i>
                        <span> Widgets </span>
                    </a>
                </li>

                <li>
                    <a href="#sidebarAdvancedUI" data-bs-toggle="collapse">
                        <i data-feather="cpu"></i>
                        <span> Extended UI </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAdvancedUI">
                        <ul class="nav-second-level">
                            <li>
                                <a href="extended-carousel.html" class="tp-link">Carousel</a>
                            </li>
                            <li>
                                <a href="extended-notifications.html" class="tp-link">Notifications</a>
                            </li>
                            <li>
                                <a href="extended-offcanvas.html" class="tp-link">Offcanvas</a>
                            </li>
                            <li>
                                <a href="extended-range-slider.html" class="tp-link">Range Slider</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarIcons" data-bs-toggle="collapse">
                        <i data-feather="award"></i>
                        <span> Icons </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarIcons">
                        <ul class="nav-second-level">
                            <li>
                                <a href="icons-feather.html" class="tp-link">Feather Icons</a>
                            </li>
                            <li>
                                <a href="icons-mdi.html" class="tp-link">Material Design Icons</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarForms" data-bs-toggle="collapse">
                        <i data-feather="briefcase"></i>
                        <span> Forms </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarForms">
                        <ul class="nav-second-level">
                            <li>
                                <a href="forms-elements.html" class="tp-link">General Elements</a>
                            </li>
                            <li>
                                <a href="forms-validation.html" class="tp-link">Validation</a>
                            </li>
                            <li>
                                <a href="forms-quilljs.html" class="tp-link">Quilljs Editor</a>
                            </li>
                            <li>
                                <a href="forms-pickers.html" class="tp-link">Picker</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarTables" data-bs-toggle="collapse">
                        <i data-feather="table"></i>
                        <span> Tables </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarTables">
                        <ul class="nav-second-level">
                            <li>
                                <a href="tables-basic.html" class="tp-link">Basic Tables</a>
                            </li>
                            <li>
                                <a href="tables-datatables.html" class="tp-link">Data Tables</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarCharts" data-bs-toggle="collapse">
                        <i data-feather="pie-chart"></i>
                        <span> Apex Charts </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarCharts">
                        <ul class="nav-second-level">
                            <li>
                                <a href='charts-line.html'>Line</a>
                            </li>
                            <li>
                                <a href='charts-area.html'>Area</a>
                            </li>
                            <li>
                                <a href='charts-column.html'>Column</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarMaps" data-bs-toggle="collapse">
                        <i data-feather="map"></i>
                        <span> Maps </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarMaps">
                        <ul class="nav-second-level">
                            <li>
                                <a href="maps-google.html" class="tp-link">Google Maps</a>
                            </li>
                            <li>
                                <a href="maps-vector.html" class="tp-link">Vector Maps</a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
</div>
