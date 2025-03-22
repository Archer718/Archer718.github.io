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

$checkFoundSql = "SELECT `id`,`name`,`title`,`photo`,`sections` FROM `$tableName`";

$exc = sqlExec($checkFoundSql);

$count = $exc['count'];
$data = $exc['data'];

$fullTitle =  $title;

$sectionsStr = '';

$sections = array();

for($i=0; $i<$count; $i++){

    $temp = $data[$i]['sections'];

    $tempt = rtrim($temp, "\r");
    
    $sectionsArr = explode("\n", $tempt);

    for($i2=0; $i2<count($sectionsArr); $i2++){
        $sectionsArr[$i2] = rtrim($sectionsArr[$i2], "\r");
        $sectionsStr .= $sectionsArr[$i2] . "\n";
    }
 
}



$sectionsArr = explode("\n", $sectionsStr);
    
array_push($sections, $sectionsArr);


$sections = array_unique($sections[0]);


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
    <title><?php echo $fullTitle; ?></title>
    <link rel="stylesheet" href="styles/sectionsGellaryStyle2.css">
</head>
<body dir="rtl">
<div class="app-bar">
        <div class="logo-title">
            <img src="assets/images/logo.png" alt="Logo" class="logo">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
            <button id="menuButton" class="menu-button">&#9776;</button>
            <!-- <span class="title">My Website</span> -->
            
        </div>
        
        <div class="nav-links">
        <?php
             echo '<a href="allSectionTeamwork.php?tableName=' . $tableName . '&title=' . $title . '"> عرض جميع التخصصات </a>'; 
        ?>
        <?php
            $sectionIndex = 0;
            foreach ($sections as $section) {
               
                if($sectionIndex < count($sections)-1){
                    $sectionId = 'section' . strval($sectionIndex);
                    echo '<a href="#'. $sectionId . '">'. $section .' </a>';
                    $sectionIndex ++;
                }
                
               
            }
            ?>
        </div>
        <div class='drawerBer' id='drawerBer' onclick='closeDrawer()'>
        <div id="drawer" class="drawer">
           
            <center>
        <img src="assets/images/logo.png" alt="Logo"  width='110' height='110'>
        </center>
        <?php
             echo '<a href="allSectionTeamwork.php?tableName=' . $tableName . '&title=' . $title . '"> عرض جميع التخصصات </a>'; 
        ?>
        <?php
            $sectionIndex = 0;
            foreach ($sections as $section) {
               
                if($sectionIndex < count($sections)-1){
                    $sectionId = 'section' . strval($sectionIndex);
                    echo '<a href="#'. $sectionId . '">'. $section .' </a>';
                    $sectionIndex ++;
                }
                
               
            }
            ?>
        
    </div>
    </div>
</div>
   
    <div class="content">

   <div class='showAll'>
        <?php
             echo '<a href="allSectionTeamwork.php?tableName=' . $tableName . '&title=' . $title . '"> عرض جميع التخصصات </a>'; 
        ?>
           
        
    </div>

        <?php


       
        
            $sectionIndex2 = 0;
            foreach ($sections as $section) {
                if($sectionIndex2 < count($sections)-1){

               
                $glDiv  = "<div class='gallery-container' id='section$sectionIndex2'>";
                $glDiv .= "<h2>$section</h2>";
                $glDiv .= " <p></p>";
                $glDiv .= "<div class='gallery'>";

                $getDocotorSectionsSql = "SELECT `id`, `name`,`title`,`photo`,`sections` FROM `$tableName` where `sections` like '%$section%'";

                $exc2 = sqlExec($getDocotorSectionsSql);
                
                $drCount = $exc2['count'];
                $drData = $exc2['data'];
                
                for($i=0; $i<$drCount; $i++){
                   
                    $glDiv .= " <a href='$requestFile?id=" . $drData[$i]['id']. "'><div class='gallery-item'>";

                    $glDiv .= " <img src='" . $drData[$i]['photo'] ."' alt='صورة 1'>";
                    $glDiv .= "  <h2>". $drData[$i]['name'] ."</h2>";
                    $glDiv .= " <p>" . $drData[$i]['title'] ."</p>";



                   
                    $glDiv .= "</div></a>";
                    

                }

                $glDiv .= "</div>";
                $glDiv .= "</div>";
                echo $glDiv;
                $sectionIndex2 ++;
            }
            }
           
       ?>
        
        
    </div>
    <script src="script.js"></script>
</body>
</html>
