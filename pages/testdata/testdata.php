<?php 
    include_once("./assets/css_links.php");
    //adding a database config file
    include_once ("./config.php");
    //SECTION FOR FETCHING THE DATA FROM AGENTS TABLE

$sql = "SELECT * FROM agents";
$stmt = $conn->prepare($sql);
$stmt->execute();
$agent_list_fecthed = $stmt->fetchAll(PDO::FETCH_ASSOC);

//end of the agent list fetching

   
 ?>
 <div class="content-wrapper" style="min-height: 1419.6px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
     <div class="container">
     <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>delete</th>
                <th>edit</th>
                
            </tr>
        </thead>
        <tbody>
           <?php 
             
              foreach($agent_list_fecthed as $agent_list)
              {
                  echo '  <tr>
                  <td>'.$agent_list["AGENT_NAME"].'</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td><button class="btn btn-danger delete" >delete</button></td>
                  <td><button class="btn btn-warning edit">edit</button></td>
                 
              </tr>';
              }
           
           
           ?>
           
        </tbody>
       
    </table>
    
     </div>
    <!-- /.content -->
    </div>
   
    

    
    
    
<?php
  include_once("./assets/js_links.php");
?>
