<?php

include "../../config.php";

//setting agent id into session for presistence
session_start();

if(isset($_POST['LOCK_DATE']))
{
      if(true)
      {
        $_SESSION['LOCK_DATE']="";
        $_SESSION['PAY_ON_DATE'] =$_POST['LOCK_DATE'];
      }
     

     if(isset($_SESSION['PAY_ON_DATE']))
     {  
         echo 1;
     }
}



