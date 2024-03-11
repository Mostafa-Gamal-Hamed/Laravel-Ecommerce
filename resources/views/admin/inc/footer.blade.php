    <footer class="footer {{$color == "light" ? "bg-light text-dark border-top" : "bg-dark text-light border border-top-1"}}" style="background-color: #191c24;">
        <div class="d-sm-flex justify-content-center">
        <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Mostafa Gamal 2023</span>
        </div>
    </footer>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset("Admin/assets")}}/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset("Admin/assets")}}/vendors/chart.js/Chart.min.js"></script>
    <script src="{{asset("Admin/assets")}}/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="{{asset("Admin/assets")}}/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="{{asset("Admin/assets")}}/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="{{asset("Admin/assets")}}/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="{{asset("Admin/assets")}}/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset("Admin/assets")}}/js/off-canvas.js"></script>
    <script src="{{asset("Admin/assets")}}/js/hoverable-collapse.js"></script>
    <script src="{{asset("Admin/assets")}}/js/misc.js"></script>
    <script src="{{asset("Admin/assets")}}/js/settings.js"></script>
    <script src="{{asset("Admin/assets")}}/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset("Admin/assets")}}/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
