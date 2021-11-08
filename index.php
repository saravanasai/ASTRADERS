<?php 
  session_start();
  require("./login/auth.php");
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AS TRADERS | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php 
    include_once("assets/css_links.php");
  ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php
  include_once("menu/staff_menu.php");
?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php
  include_once("assets/js_links.php");
?>

</body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script>
   var url = window.location;
    // for single sidebar menu
    $('ul.nav-sidebar a').filter(function () {
        return this.href == url;
    }).addClass('active');

    // for sidebar menu and treeview
    $('ul.nav-treeview a').filter(function () {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview")
        .css({'display': 'block'})
        .addClass('menu-open').prev('a')
        .addClass('active');
 </script>
</html>
