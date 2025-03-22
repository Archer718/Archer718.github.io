
<?php

$nname = $_GET['name'];

if($nname == 't'){
    include 'tazker/tazker.html';
}else{
    include 'rowwad/web/index.html';
}

?>