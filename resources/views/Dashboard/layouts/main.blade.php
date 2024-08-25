<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Dashboard | Bonleaf</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesdesign" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="/Dashboard/assets/images/logo2.ico">

        <!-- datepicker -->
        <link href="/Dashboard/assets/libs/air-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css" />

        <!-- jvectormap -->
        <link href="/Dashboard/assets/libs/jqvmap/jqvmap.min.css" rel="stylesheet" />

        <!-- DataTables -->
        <link href="/Dashboard/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="/Dashboard/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- datepicker -->
        <link href="Dashboard/assets/libs/air-datepicker/css/datepicker.min.css" rel="stylesheet" type="text/css" />


        <!-- Responsive datatable examples -->
        <link href="/Dashboard/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />     
        
        <!-- Bootstrap Css -->
        <link href="/Dashboard/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="/Dashboard/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="/Dashboard/assets/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body data-topbar="colored">

        <!-- Begin page -->
        <div id="layout-wrapper">

            <!-- ========== Header ========== -->
            @include('Dashboard.layouts.header')
            

            <!-- ========== Left Sidebar Start ========== -->
            @include('Dashboard.layouts.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    
                    <!-- Page-Title -->
                    <div class="page-title-box">
                        <div class="container-fluid">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h4 class="page-title mb-1">Dashboard Bonleaf</h4>
                                    <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item active font-weight-bold">Selamat Datang!</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end page title end breadcrumb -->

                    {{-- <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            @yield('content')
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                        </div>
                        <!-- end container-fluid -->
                    </div>  --}}


                    <div class="page-content-wrapper">
                        <div class="container-fluid">
                        @yield('content')
                        </div> <!-- container-fluid -->
                    </div>
                    <!-- end page-content-wrapper -->
                </div>
                <!-- End Page-content -->

                
                @include('Dashboard.layouts.footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->


        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="/Dashboard/assets/libs/jquery/jquery.min.js"></script>
        <script src="/Dashboard/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/Dashboard/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="/Dashboard/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="/Dashboard/assets/libs/node-waves/waves.min.js"></script>

        <script src="https://unicons.iconscout.com/release/v2.0.1/script/monochrome/bundle.js"></script>

        <!-- datepicker -->
        <script src="/Dashboard/assets/libs/air-datepicker/js/datepicker.min.js"></script>
        <script src="/Dashboard/assets/libs/air-datepicker/js/i18n/datepicker.en.js"></script>

        <!-- apexcharts -->
        <script src="/Dashboard/assets/libs/apexcharts/apexcharts.min.js"></script>

        {{-- Editor --}}
        <script src="/Dashboard/assets/libs/tinymce/tinymce.min.js"></script>
        <script src="/Dashboard/assets/js/pages/form-editor.init.js"></script>

        <!-- parsleyjs -->
        <script src="/Dashboard/assets/libs/parsleyjs/parsley.min.js"></script>
        <!-- validation init -->
        <script src="/Dashboard/assets/js/pages/form-validation.init.js"></script>

        <!-- Required datatable js -->
        <script src="/Dashboard/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="/Dashboard/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="/Dashboard/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="/Dashboard/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <script src="/Dashboard/assets/libs/jszip/jszip.min.js"></script>
        <script src="/Dashboard/assets/libs/pdfmake/build/pdfmake.min.js"></script>
        <script src="/Dashboard/assets/libs/pdfmake/build/vfs_fonts.js"></script>
        <script src="/Dashboard/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="/Dashboard/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="/Dashboard/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="/Dashboard/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="/Dashboard/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="/Dashboard/assets/js/pages/datatables.init.js"></script>
        
        <!-- datepicker -->
        <script src="/Dashboard/assets/libs/air-datepicker/js/datepicker.min.js"></script>
        <script src="/Dashboard/assets/libs/air-datepicker/js/i18n/datepicker.en.js"></script>

        <!-- Chart JS -->
        <script src="/Dashboard/assets/libs/chart.js/Chart.bundle.min.js"></script>
        <script src="/Dashboard/assets/js/pages/chartjs.init.js"></script>
        


        <script src="/Dashboard/assets/libs/jquery-knob/jquery.knob.min.js"></script> 

        <!-- Jq vector map -->
        <script src="/Dashboard/assets/libs/jqvmap/jquery.vmap.min.js"></script>
        <script src="/Dashboard/assets/libs/jqvmap/maps/jquery.vmap.usa.js"></script>

        <script src="/Dashboard/assets/js/pages/dashboard.init.js"></script>

        <script src="/Dashboard/assets/js/app.js"></script>


        @yield('script')

    </body>
</html>
