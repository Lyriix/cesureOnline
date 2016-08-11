<?php
    if (!isset($_SESSION)) { session_start(); }
    if(!isset($_SESSION['nom']))
    {
       // echo "<p style=font-size:30px>Vous n'etes pas connecté, vous devez être connecté pour acceder à cet espace</p>";
        //echo "<p style=font-size:30px><a  href='/www/modules/index.php'>Retourner à l'acceuil</a></p>";
        header("Location:../modules/index.php",true);
}
?>
<!DOCTYPE html>
<html>
    <!--
  * Please see the included README.md file for license terms and conditions.
  -->

    <head>
        <link rel="stylesheet" type="text/css" href="/www/css/general.css">
        <link rel="stylesheet" type="text/css" href="/www/css/includes.css">
        <link rel="stylesheet" type="text/css" href="/www/css/form.css">
        <link rel="stylesheet" type="text/css" href="/www/css/menu.css">
        <title>Cesure Map</title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">


        <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, user-scalable=no">

        <style>
                @-ms-viewport { width: 100vw ; min-zoom: 100% ; zoom: 100% ; }          @viewport { width: 100vw ; min-zoom: 100% zoom: 100% ; }
                @-ms-viewport { user-zoom: fixed ; min-zoom: 100% ; }                   @viewport { user-zoom: fixed ; min-zoom: 100% ; }
        </style>
        
        <script type="application/javascript">
            $.afui.autoLaunch = false; //By default, it is set to true and you're app will run right away.  We set it to false to show a splashscreen
            /* This function runs when the content is loaded.*/
            $.afui.useOSThemes=false;
             $(document).ready(function(){
                setTimeout(function(){
                    $.afui.launch();
                },1500);
            });
        </script>
    </head>

    <body id="home" class="v2">
       
        <!-- en tete -->
        <?php include('../includes/entete.php');?>
        <?php echo 'a';?>
        <!-- Menu -->
        <?php include('../includes/menu_membre.php');?>

        
        <!-- Affichage des données include Php -->
        <?php include('../libs/listing_php.php'); ?>
        
        <!-- Pied de page -->
        <?php include('../includes/pieddepage.php');?>

    </body>

</html>