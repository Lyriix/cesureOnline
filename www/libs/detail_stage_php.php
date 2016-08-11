<?php 

/* recuperation et affichage des details d'un stage  */

//Conexion à la BDD
ini_set('display_errors','on');
error_reporting(E_ALL);
try
{
    $bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u751124898_cesur;charset=utf8','u751124898_root','Cg141294',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    $e->getMessage();
}

$num_cesure = $_GET['num_cesure'];
$req_cesure = $bdd->prepare('
SELECT filiere, majeure, ville, descriptif, duree_mois, entreprise, pays, continent FROM tab_cesure WHERE num_cesure = :num_cesure');
$req_cesure->execute(array(
                    'num_cesure' => $num_cesure));
    
$req_eleve = $bdd->prepare('SELECT nom, prenom, email FROM tab_eleve WHERE num_cesure = :num_cesure');
$req_eleve->execute(array('num_cesure'=>$num_cesure));

$donnees_cesure = $req_cesure->fetch();
{
?>


<section class="detail">
    <h1>Cesure pour laquelle vous avez demander des détails</h1>
    <p><em><?php echo $donnees_cesure['descriptif'];?> </em></p>
    <p>Filière : <span><?php echo $donnees_cesure['filiere'];?></span> </p>
    <p>Majeure :<span> <?php echo $donnees_cesure['majeure'];?></span> </p>
    <p>Entreprise : <span><?php echo $donnees_cesure['entreprise'];?></span> </p>
    <p>Duree (mois) :<span> <?php echo $donnees_cesure['duree_mois'];?></span> </p>
    <p>Pays :<span> <?php echo $donnees_cesure['pays'];?></span> </p>
    <p>Ville :<span> <?php echo $donnees_cesure['ville'];?></span> </p>
    <p>Descriptif :<span> <?php echo $donnees_cesure['descriptif'];?></span> </p>
</section>

<?php
}   
while($donnees_eleve = $req_eleve->fetch())
{
?>
    <section class="real">
        <h1>A réalisé la cesure : </h1>
        <p>Prénom : <?php echo $donnees_eleve['nom'];?> </p>
        <p>Nom : <?php echo $donnees_eleve['prenom'];?> </p>
        <p>E-mail <?php echo $donnees_eleve['email'];?> </p>
    </section>
        
<?php
}
   
?>