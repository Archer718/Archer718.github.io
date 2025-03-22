

//alert('sld');



function openDialog(title, icon, key){
    document.getElementById('alertDialog').style.display = 'flex';
    var alertTite = document.getElementById('alertTitle');
    var alertContent = document.getElementById('alertContent');
    var iconData =  "<i class='fas " + icon + " itemIcons'></i>";
    //var content = '';
    
    alertTite.innerHTML = iconData + "  " + title;

    //alertContent.innerHTML = "<?php echo $alertContentArray['" + key + "']?>";
    

}

// document.getElementById('closeDialog').addEventListener('click', function() {
//     document.getElementById('alertDialog').style.display = 'none';
// });

// document.getElementById('alertDialog').addEventListener('click', function() {
//     document.getElementById('alertDialog').style.display = 'none';
// });

document.getElementById('menuButton').addEventListener('click', function() {
   
    var drawerBer = document.getElementById('drawerBer');

    if (drawerBer.style.display === 'flex') {
       
        drawerBer.style.display = 'none';
    } else {
       
        drawerBer.style.display = 'flex';
    }
});



function closeDrawer(){
    //alert('sd');
    var drawerBer = document.getElementById('drawerBer');
    console.log(drawerBer.style.display);
    console.log(drawerBer.style.display === 'flex');
    if (drawerBer.style.display === 'flex') {
       
        drawerBer.style.display = 'none';
        console.log("do action");
    } else {
        console.log("don't action");
        drawerBer.style.display = 'flex';
    }
}