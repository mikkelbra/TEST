<html>

<head>
   
    
</head>
<body>
<?php
require 'fl/fl_Mikkel_test.php';
session_start();
$gruppenr = $_GET['gruppe'];
   $side = $_GET['page'];
  

?>
<link rel="stylesheet" type="text/css" href="styles.php">

<div id="top"> 
    
    <?php
    include 'vl\top.php';
    ?>
     <div>
  
<div id="content">
    <div id="overskrift">
       <?php
        include 'vl\overskrift.php';
        ?>
        </div>
    <div id="menu">
       <?php
        include 'vl\vis_menu.php';
        ?>
        </div>
   
    <div id="venstre">
     <?php
        include 'vl\venstre.php';
        ?>
        </div> 
    <div id="indhold">
        <?php
        include 'vl\vis_katalog.php';
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