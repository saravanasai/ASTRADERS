<?php 
  

    //section for getting the Count of total Customer regsitered
$sql_customer_count = "SELECT COUNT(`CUSTOMER_ID`) AS TOTAL_CUSTOMER_COUNT FROM `customermaster`";
$stmt_customer_count = $conn->prepare($sql_customer_count);
$stmt_customer_count->execute();
$Total_customer_count = $stmt_customer_count->fetch(PDO::FETCH_COLUMN);
//End section for getting the Count of total Customer regsitered

// //section for getting the Count of Collections
$sql_collection_count = "SELECT COUNT(`COLLECTION_ID`) AS TOTAL_COLLECTION FROM `collectionList` WHERE `COLLECTION_STATUS`=1 ";
$stmt_collection_count = $conn->prepare($sql_collection_count);
$stmt_collection_count->execute();
$Total_collection_count = $stmt_collection_count->fetch(PDO::FETCH_COLUMN);
// //End section for getting the Count of Collections

// //section for getting the Count of Agents
$sql_agent_count = "SELECT COUNT(`AGENT_ID`) AS TOTAL_AGENTS FROM `agents`";
$stmt_agent_count = $conn->prepare($sql_agent_count);
$stmt_agent_count->execute();
$Total_agent_count = $stmt_agent_count->fetch(PDO::FETCH_COLUMN);
// //End section for getting the Count of Agents


try {
    // //section for getting the Count of Today Collection
$sql_Today_collection_count = "SELECT COUNT(`TR_ID`) AS TODAY_TRANSACTION FROM `todayTransactionView` WHERE `TR_COMMIT_STATUS`=1 AND `TR_DONE_ON`!='ONSTORE'";
$stmt_Today_collection_count = $conn->prepare($sql_Today_collection_count);
$stmt_Today_collection_count->execute();
$Total_Today_collection_count = $stmt_Today_collection_count->fetch(PDO::FETCH_COLUMN);

//End section for getting the Count of Today Collection
    //code...
} catch (PDOException $e) {
    // echo $e;
}


?>