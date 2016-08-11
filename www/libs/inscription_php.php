<?php 

/* Réalisation de la procédure d'inscription */

//Conexion à la BDD

try
{
    $bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u751124898_cesur;charset=utf8','u751124898_root','Cg141294',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    $e->getMessage();
}

/*Vérification de la validité des informations*/
//Vérification conformité de l'adresse e-mail (fournit et valide) 
//// FAUT VERIFIER QUIL EXISTE PAS DEJA ...


if(isset($_POST['email']))
{
    if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$_POST['email']))
    {
        $verif_email = $bdd->query('SELECT email FROM tab_eleve');
        while($verif = $verif_email->fetch())
        {
            if($verif['email'] == $_POST['email'])
            {
                echo '<p>Cette adresse e-mail est déja enregistré</p>';
                header('Location: index.php');
                break;
            }
        }
        $email = htmlspecialchars($_POST['email']);
    }
}

//Vérification que le mot de passe est fournit, que les deux champs de mot de passe sont identiques et hachage de securité
if(isset($_POST['password']) AND $_POST['password'] == $_POST['password_conf'])
{
    $mdp_hache = sha1($_POST['password']); //on ne conservera que le mdp hache par soucis de securité
}

//Prenom et nom : première lettre majuscule
if(isset($_POST['nom']))
{
    $nom = ucwords(strtolower(htmlspecialchars($_POST['nom']))); //met la premiere lettre en majuscule et securite 
}

if(isset($_POST['prenom']))
{
    $prenom = ucwords(strtolower(htmlspecialchars($_POST['prenom'])));
}

if(isset($_POST['filiere']))
{
    $filiere = htmlspecialchars($_POST['filiere']);
}



/*
/On possède les variables verifiées : $email, $mdp_hache, $nom, $prenom, $filiere
/Non verifiées $_POST['annee']
/Il faut encore verfier que l'utilisateur n'est pas déja inscrit
*/


//Insertion dans la bd

$req = $bdd->prepare('INSERT INTO tab_eleve(nom,prenom,email,filiere,num_cesure,mdp) VALUES(:nom, :prenom, :email, :filiere, :num_cesure, :mdp)');

$req->execute(array(
    'nom' => $nom,
    'prenom' => $prenom,
    'email' => $email,
    'filiere' => $filiere,
    'num_cesure' => 0, //par défaut, quand aucune cesure n'est définit lors de l'inscription
    'mdp' => $mdp_hache
));


header('Location: ../index.php');
?>