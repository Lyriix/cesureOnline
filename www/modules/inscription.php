<!DOCTYPE html>
<html>
<head>
    <title>Blank Standard HTML5 Web App Template</title>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/general.css">
        <link rel="stylesheet" type="text/css" href="css/includes.css">
        <link rel="stylesheet" type="text/css" href="css/form.css">
        <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel=stylesheet type=text/css href="../css/connexion.css">
   
        
    <!-- see http://webdesign.tutsplus.com/tutorials/htmlcss-tutorials/quick-tip-dont-forget-the-viewport-meta-tag -->
    <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1, user-scalable=no">
    <style>
        /* following two viewport lines are equivalent to meta viewport statement above, needed for Windows */
        /* see http://www.quirksmode.org/blog/archives/2014/05/html5_dev_conf.html and http://dev.w3.org/csswg/css-device-adapt/ */
        @-ms-viewport { width: 100vw ; min-zoom: 100% ; zoom: 100% ; }  @viewport { width: 100vw ; min-zoom: 100% zoom: 100% ; }
        @-ms-viewport { user-zoom: fixed ; min-zoom: 100% ; }           @viewport { user-zoom: fixed ; min-zoom: 100% ; }
    </style>

    <!-- Uncomment the following scripts if you convert your "Standard HTML5" project into a "Cordova" project. -->
    <!-- <script src="cordova.js"></script> -->          <!-- phantom library, needed for Cordova api calls, added during build -->
    <!-- <script src="js/app.js"></script> -->           <!-- recommended location of your JavaScript code relative to other JS files -->
    <!-- <script src="xdk/init-dev.js"></script> -->     <!-- normalizes device and document ready events, see README for details -->
</head>

<body>

    <?php include('../includes/entete.php')?>
    <?php include('../includes/menu_non_membre.php')?>
    
    
    <form method=post action=/www/libs/inscription_php.php style="margin-top:15vh">
        <p>
            <label for="email">Email (il s'agira de votre identifiant)</label>
            <input type="email" name="email" value="" placeholder="prenom.nom@cpe.fr" required>            
        </p>
        <p>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" required>
        </p>
        <p>
            <label for="password_conf">Confirmer le Mot de passe</label>
            <input type="password" name="password_conf" required>
        </p>
        <p>
            <label for="nom">Nom</label>
            <input type=text name="nom" placeholder="Girot" required>
        </p>
        <p>
            <label for="prenom">Prénom</label>
            <input type=text name="prenom" placeholder="Charly" required>
        </p>
        <p>
            <label for="filiere">Filiere</label>
            <select name="filiere" id="filiere">
                <option class="filiere" value="ETI">ETI</option>
                <option class="filiere" value="CGP">CGP</option>
                <option class="filiere" value="IRC">IRC</option>
            </select><br>
        </p>
        <p>
            <label for="annee">Annee</label>
            <select name="annee" id="annee">
                <option class="annee" value="3">3</option>
                <option class="annee" value="4">4</option>
                <option class="annee" value="5">5</option><br>
            </select>
        </p>
        <p>
            <input type=submit value="S'inscrire">
        </p>
    </form>
   
<?php include('../includes/pieddepage.php')?>
</body>
</html>
