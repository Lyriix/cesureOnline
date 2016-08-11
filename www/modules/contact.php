<?php
    if (!isset($_SESSION)) { session_start(); }
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
        <script>
            function popup()
            {
                alert("Votre message à été envoyé !"); // this is the message in ""
            }
        </script>
    </head>

    <body id="home" class="v2">
        <!-- en tete -->
        <?php 
        include('../includes/entete.php');
        echo 'a';
        // Menu 
        
        if(!isset($_SESSION['nom']))
        {
            include('../includes/menu_non_membre.php');
        }
        else
        {
            include('../includes/menu_membre.php');
        }
        ?>
        
<article id=art_orange>
        <form class="connexion" method="post" action="MAILTO:someone@example.com" enctype="text/plain">
            <p>
                <label for="name">Nom</label>
                <input type="text" name="name">
            </p>
            <p>
                <label for="prenom">Prénom</label>
                <input type=text name="prenom">
            </p>
            <p>
                <label for="email">Votre Email</label>
                <input type="text" name="email">
            </p>
            <p>
                <label for="subject">Sujet/Objet</label>
                <input type="text" name="subject">
            </p>
            <p>
                <label for="message">Votre message</label>
                <textarea name="message" rows="15" cols="60" ></textarea>
            </p>
            <!-- Ici pourra être ajouté un captcha anti-spam (plus tard) -->
            <p>
                <input type=submit  onclick="mail()" name=submit value="Envoyer le message">
            </p>
        
        <p> Pour fonctionner, vous devez avoir configuré un logiciel d'envoi d'email (Outlook, Mail OSx ...)</p>
        <p> Autrement contacter directement : someone@exampple.com</p>
        </form>
        </article> 

        <!-- Pied de page -->
        <?php include('../includes/pieddepage.php');?>

    </body>

</html>