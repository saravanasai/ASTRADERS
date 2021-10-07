<?php

include("../../config.php");






//section for fetching and showing the todayTransaction view data in model
if (isset($_POST["id"])) {

    $transaction_id = $_POST["id"];

 

    $sql = "SELECT * FROM `loanTransaction` WHERE TR_ID=:id;";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam("id", $transaction_id);
    $stmt->execute();


    $single_Transaction_Detail_fetch = $stmt->fetchAll(PDO::FETCH_ASSOC);

    

    foreach ($single_Transaction_Detail_fetch as $single_Transaction_Detail) {

        echo '<form id="cousterViewUpdateForm" method="post">
    <div class="card-body">
       <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                    <label for="customerUpdateName">ENTER NEW AMOUNT</label>
                    <input type="text" class="form-control" id="updatedNewAmount" name="updatedNewAmount" placeholder="New Amount">
                    </div>
               </div>
               <div class="col-md-6">
                    <div class="form-group">
                    <label for="customerLastNameUpdate">LAST BALANCE</label>
                    <input type="text" class="form-control"  id="lastAmountOlddummy"  name="lastBalanceDummy" placeholder="LAST BALANCE" value="' . $single_Transaction_Detail["TR_AMOUNT_BALANCE"] . '" disabled>
                    <input type="hidden" class="form-control"  id="lastAmountOld"  name="lastBalance" placeholder="LAST BALANCE" value="' . $single_Transaction_Detail["TR_AMOUNT_BALANCE"] . '">
                    </div>
                </div>
           </div>
           <div class="row">
           <div class="col-md-6">
               <div class="form-group">
               <label for="customerUpdateName">NEW BLANCE</label>
               <input type="text" class="form-control" id="newBalance" name="newBalance" placeholder="New Balance" disabled>
               <input type="hidden" class="form-control" id="newBalancetoDb" name="newBalanceToDb" placeholder="New Balance" >
               </div>
          </div>
      </div>
   </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-warning float-right" id="buttonUpdateTransaction" name="buttonUpdateTransaction"  >UPDATE</button>
      
      <input type="hidden"  name="transactionUpdateId" value="' . $single_Transaction_Detail["TR_ID"] . '">
    </div>
  </form>';
    }
}
