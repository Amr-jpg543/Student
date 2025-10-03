<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  @include('shared.admin.head')
</head>

<body>

  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
    data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

    <header class="topbar" data-navbarbg="skin5">
      @include('shared.admin.nav')
    </header>

    <aside class="left-sidebar" data-sidebarbg="skin5">
      @include('shared.admin.aside')
    </aside>

    <div class="page-wrapper">


      <!-- Container fluid -->
      <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                @yield('content')
              </div>
            </div>
          </div>
        </div>
        <!-- End Page Content -->

      </div>
      <!-- End Container fluid -->

      <!-- footer -->
      <footer class="footer text-center">
        @include('shared.admin.footer')
      </footer>
      <!-- End footer -->

    </div>
    <!-- End Page wrapper -->
  </div>
  <!-- End Wrapper -->

  <!-- All Jquery -->
  <!-- ============================================================== -->
  @include('shared.admin.scripts')
</body>

</html>