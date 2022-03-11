<nav >
    <ul style="float:right;  padding-right: 20px; padding-top: 20px;   ">

        <li> <x-app-layout>

        </x-app-layout></li>
    </ul>
</nav>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Food Menu</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />
  </head>
  <body>
<div class="container-scroller">
    @include("admin.navbar")
    <br><br><br><br>
<form style="padding-left: 20px;" action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
<br><br><br><br><br>
@csrf <!-- to upload data to data base -->
<div>
        <label>Title</label><br>
        <input type="text" name="title" placeholder="Write a title " required style="color:black"><br><br>
</div>
<div>
        <label>Price</label><br>
        <input type="num" name="price" placeholder="Write a price " required style="color:black"><br><br>
</div>
<div>
        <label>Image</label><br>
        <input type="file" name="image" required style="color:black"><br><br>
</div>
<div>
        <label>Description</label><br>
        <input type="text" name="description" style="color:black" placeholder="Write a description" required ><br><br>
</div>
<div>
        <input type="submit" value="Save" style=" background-color: #4CAF50;border: none;color: white;padding: 10px 10px;text-decoration: none;margin: 4px 2px;cursor: pointer;" >
</div>
</form>
</div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="admin/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="admin/assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="admin/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="admin/assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <script src="admin/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>
    <script src="admin/assets/js/settings.js"></script>
    <script src="admin/assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>
