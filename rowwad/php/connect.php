<?php
$dsn = "mysql:host=localhost;dbname=lawoffice";
$user = "root";
$pass = "";
$option = array(
   PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
);
$countrowinpage = 9;
try {
   $con = new PDO($dsn, $user, $pass, $option);
   $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
   header("Access-Control-Allow-Methods: POST, OPTIONS , GET");
   include "functions.php";
   if (!isset($notAuth)) {
      // checkAuthenticate();
   }
} catch (PDOException $e) {
   echo $e->getMessage();
}

//db
//:3wNxrKmCKXe4fU

//php
//Simx1oJOMm

// $dsn = 'mysql:host=zab6s.h.filess.io;port=3307;dbname=tazker_downaloud';
// $username = 'tazker_downaloud';
// $password = 'f131f3cf4320ef71833b2b1eb998519f7e28cd4b';
// $option = array(
//    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"
// );
// try {
//     // Create a PDO instance
//    $con = new PDO($dsn, $username, $password, $option);
    
//     // Set the PDO error mode to exception
//    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    header("Access-Control-Allow-Origin: *");
//    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
//    header("Access-Control-Allow-Methods: POST, OPTIONS , GET");
//    include "functions.php";

    
//     //echo "Connected successfully";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }
