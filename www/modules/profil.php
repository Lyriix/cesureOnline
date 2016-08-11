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
        <!-- Menu -->
        <?php include('../includes/menu_membre.php');?>

        
        <?php
        
        //Connexion bdd
        try
        {
            $bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u751124898_cesur;charset=utf8','u751124898_root','Cg141294',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            $e->getMessage();
        }
        
        //Affichage des informations du membres
        
        
        ?>
            
        
        <?php
        $req = $bdd->prepare('SELECT nom,prenom,email,filiere,num_cesure FROM tab_eleve WHERE id=:id');
        $req->execute(array('id' => $_SESSION['id']));
        $rep = $req->fetch();
        
        ?>
        <article id=art_orange>
            <section>
            <header>Vos informations personnelles</header>
            <p > Votre adresse email est : <?php echo $_SESSION['email']; ?> </p>
            <p >Votre Nom : <?php echo $rep['nom'];?> </p>
            <p >Votre Prénom : <?php echo $rep['prenom'];?> </p>
            <p >Votre Filière : <?php echo $rep['filiere'];?> </p>
            <p ><a href="changePassword.php">Changer mot de passe</a> </p>
            <aside>
                <form method=post action="/www/libs/addPhoto_php.php" enctype="multipart/form-data">
                    <input type=file name="photo">
                    <input type=submit value="AjouterPhoto">
                </form>
            </aside>
            </section>
            <?php 
            $nom="../photos/mini_{$_SESSION['id']}.jpg";
                echo '<aside>';
            print '<img src="'.$nom.'" alt="photo de profil">'; 
                echo '</aside>'
            ?>
                
        </article>
        
        

        <!-- Pied de page -->
        <?php include('../includes/pieddepage.php');?>

    </body>

</html>