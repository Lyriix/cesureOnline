<?php 
if (!isset($_SESSION)) { session_start(); }
// Vérification de l'authentification de l'utilisateur 
//Connexion à la bdd 
try
{
    $bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u751124898_cesur;charset=utf8','u751124898_root','Cg141294',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    $e->getMessage();
}



$email = htmlspecialchars($_POST["email"]);

//hachage du mot de passe 
if($_POST['mdp'] != '0000')
{
$mdp_hache = sha1($_POST['mdp']);
}
else
{
    $mdp_hache = $_POST['mdp']; //pour que ceux qui recoivent 0000 comme mdp par défaut puissent se connecter et le changer
}
//vérification des identifiants

$req = $bdd->prepare('SELECT id, prenom FROM tab_eleve WHERE email = :email AND mdp = :mdp');
$req->execute(array(
            'email'=> $email,
            'mdp' => $mdp_hache));

$resultat = $req->fetch(); //Une seule ligne car oui on est censé n'avoir qu'un resultat dans la requete au maximum

if(!$resultat) //Si on a pas de resultat 
{
    echo 'Mauvais identifiant ou mot de passe';
}
else
{
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['email'] = $email;
    $_SESSION['nom'] = $resultat['prenom'];
    
    /*Connexion automatique */
    
    if(isset($_POST['connexion_automatique']) )
    {
        setcookie('email',$email,time()+365*24*3600,null,null,false,true);
        setcookie('mdp',$mdp_hache,time()+365*24*3600,null,null,false,true);
    }
    
    header('Location: ../modules/acceuil.php',true);/*********************/
   // echo 'vous êtes connecté(e)'; 
}
?>