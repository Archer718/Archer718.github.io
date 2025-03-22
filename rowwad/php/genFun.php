
<?php


$genTableName = '';
$genTitle = '';

$requestFile = '';



function drawElement($dataKey, $icon, $title, $keyName){
    
    global $alertIcon;
    global $alertTitle;
    global $alertDialogContent;
    global $alertContentArray;
    global $alertContentArrayKey;
    


    $string = $dataKey;
    $delimiter = "\n";

    // Split the string into an array
    $array = explode($delimiter, $string);
    $alertContentArray[$keyName] = $array;

    // Use a for loop to iterate through the array
    $len = count($alertContentArray[$keyName]);
    // $limit = 10;
    // $viewCount = $len;
    // if($len > $limit){
    //     $viewCount = $limit;
    // }
    echo '<h3 class="itemTitle">' . '('.  $len .')  من  '. $title . '</h3>';     
    for ($i = 0; $i < $len; $i++) {
        echo '<p class="itemTitle"> <i class="fas ' . $icon . ' itemIcons"></i> ' . $alertContentArray[$keyName][$i] . "</p>";
    }
            
    // if($len > $limit){
    //     for ($i = 0; $i < $len; $i++) {
    //         $alertDialogContent .= '<p class="itemTitle"> <i class="fas ' . $icon . ' itemIcons"></i> ' . $alertContentArray[$keyName][$i] . "</p>";
    //     }
    //     echo "<button class='alertButton' onclick='openDialog(\"". $title ."\",\"" . $icon. "\",\"" . $keyName. "\")'> عرض الجميع (". count($alertContentArray[$keyName]).") <i class='fa-solid fa-up-right-and-down-left-from-center'></i></button>";
    //     //$alertTitle = 'مناقشات الرسائل العلمية';
    //     //$alertIcon = '<i class="fas ' . $icon . ' itemIcons"></i>';
        
       
       
    // }
   
  

}

?>