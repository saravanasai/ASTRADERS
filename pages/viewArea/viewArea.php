<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
include_once "./assets/css_links.php";
//adding a database config file
include_once "./config.php";
//SECTION FOR FETCHING THE DATA FROM AREAS TABLE

$sql = "SELECT * FROM areas,districts where AREA_DISTRICT=districts.DISTRICT_ID";
$stmt = $conn->prepare($sql);
$stmt->execute();
$areas_list_fecthed = $stmt->fetchAll(PDO::FETCH_ASSOC);

//end of the area list fetching

//section for handling the area update

if (isset($_POST["updateForm"])) {

    $error = array("error_area_name" => "", "error_district_name"=>"");
    $validation_status=true;
    $area_update_to_id=$_POST["areaUpdateId"];
    $area_update_name=$_POST["areaNameUpdate"];
    $area_update_district = $_POST["areaDistrictUpdate"];
   
    
    //section for validating the updated area information

    if ($area_update_name == ""||is_numeric($area_update_name)) {
        $error["error_area_name"] = "ENTER THE AREA NAME";
        $validation_status=false;
    }
    if ($area_update_district == "") {
        $error["error_district_name"] = "ENTER THE DISTRICT NAME";
        $validation_status=false;
    }
   
    var_dump($area_update_district);
    //section for updating the area information to database
   

    if ($validation_status) {

        $sql = "UPDATE areas SET AREA_NAME=:name,AREA_DISTRICT=:district WHERE AREA_ID=:id";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam("id",$area_update_to_id);
        $stmt->bindParam("name",$area_update_name);
        $stmt->bindParam("district",$area_update_district);
       
      if($stmt->execute())
      {
        echo '<script>
              swal("UPDATED", "THE AGENT DETAILS", "success").then(()=>{
                window.location.href = "./index.php?status=viewArea"; 
              });
           </script>';
      }
      else
      {
        echo '<script>
              swal("OPPS!", "SOMETHING WENT WRONG", "error").then(()=>{
                window.location.href = "./index.php?status=viewAgents"; 
              });
           </script>';
      }


    } else {
      echo '<script>
      swal("OPPS!", "CHECK ALL THE ARE VALID ", "error");
      </script>';
    }
         
    //END OF AGENTS UPDATION SECTION

 
  
   




}

?>
 <div class="content-wrapper" style="min-height: 1419.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">

      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->

    <div class="container p-0">
           <div class="" style="height:200px;" >
                <table class="table table-striped table-head-fixed text-nowrap table-bordered" id="viewAreaTable">
                  <thead>
                    <tr>
                      <th style="width: 10px">S.NO</th>
                      <th>AREA NAME</th>
                      <th>AREA DISTRICT</th>
                      <th style="width: 40px">ACTION</th>
                      <th style="width: 40px">DELETE</th>

                    </tr>
                  </thead>
                  <tbody>
                  <div class="card table-responsive">
                   <?php
foreach ($areas_list_fecthed as $sno => $area_list) {
    echo '<tr>
                     <td>' . ++$sno . '</td>
                     <td>' . $area_list["AREA_NAME"] . '</td>
                     <td>
                       ' . $area_list["DISTRICT_NAME"] . '
                     </td>
                     <td>
                     <button type="button" class="btn btn-sm btn-warning areaViewModel" data-toggle="modal" id=' . $area_list["AREA_ID"] . ' data-target="#modal-lg">
                      EDIT
                      <input type="hidden" id="editAreaDistrictId" value="'.$area_list["DISTRICT_ID"].'">
                      </button>
                     </td>
                     <td>
                     <button type="button" class="btn btn-sm btn-danger deleteArea"  id=' . $area_list["AREA_ID"] . '>DELETE
                     </button>
                    

                    </td>

                   </tr>';

}
?>
                  </tbody>
                </table>
            
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        </div>
    <!-- /.content -->
    </div>

    <!-- MODEL -->
    <!-- Modal -->
<div id="model">
<div class="modal fade" id="modal-lg" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
</div>

<?php
include_once "./assets/js_links.php";
?>
