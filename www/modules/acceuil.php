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
<html lang="fr">
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
        
        
    </head>

    <body id="home" class="v2">
        <!-- en tete -->
        <?php include('../includes/entete.php');?>
        <?php echo 'a';?>
        <!-- Menu -->
        <?php include('../includes/menu_membre.php');?>

        
        <article id="art_orange">
        <ul>
            <li><p>#TODO :</p></li>
            <li><p> Renaming des pages </p></li>
            <li><p> Envoi sur serveurs</p></li>
            <li><p> Vérification de sécurité / protection d'acces à la bdd ...</p></li>
            <li><p> Mentions Légales, Copyright ?</p></li>
            <li><p> Ajout des cartes </p></li>
            <li><p>.htaccess???</p></li>
        </ul>
            <?php include('../libs/acceuil_php.php'); ?>
        </article>
        <article id="art_pont">
        </article>

        <!-- Pied de page -->
        <?php include('../includes/pieddepage.php');?>

    </body>

</html>