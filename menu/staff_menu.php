<?php
include_once("./config.php");
include_once("./pages/commondata.php");
?>
 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">

      </li>
      <li class="nav-item d-none d-sm-inline-block">

      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <h4>DASHBOARD</h4>
        <div class="input-group-append">
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->

            <!-- Message End -->
          </a>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <div class="dropdown-divider"></div>

          <div class="dropdown-divider"></div>

          <div class="dropdown-divider"></div>

        </div>
        <!-- section for new circular alert menu -->
      </li>
      <li class="nav-item">
        <a class="nav-link" href="" role="button">
          <i class="far fa-bell"></i>
          <span class="badge badge-danger navbar-badge"></span>
        </a>
      </li>
      <!-- end section for new circular alert menu -->
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php" role="button">
          <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->


  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-danger elevation-4 ">
    <!-- Brand Logo -->
    <a href="index.html<?php echo '?status=' ?>" class="brand-link ">
      <span class="brand-text font-weight-light px-4">EXCITEON TECH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <!--USER PHOTO DISPLAY SECTION-->
          <a href="index.php" class="d-block">
            <img src="menu/menuLogo/AS TRADERS.png" style="width:200px; height: 75px;" alt="User Image">
          </a>
        </div>
        <div class="info ">


        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- FIRST menu for dashboard -->
          <li class="nav-item has-treeview ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-address-book "></i>
              <p>
                AGENTS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo '?status=newAgent' ?>" class="nav-link ">
                  <i class="nav-icon fas fa-user-plus"></i>
                  <p>
                    ADD NEW AGENT
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo '?status=viewAgents' ?>" class="nav-link ">
                  <i class="nav-icon far fa-eye"></i>
                  <p>
                    VIEW AGENTS
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <!-- end of a FIRST navigation section-->
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- SECOND menu for dashboard -->
            <li class="nav-item has-treeview ">
              <a href="#" class="nav-link active">
                <i class="nav-icon far fa-compass"></i>
                <p>
                  AREAS
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?php echo '?status=newArea' ?>" class="nav-link">
                    <i class="nav-icon fas fa-street-view"></i>
                    <p>ADD NEW AREA</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo '?status=viewArea' ?>" class="nav-link">
                    <i class="nav-icon fas fa-binoculars"></i>
                    <p>VIEW AREA</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- end of a SECOND navigation section-->
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
              <!-- THIRD menu for dashboard -->
              <li class="nav-item has-treeview ">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-dumpster"></i>
                  <p>
                    PRODUCTS MASTER
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="<?php echo '?status=newBrand' ?>" class="nav-link">
                      <i class="nav-icon far fa-plus-square"></i>
                      <p>ADD NEW BRAND</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo '?status=viewBrand' ?>" class="nav-link">
                      <i class="nav-icon far fas fa-cart-plus"></i>
                      <p>VIEW BRAND</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo '?status=addProduct' ?>" class="nav-link">
                      <i class="nav-icon far fa-plus-square"></i>
                      <p>ADD PRODUTCS</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?php echo '?status=viewProduct' ?>" class="nav-link">
                      <i class="nav-icon far fas fa-cart-plus"></i>
                      <p>EDIT PRODUTCS</p>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- end of a THIRD navigation section-->
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- FOURTH menu for dashboard -->
                <li class="nav-item has-treeview ">
                  <a href="#" class="nav-link active">
                    <i class="nav-icon fab fa-intercom"></i>
                    <p>
                      CUSTOMER MASTER
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo '?status=addCustomer' ?>" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>ADD NEW CUSTOMER</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?php echo '?status=viewCustomer' ?>" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>ALL CUSTOMER</p>
                      </a>
                    </li>


                  </ul>
                </li>
                <!-- end of a FOURTH navigation section-->
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- FIFTH menu for dashboard -->
                  <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link active">
                      <i class="nav-icon fas fa-dice-d6"></i>
                      <p>
                        COLLECTION MASTER
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="<?php echo '?status=masterCollectionList' ?>" class="nav-link">
                          <i class="nav-icon fas fa-scroll"></i>
                          <p>MS COLLECTION LIST</p>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <!-- end of a FIFTH navigation section-->
                  <!-- SIXITH menu for dashboard -->
                  <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link active">
                      <i class="nav-icon fas fa-landmark"></i>
                      <p>
                        LOAN MASTER
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="<?php echo '?status=newLoan' ?>" class="nav-link">
                          <i class="nav-icon fas fa-handshake"></i>
                          <p>NEW LOAN</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="<?php echo '?status=payLoan' ?>" class="nav-link">
                          <i class="nav-icon far fa-money-bill-alt"></i>
                          <p>PAY LOAN</p>
                        </a>
                      </li>

                    </ul>
                  </li>
                  <!-- end of a SIXTH navigation section-->
                  <!-- SEVENTH menu for dashboard -->
                  <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link active">
                      <i class="nav-icon fas fa-cog"></i>
                      <p>
                        SETTINGS
                        <i class="right fas fa-angle-left"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="<?php echo '?status=changePassword' ?>" class="nav-link">
                          <i class="nav-icon fas fa-key"></i>
                          <p>CHANGE PASSWORD</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="./backupdb.php" class="nav-link">
                          <i class="nav-icon fas fa-database"></i>
                          <p>BACKUP DATA</p>
                        </a>
                      </li>

                    </ul>
                  </li>
                  <!-- end of a SEVENTH navigation section-->

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">

    </div>
  </aside>

  <?php
