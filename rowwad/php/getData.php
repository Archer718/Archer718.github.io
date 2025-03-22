<?php

//include '../functions.php';
include 'connect.php';

$doctorId = $_GET['id'];

$checkFoundSql = "SELECT * FROM `doctors` where `id`=$doctorId";

$exc = sqlExec($checkFoundSql);

$count = $exc['count'];
$data = $exc['data'];

// $found = ifFound($count)[0];

// $res = ['messages'=>$data];
// echo_json($data);




?>

