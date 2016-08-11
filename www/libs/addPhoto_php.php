<?php

session_start();

ini_set('display_errors','on');
error_reporting(E_ALL);
        
//Connexion bdd
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=cesure;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    $e->getMessage();
}

if(isset($_SESSION['id']))
{
    $id_membre = $_SESSION['id'];
}

//Testons si le fichier photo a bien été envoyé et si il n'y a pas d'erreurs
if(isset($_FILES['photo']) AND $_FILES['photo']['error'] == 0)
{
    //Test fichier pas trop gros ! (on limite à cbn ? )
    /*
    if($_FILES['photo']['size'] <= 1000000) 1 Mo a peu pres ici 
    {
    */
        //Test extension autorisé
        //1. strrchr renvoie l'extension avec le point (« . »).
        //2. substr(chaine,1) ignore le premier caractère de chaine.
        //3. strtolower met l'extension en minuscules.
        $extension_upload = strtolower(  substr(strrchr($_FILES['photo']['name'], '.'),1));
        $extensions_valides = array('jpg', 'jpeg', 'gif', 'png');
       
        if(in_array($extension_upload, $extensions_valides))
        {
            /*Il faut miniaturiser le fichier*/
            
            //On peut valider le fichier et le stocker définitivement
             
            $nom = "../photos/{$id_membre}.{$extension_upload}";
            $mini_nom = "../photos/mini_{$id_membre}.{$extension_upload}";
            
            $resultat = move_uploaded_file($_FILES['photo']['tmp_name'], $nom);
            if($resultat) echo 'transfert de la photo réussi';
                else echo'Transfert échoué'; //Possibilité d'afficher la raison de l'erreur pour l'utilisateur
            
            echo '<br>'.$_FILES['photo']['tmp_name'].'<br>'.$nom.'<br>';
            //Miniaturisation
            $image_source = "../photos/{$id_membre}.{$extension_upload}" ;
            
            $largeur_destination = 100; //100 150 wasnt so bad
            $hauteur_destination = 150;
            
            
           $im = ImageCreateTrueColor($largeur_destination,$hauteur_destination)
                or die("Erreur lors de la création de l'image");
            
            $source = ImageCreateFromJpeg($image_source);
            
            $largeur_source = imagesx($source);
            $hauteur_source = imagesy($source);
            
            ImageCopyResampled($im,$source,0,0,0,0,$largeur_destination,$hauteur_destination,$largeur_source,$hauteur_source);
            
            $miniature = "mini_{$id_membre}.{$extension_upload}";
            ImageJpeg($im,$miniature);
            echo "image miniature genere:$miniature";
            
            if(!rename($miniature,$mini_nom))
                echo '<br>failed to cut/paste';
            unlink($nom);
            
            header('Location : ../modules/profil.php');
        }
        
}
?>
