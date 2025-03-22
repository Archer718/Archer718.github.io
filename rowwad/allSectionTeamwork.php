<!DOCTYPE html>
<html lang="ar">
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//include '../functions.php';
include 'php/connect.php';

$tableName = $_GET['tableName'];
$title = $_GET['title'];


// $tableName = 'doctors';
// $title = 'اساتذة الجامعة';

$checkFoundSql = "SELECT `id`, `name`,`title`,`photo`,`sections` FROM `$tableName`";

$exc = sqlExec($checkFoundSql);

$count = $exc['count'];
$data = $exc['data'];

$fullTitle = $title;

$requestFile = '';

if($tableName == 'doctors'){
    $requestFile = 'pages/doctorsCV.php';
}else if($tableName == 'lawyers'){
    $requestFile = 'pages/lawyersCV.php';
}else if($tableName == 'security'){
    $requestFile = 'pages/security.php';
}

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title<?php echo $fullTitle ?></title>
    <link rel="stylesheet" href="styles/allsectionTeamworkStyle.css">
</head>
<body dir="rtl">
<div class="app-bar">
        <div class="logo-title">
            <img src="assets/images/logo.png" alt="Logo" class="logo">
            <p><?php echo $fullTitle;?></p>
            <!-- <span class="title">My Website</span> -->
            
        </div>
        
</div>
  


    <div class="content">


        <?php

            $sectionIndex2 = 0;
            $glDiv  = "<div class='gallery-container' id='section$sectionIndex2'>";
            $glDiv .= " <p></p>";
            $glDiv .= "<div class='gallery'>";
            for($i=0; $i<$count; $i++){

               
                //$glDiv .= "<h2>$section</h2>";
                
                $glDiv .= " <a href='$requestFile?id=" . $data[$i]['id']. "'><div class='gallery-item'>";

                $glDiv .= " <img src='" . $data[$i]['photo'] ."' alt='صورة 1'>";
                $glDiv .= "  <h2>". $data[$i]['name'] ."</h2>";
                $glDiv .= " <p>" . $data[$i]['title'] ."</p>";



               
                $glDiv .= "</div></a>";
                
               
                
               
                
            }
            $glDiv .= "</div>";
            $glDiv .= "</div>";
            echo $glDiv;
       ?>
            
            
    </div>
    <script src="script.js"></script>
</body>
</html>
