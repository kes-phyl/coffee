<?php
error_reporting(E_ALL);

       $servername = "localhost";
       $usernamexx = "root";
       $password = "";
       $dbname = "db_coffee";
       
     
       try {
           $conn = new mysqli($servername, $usernamexx, $password, $dbname);
       } catch (Exception $exc) {
           echo $conn->connect_error;
       }

  


