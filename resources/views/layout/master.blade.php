<!DOCTYPE html>
<html lang="en">

@include('layout.head')

<body>

  <!-- ======= Header ======= -->
  @include('layout.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('layout.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    @yield('contents')

  </main>
  <!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layout.footer')
  <!-- End Footer -->


  <!-- Vendor JS Files -->
  @include('layout.scripts')


</body>

</html>