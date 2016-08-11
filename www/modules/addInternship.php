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
            /* following three (cascaded) are equivalent to above three meta viewport statements */
            /* see http://www.quirksmode.org/blog/archives/2014/05/html5_dev_conf.html */
            /* see http://dev.w3.org/csswg/css-device-adapt/ */
                @-ms-viewport { width: 100vw ; min-zoom: 100% ; zoom: 100% ; }          @viewport { width: 100vw ; min-zoom: 100% zoom: 100% ; }
                @-ms-viewport { user-zoom: fixed ; min-zoom: 100% ; }                   @viewport { user-zoom: fixed ; min-zoom: 100% ; }
                /*@-ms-viewport { user-zoom: zoom ; min-zoom: 100% ; max-zoom: 200% ; }   @viewport { user-zoom: zoom ; min-zoom: 100% ; max-zoom: 200% ; }*/
        </style>

        <script src="cordova.js" id="xdkJScordova_"></script>

        
        <script src="js/app.js"></script>
        <!-- for your event code, see README and file comments for details -->
        <script src="js/init-app.js"></script>
        <!-- for your init code, see README and file comments for details -->
        <script src="xdk/init-dev.js"></script>
        <!-- normalizes device and document ready events, see file for details -->
        <script type="application/javascript" src="lib/jquery.min.js"></script>
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
        <?php include('../includes/entete.php')?>
        
        <!-- Menu -->
        <?php include('../includes/menu_membre.php')?>

<article id="art_orange">
    

    <form class="formulaireAjout" method="post" >
        <header>Ajouter un stage</header>
        <p><label for="nom" id="nom">Nom</label>
        <input type=text name="nom" placeholder="Durand">
        </p>

        <p><label for="prenom" id="prenom">Prenom</label>
        <input type=text name="prenom" placeholder="Jean">
        </p>
        <p> <label for="mail" id="mail">E-Mail</label>
        <input type="email" name="mail" placeholder="jean.durand@cpe.fr" required>
        </p>
        <p>Filière
            <select name="filiere" id="filiere">
                <option class="" value="">Choisissez une Filière</option>
            </select>
        </p>


        <p>Spécialité
            <label for="specialite"></label>
            <select name="specialite" id="specialite">
                <option class="" value="-">-</option>
            </select> 
        </p>
        <p>Stage
                <select name="stage" id="stage">
                    <option class="stage" value="Cesure">Césure</option>
                    <option class="stage" value="PFE">PFE</option>
                    <option class="stage" value="3 mois">Stage 3 mois</option>
                </select>
        </p>
        <p>Zone Géographique
            <label for="zone"></label>
            <select name="Zone Géographique" id="zone">
                <option value="">-</option>
                <option value="europe">Europe</option>
                <option value="amerique-du-nord">Amérique du Nord</option>
                <option value="amerique-du-sud">Amérique du Sud</option>
                <option value="asie">Asie</option>
                <option value="oceanie">Oceanie</option>
            </select>
        </p>

        <p> 
            <label for="descripion" >Déscription du stage</label>
            <textarea rows="20" cols="60" name="description"></textarea>
        </p>

        <input type="submit" value="submit">
        <input type="reset" value="reset">
    </form>
</article>


         <!-- Pied de page -->
        <?php include('../includes/pieddepage.php')?>

        <script src="/www/js/form.js"></script>
    </body>

</html>