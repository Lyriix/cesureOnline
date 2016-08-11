<?php
if (!isset($_SESSION)) { session_start(); }
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
        

if(isset($_POST['old']) )
{
    if($_POST['old'] != '0000')
    {
        $old = sha1($_POST['old']);
    }
    else
    {
        $old = $_POST['old'];
    }
}

if(isset($_POST['new']))
{
    $new = sha1($_POST['new']);
}

if(isset($_POST['confirm_new']))
{
    $confirm_new = sha1($_POST['confirm_new']);
}

$req = $bdd->prepare('SELECT mdp FROM tab_eleve WHERE id = :id');
$req->execute(array('id' => $_SESSION['id']));
$rep = $req->fetch();

//Vérification que l'ancien est le bon 
if($rep['mdp'] == $old AND $new == $confirm_new)
{
    //Modification du mot de passe 
    $req=$bdd->prepare('UPDATE tab_eleve SET mdp=:new WHERE id=:id');
    $req->execute(array(
                    'new'=>$new,
                    'id' =>$_SESSION['id']));
}
else
{
    echo 'Mauvais mot de passe ou les 2 nouveaux ne correspondent pas <br>';
}

header('Location:../modules/acceuil.php',true);
?>