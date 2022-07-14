<?php
include_once "./assets/css_links.php";
//adding a database config file
include_once "./config.php";
//SECTION FOR FETCHING THE DATA FROM AREAS TABLE

// $sql = "SELECT * FROM products,brand where BRAND_ID=PRODUCT_BRAND";
// $stmt = $conn->prepare($sql);
// $stmt->execute();
// $products_list_fecthed = $stmt->fetchAll(PDO::FETCH_ASSOC);

//end of the area list fetching

?>
<div class="content-wrapper" style="min-height: 1419.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">License</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="btn btn-sm btn-primary"><a class="text-white" href="<?php echo "index.php" ?>"><i class="fa fa-cubes px-1" aria-hidden="true"></i>
                                Dashboard</a></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="" style="height:200px;">
                <div class="content px-2">
                    <p>AS Traders is project developed by <a href="https://www.exciteon.com">Exciteon</a>. This allows you to do pretty much anything For Business needs of software Owner</p>
                    <h5 class="text-bold text-dark mt-3">Developer Details</h5>
                    <ul>
                        <li>Database Design - Saravana</li>
                        <li>Admin Dashboard - Saravana</li>
                        <li>API For (Mobile Intergration) - Saravana</li>
                        <li>Mobile Application - Ajmal</li>
                    </ul>
                    <h5 class="text-bold text-dark mt-3">What You Are <span class="text-danger">Not Allowed</span> To Do</h5>
                    <ul>
                        <li>Should not share code with any other third party without the knowledge of  <a href="https://www.exciteon.com">Exciteon</a></li>
                        <li>Should not Alter Database Design with any other third party without the knowledge of  <a href="https://www.exciteon.com">Exciteon</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </section>
    <!-- /.content -->
</div>

<?php
include_once "./assets/js_links.php";
?>