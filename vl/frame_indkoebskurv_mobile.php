<?php if(session_id() == '') {
    session_start();
}?>
<html>

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
   <link rel="stylesheet" type="text/css" href="../styles_mobile.php"> 
</head>
<body>
<?php


?>


    <div id="top"> 
    
    <?php
    include 'top_mobile.php';
    ?>
     </div>
  

   
    
    <div id="menu">
       <?php
        include 'vis_menu_mobile.php';
        ?>
        </div>
    
   
     
    <div id="indhold">
        <?php
        include 'kurv_oversigt.php';
        ?>    
        </div>
    
         
         
</body>  

</html>