<?php 
// Lavet af Mikkel
?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
<h1>Ordre oversigt: </h1>
<a href="admin_menu.php">Menu</a><br>
<br>
<button onclick="print()">Print siden</button>
<center>
    <h4> <a href="tjek_ordre.php?type=1">Ikke påbegyndte ordre</a>   -   <a href="tjek_ordre.php?type=2"> Påbegyndte ordre</a>   -   <a href="tjek_ordre.php?type=3"> Behandlede ordre</a></h4>
</center>
<strong>
    <?php
    require '../fl/get_ordre.php';
    $type = 1;

    if (isset($_GET["type"])) {
        $type = $_GET["type"];
    }

    $ordre = hent_ordre_ikke_begyndt();
?> <div id="print"> <?php
    if ($type == 1) {
        $ordre = hent_ordre_ikke_begyndt();
        echo "Ikke påbegyndte ordre:";
    } else if ($type == 2) {
        $ordre = hent_ordre_begyndt();
        echo "Påbegyndte ordre:";
    } else if ($type == 3) {
        $ordre = hent_ordre_afsluttet();
        echo "Behandlede ordre:";
    }


    $rnr = 0;
    $knr = 0;
    ?>
</strong>
<table style="width:100%" id="kurv">
    <?php
    foreach ($ordre as $rn) {
        ?>
        <tr class="ordre">
            <td>
                <a href="tjek_ordre_id.php?id=<?php echo $ordre[$rnr][0]; ?>"> Se ordre</a>  - 
               <?php echo $ordre[$rnr][3]; ?>
            </td>
            <td>Ordre id</td>
            <td>Kunde</td> 
        </tr>
    <?php
    foreach ($ordre[$rnr] as $rn) {
        if ($knr == 0) {
            ?> <tr> 
                    <td>
                      <?php
                if ($type == 1) {
                    ?> 

                    <form action="../fl/set_pakning.php" method="POST">
                        <input type="hidden" name="type_pak" value="start">
                        <input type="hidden" name="ordre_id" value="<?php echo $ordre[$rnr][0]; ?>">
                        <input type="submit" value="Begynd pakning">
                    </form>
                    <?php
                } else if ($type == 2) {
                    
                
                ?> 
                <form action="../fl/set_pakning.php" method="POST">

                    <input type="hidden" name="type_pak" value="slut">
                    <input type="hidden" name="ordre_id" value="<?php echo $ordre[$rnr][0]; ?>">
                    <input type="submit" value="Afslut pakning">
                </form>
                 <?php
                 }
                 else{
                     echo "Ordre er afsluttet";
                 }
                ?>    
                    </td>
                    <td>
            <?php echo ($ordre[$rnr][0]); ?>
                    </td>
                    <td>
            <?php echo ($ordre[$rnr][1]); ?> 
                    </td>
                </tr> 
            <?php
        }

        if ($knr == 0) {
            ?>
                <tr class="variant">
                    <td>Variant id</td>
                    <td>Antal</td> 
                    <td>Navn</td>
                    <td>Variant</td> 
                    <td>Farve</td>
                    <td>Mærke</td>
                    <td>Pris</td>
                </tr>
            <?php
            $ind_rnr = 0;
            $ind_knr = 0;
            foreach (hent_ordre_information($ordre[$rnr][$knr]) as $r) {
                ?> <tr> <?php
                    foreach (hent_ordre_information($ordre[$rnr][$knr])[$ind_rnr] as $r) {
                        ?> <td><?php
                            echo hent_ordre_information($ordre[$rnr][$knr])[$ind_rnr][$ind_knr];
                            $ind_knr++;
                            ?> </td><?php
                            }
                            $ind_knr = 0;
                            $ind_rnr++;
                        }
                        ?> </tr> <?php
                    $ind_rnr = 0;
                    $knr++;
                }
            }
            $knr = 0;
            $rnr++;
        }
        ?>
                <div>
    <script>
        function print() {
            // window.print();
             var prtContent = document.getElementById("print");
var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();

        }
    </script>
    
<style>
#kurv {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    width: 100%;
    border-collapse: collapse;
}

#kurv td, #kurv th {
    font-size: 1em;
    border: 1px solid #D1D1D8;
    padding: 3px 7px 2px
}

#kurv th {

    background-color: #D1D1D8;
   
}

#kurv tr.ordre td {
    
    background-color: #BCBCC2;
}

#kurv tr.variant td {
   
    background-color: #E8E8F0;
}
</style>