// PHP SECTION FOR HANDLING REDIRECTION //
@$chk = $_REQUEST["status"];
if ($chk =="") {
    include_once "./pages/dashboard.php";
} elseif ($chk == "newAgent") {
    include_once "./pages/newAgent/newAgent.php";
} elseif ($chk == "viewAgents") {
    include_once "./pages/viewagent/viewAgent.php";
} elseif ($chk == "newArea") {
    include_once "./pages/addNewArea/addNewArea.php";
}
elseif ($chk == "viewArea") {
  include_once "./pages/viewArea/viewArea.php";
}
elseif ($chk == "viewBrand") {
    include_once "./pages/viewBrand/viewBrand.php";
}
elseif ($chk == "newBrand") {
  include_once "./pages/addBrand/addBrand.php";
}
elseif ($chk == "addProduct") {
  include_once "./pages/addProduct/addProduct.php";
}
elseif ($chk == "viewProduct") {
  include_once "./pages/viewProducts/viewProduct.php";
}
elseif ($chk == "dataTable") {
  include_once "./pages/testdata/testdata.php";
}
elseif ($chk == "addCustomer") {
  include_once "./pages/addCustomer/addCustomer.php";
}
elseif ($chk == "newLoan") {
  include_once "./pages/newLoan/addNewLoan.php";
}
elseif ($chk == "takeLoan") {
  include_once "./pages/takeLoan/takeLoan.php";
}
elseif ($chk == "masterCollectionList") {
  include_once "./pages/masterCollectionList/masterCollectionList.php";
}
elseif ($chk == "payLoan") {
  include_once "./pages/payLoan/payLoan.php";
}
elseif ($chk == "sales") {
  include_once "./pages/sales/salesDashboard.php";
}
elseif ($chk == "viewCustomer") {
  include_once "./pages/viewCustomer/viewCustomer.php";
}
elseif ($chk == "viewTransaction") {
  include_once "./pages/viewTransaction/viewTransaction.php";
}
elseif ($chk == "changePassword") {
  include_once "./pages/changePassword/changePassword.php";
}
elseif ($chk == "todayTransaction") {
  include_once "./pages/todayTransaction/todayTransaction.php";
}
elseif ($chk == "areasofagents") {
  include_once "./pages/areasofagents/areasofagents.php";
}
elseif ($chk == "singleAgentcollection") {
  include_once "./pages/singleAgentcollection/singleAgentcollection.php";
}
elseif ($chk == "Reports") {
  include_once "./pages/Reports/Reports.php";
}
elseif($chk=="singleAgentTodayTransaction")
{
  include_once "./pages/singleAgentTodayTransaction/singleAgentTodayTransaction.php";
}




?>