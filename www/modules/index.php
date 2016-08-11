<!--

<?php
session_start();
if(isset($_COOKIE['email']) AND isset($_COOKIE['mdp']))
{
    //Il faut le connecter directement en l'envoyant sur la page d'acceuil du membre connecté
}

?>
-->

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
        <meta charset="UTF-8">
        <title>Cesure Map</title>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, user-scalable=no">
        <style>
                @-ms-viewport { width: 100vw ; min-zoom: 100% ; zoom: 100% ; }          @viewport { width: 100vw ; min-zoom: 100% zoom: 100% ; }
                @-ms-viewport { user-zoom: fixed ; min-zoom: 100% ; }                   @viewport { user-zoom: fixed ; min-zoom: 100% ; }

        </style>

    </head>

    <body id="home" class="v2">


        <!-- en tete -->
        <?php include('../includes/entete.php');?>
        
        <!-- Menu -->
        
        <?php include('../includes/menu_non_membre.php');?>

        <article id="art_orange">
            <?php include('../modules/connexion.php'); ?>
        </article>
        <article id="art_pont">
        </article>
        <!-- Pied de page -->
        <?php include('../includes/pieddepage.php');?>

    </body>

</html>