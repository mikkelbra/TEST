
<html>

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    
</head>
<body>
<?php
$opretbruger=0;
$findes=0;
$kundeoplysninger=0;
// Tjekker om der ønskes at oprette en ny bruger, eller blot at logge ind. Indhold ændrer sig udfra hvad man har valgt
if (isset($_GET["opretbruger"])){
$opretbruger=$_GET["opretbruger"];
}
if (isset($_GET["findes"])){
$findes=$_GET["findes"];
}
if (isset($_GET["kundeoplysninger"])){
$kundeoplysninger=$_GET["kundeoplysninger"];
}


?>
<link rel="stylesheet" type="text/css" href="../styles.php">

<div id="top"> 
    
    <?php
    include 'top.php';
    ?>
     <div>
  
<div id="content">
    <div id="overskrift">
       <?php
        include 'overskrift.php';
        ?>
        </div>
    <div id="menu">
       <?php
        include 'vis_menu.php';
        ?>
        </div>
   
    <div id="venstre">
     <?php
        include 'venstre.php';
        ?>
        </div> 
    <div id="indhold">
        <?php
        if($kundeoplysninger==1){ include 'indtast_kundeoplysninger.php'; }
            else {if($opretbruger==1 || $findes==1){include 'opret_kunde.php';}
                     else {include 'login_kunde.php';}}
        ?>    
        </div>
    </div>
         
         
</body>  

</html>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>