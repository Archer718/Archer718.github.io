


<!DOCTYPE html>
<html lang="en">
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//include '../functions.php';
include '../php/connect.php';

$doctorId = $_GET['id'];

$checkFoundSql = "SELECT * FROM `lawyers` where `id`=$doctorId";

$exc = sqlExec($checkFoundSql);

$count = $exc['count'];
$data = $exc['data'];

$alertDialogContent = '';
$alertTitle = '';
$alertIcon = '';
$alertContentArray = array();
$alertContentArrayKey = '';


include '../php/genFun.php';

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title><?php echo $data[0]['name'] . " - " . $data[0]['title']?></title>
    <link rel="stylesheet" href="styles.css">
   
</head>
<body>
   


<div class="app-bar">
        <div class="logo-title">
            <img src="../assets/images/logo.png" alt="Logo" class="logo">
            <button id="menuButton" class="menu-button">&#9776;</button>
            <!-- <span class="title">My Website</span> -->
            
        </div>
        
        <div class="nav-links">
            <a href="#profile">الرئيسية</a>
            <a href="#qualifies">المؤهلات العلمية</a>
            <a href="#languages">اللغات</a>
            <a href="#eduExp">الخبرات التدريسية</a>
            <a href="#practicalExp">الخبرات العملية</a>
            <a href="#memberships">العضويات المهنية</a>
            <a href="#books">المؤلفات العلمية</a>
            <a href="#discussions">مناقشات الرسائل العلمية</a>
        </div>
        <div class='drawerBer' id='drawerBer' onclick='closeDrawer()'>
        <div id="drawer" class="drawer">
           
            <center>
        <img src="../assets/images/logo.png" alt="Logo"  width='110' height='110'>
        </center>
        <a href="#profile">الرئيسية</a>
        <a href="#qualifies">المؤهلات العلمية</a>
        <a href="#languages">اللغات</a>
        <a href="#eduExp">الخبرات التدريسية</a>
        <a href="#practicalExp">الخبرات العملية</a>
        <a href="#memberships">العضويات المهنية</a>
        <a href="#books">المؤلفات العلمية</a>
        <a href="#discussions">مناقشات الرسائل العلمية</a>
        
    </div>
    </div>
</div>

    <div class="container">
    
        <div class="profile" id='profile'>
          <div class='overlay'>
        <div class='spacer'></div> 
            <img src="<?php echo $data[0]['photo']?>" alt="Profile Picture" class="profile-pic">
            <h1><?php echo $data[0]['name']?></h1>
            <h3><?php echo $data[0]['title']?></h3>
        </div>
        </div>
        
        <div class="qualifies" id='qualifies'>
            <h1><i class="fas fa-graduation-cap"></i> المؤهلات العلمية</h1>
            <hr class='dviderLine'>

            <?php 
            drawElement($data[0]['qualifies'], 'fa-graduation-cap', "المؤهلات العلمية",'qualifies');
        //    $string = $data[0]['qualifies'];
        //    $delimiter = "\n";

        //     // Split the string into an array
        //     $array = explode($delimiter, $string);

        //     // Use a for loop to iterate through the array
        //     for ($i = 0; $i < count($array); $i++) {
        //         echo '<p class="itemTitle"> <i class="fas fa-graduation-cap itemIcons"></i> ' . $array[$i] . "</p>";
        //     }
                    
           ?>
        </div>
        
        <div class="languages" id='languages'>
            <h1><i class="fas fa-globe"></i> اللغات</h1>
            <hr class='dviderLine'>

            <?php 
            drawElement($data[0]['languages'], 'fa-globe', "اللغات",'languages');
        //    $string = $data[0]['languages'];
        //    $delimiter = "\n";

        //     // Split the string into an array
        //     $array = explode($delimiter, $string);

        //     // Use a for loop to iterate through the array
        //     for ($i = 0; $i < count($array); $i++) {
        //         echo '<p class="itemTitle"> <i class="fas fa-globe itemIcons"></i> ' . $array[$i] . "</p>";
        //     }
                    
           ?>
        </div>
        <div class="eduExp" id='eduExp'>
            <h1><i class="fas fa-school"></i> التعامل مع المحاكم</h1>
            <hr class='dviderLine'>

            <?php 
            drawElement($data[0]['exp_court'], 'fa-school', "التعامل مع المحاكم",'exp_court');
        //    $string = $data[0]['edu_exp'];
        //    $delimiter = "\n";

        //     // Split the string into an array
        //     $array = explode($delimiter, $string);

        //     // Use a for loop to iterate through the array
        //     for ($i = 0; $i < count($array); $i++) {
        //         echo '<p class="itemTitle"> <i class="fas fa-school itemIcons"></i> ' . $array[$i] . "</p>";
        //     }
                    
           ?>
        </div>

        <div id="alertDialog" class="alert-dialog">
        <div class="alert-content">
            <h2 id='alertTitle'>title</h2>
            <button id="closeDialog" class='alertButton'>X</button>
            <p id='alertContent'><?php $alertContentArray['discussions']?></p>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 مجموعة الرواد. كل الحقوق محفوظة</p>
    </footer>
    </div>
    
    <script src="../script.js"></script>
</body>
</html>