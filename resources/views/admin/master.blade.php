
<!DOCTYPE html>
<html lang="en">

<head>
    <style type="text/css">
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: white !important;
            background-color: #0d6efd;
            padding: 0.2rem;
        }
    </style>
    @include('admin.includes.assets.css')
</head>

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        @include('admin.includes.header')
    </header>
    <!-- ========== Left Sidebar Start ========== -->
    @include('admin.includes.menu')
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">

           @yield('body')
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        @include('admin.includes.footer')
    </div>

</div>
<!-- END layout-wrapper -->

<!-- JAVASCRIPT -->
@include('admin.includes.assets.script')

</body>

</html>

