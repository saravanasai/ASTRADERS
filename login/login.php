<?php
session_start();
include_once "../config.php";

if (isset($_POST["Login"])) {

  $username = trim($_POST["username"]);
  $password = md5($_POST["password"]);


  $sql = "SELECT * FROM login WHERE  USERNAME=:user AND USER_PASSWORD=:pass";

  $stmt = $conn->prepare($sql);
  $stmt->bindParam("user", $username);
  $stmt->bindParam("pass", $password);

  
  $stmt->execute();

  $count = $stmt->rowCount();
  

  if ($count > 0) {
    $_SESSION["admin"] = $username;
    
    header("location:../index.php");
  }
  else
  {
    $error="INVALID PASSWORD OR USERNAME";
  }
}

?>
<link rel="stylesheet" href="./css/style1.css">

<div class="background-wrap">
  <div class="background"></div>

</div>
  <img src="./image/AS TRADERS.png" alt="" style="width: 460; height:auto; margin-left:475px; margin-top:30px;">
<form id="accesspanel" action="" method="post">
  <h1 id="litheader">AS TRADERS</h1>
  <?php 
  date_default_timezone_set('Asia/Calcutta'); ?>
  <div class="inset">
  <h4 id="litheader"><?php echo htmlspecialchars($error) ?></h4>
    <p>
      <input type="text" name="username" id="username" placeholder="USERNAME" name="username">
    </p>
    <p>
      <input type="password" name="password" id="password" placeholder="PASSWORD" name="password">
    </p>

    <p class="p-container">
      <input type="submit" name="Login" id="go" value="LOGIN">
    </p>
</form>