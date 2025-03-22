<?php

// ==========================================================
//  Copyright Reserved Wael Wael Abo Hamza (Course Ecommerce)
// ==========================================================

define("MB", 1048576);

function filterRequest($requestname)
{
  return  htmlspecialchars(strip_tags($_POST[$requestname]));
}

function getAllData($table, $where = null, $values = null)
{
    global $con;
    $data = array();
    $stmt = $con->prepare("SELECT  * FROM $table WHERE   $where ");
    $stmt->execute($values);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $dataView = array();

    $count  = $stmt->rowCount();
    if ($count > 0){
        $dataView = json_encode(array("status" => "success", "data" => $data));
      //  echo $dataView;
    } else {
        $dataView = json_encode(array("status" => "failure"));
        //echo $dataView;
        
    }
   
    return $dataView;
}

function insertData($table, $data, $json = true)
{
    global $con;
    foreach ($data as $field => $v)
        $ins[] = ':' . $field;
    $ins = implode(',', $ins);
    $fields = implode(',', array_keys($data));
    $sql = "INSERT INTO $table ($fields) VALUES ($ins)";

    $stmt = $con->prepare($sql);
    foreach ($data as $f => $v) {
        $stmt->bindValue(':' . $f, $v);
    }
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($json == true) {
    if ($count > 0) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "failure"));
    }
  }
    return $count;
}


function updateData($table, $data, $where, $json = true)
{
    global $con;
    $cols = array();
    $vals = array();

    foreach ($data as $key => $val) {
        $vals[] = "$val";
        $cols[] = "`$key` =  ? ";
    }
    $sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where";

    $stmt = $con->prepare($sql);
    $stmt->execute($vals);
    $count = $stmt->rowCount();
    if ($json == true) {
    if ($count > 0) {
        echo json_encode(array("status" => "success"));
    } else {
        echo json_encode(array("status" => "failure"));
    }
    }
    return $count;
}

function deleteData($table, $where, $json = true)
{
    global $con;
    $stmt = $con->prepare("DELETE FROM $table WHERE $where");
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($json == true) {
        if ($count > 0) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "failure"));
        }
    }
    return $count;
}

function imageUpload($imageRequest)
{
  global $msgError;
  $imagename  = rand(1000, 10000) . $_FILES[$imageRequest]['name'];
  $imagetmp   = $_FILES[$imageRequest]['tmp_name'];
  $imagesize  = $_FILES[$imageRequest]['size'];
  $allowExt   = array("jpg", "png", "gif", "mp3", "pdf");
  $strToArray = explode(".", $imagename);
  $ext        = end($strToArray);
  $ext        = strtolower($ext);

  if (!empty($imagename) && !in_array($ext, $allowExt)) {
    $msgError = "EXT";
  }
  if ($imagesize > 2 * MB) {
    $msgError = "size";
  }
  if (empty($msgError)) {
    move_uploaded_file($imagetmp,  "../upload/" . $imagename);
    return $imagename;
  } else {
    return "fail";
  }
}



function deleteFile($dir, $imagename)
{
    if (file_exists($dir . "/" . $imagename)) {
        unlink($dir . "/" . $imagename);
    }
}

function checkAuthenticate()
{
    if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {
        if ($_SERVER['PHP_AUTH_USER'] != "wael" ||  $_SERVER['PHP_AUTH_PW'] != "wael12345") {
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Page Not Found';
            exit;
        }
    } else {
        exit;
    }

    // End 
}


function ifFound($count){
    
    if($count > 0){
        return array(true,"message"=>"found");
    }else{
        return array(false,"message"=>"not found");
    }

}


function sqlExec($st){
    global $con;
    $stmt = $con->prepare($st);
    $stmt->execute();
    
    $count = $stmt->rowCount();
     $outp = $stmt->fetchAll(PDO::FETCH_ASSOC);

     $res = array("count"=>$count, "data"=>$outp);
     //print_R($res);
    return $res;
}


function echo_json($res){
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
}

function echo_json_msg_status($message, $status){

    $res = ['status'=>$status, "message"=>$message];
    echo json_encode($res, JSON_UNESCAPED_UNICODE);
}

function getNextDateForRenew($lastDate, $selectedOfferIndex){

    $offers = array(
        ["name" => "Free trial", "days" => 7, "cost"=>0], //days

        ["name"=>"1 month 1 EGP", "days" => 30, "cost"=>1],
        
        ["name"=>"6 months 5 EGP", "days" => 180, "cost"=>5],
        
        ["name"=>"12 months 10 EGP", "days" => 356, "cost"=>10],
       
    );

    $date = $lastDate; // Y-m-d
    $date->add(new DateInterval('P'.$offers[$selectedOfferIndex]['days'].'D'));
    return ['date' => $date->format('Y-m-d'), "offer"=>$offers[$selectedOfferIndex]];
}

function getDaysOfDates($startDate, $endDate){
    
    $diff = date_diff($startDate,$endDate);
    $diffIndays = $diff->format("%a"); // convert it to string 

    return $diffIndays;
}