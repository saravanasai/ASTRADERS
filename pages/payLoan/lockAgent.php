<?php

include "../../config.php";

//setting agent id into session for presistence
session_start();

if(isset($_POST['AGENT_ID']))
{
      if(true)
      {
        $_SESSION['PAY_TO_AGENT_ID']="";
        $_SESSION['PAY_TO_AGENT_ID'] =$_POST['AGENT_ID'];
      }
     

     if(isset($_SESSION['PAY_TO_AGENT_ID']))
     {  
         echo 1;
     }
}



