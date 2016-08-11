<?php 
ini_set('display_errors','on');
error_reporting(E_ALL);
/* Réalisation de la procédure d'inscriptionlibs : Recuperation et affichage des listings */

//Conexion à la BDD

try
{
    $bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u751124898_cesur;charset=utf8','u751124898_root','Cg141294',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
    $e->getMessage();
}


//Faire le tri par critère/colonne
//include('fonc/db.php');

$list_col = array( 'filiere','majeure','entreprise','duree_mois','pays','ville');
$list_ord = array( 'asc','desc');
$col = ( isset($_GET['col']) AND in_array(strtolower($_GET['col']),$list_col)) ? $_GET['col'] : 'pays' ;
$ord = ( isset($_GET['ord']) AND in_array(strtolower($_GET['ord']),$list_ord)) ? strtoupper($_GET['ord']) : 'ASC' ;

?>

<table>
    <tr>
        <th>Filiere
            <a href="?col=filiere&ord=asc"><img src="/www/images/icon/arrow_tri_up.png"></a>
            <a href="?col=filiere&ord=desc"><img src="/www/images/icon/arrow_tri_down.png"></a>
        </th>
        <th>Majeure
            <a href="?col=majeure&ord=asc"><img src="/www/images/icon/arrow_tri_up.png"></a>
            <a href="?col=majeure&ord=desc"><img src="/www/images/icon/arrow_tri_down.png"></a>
        </th>
        <th>Entreprise
            <a href="?col=entreprise&ord=asc"><img src="/www/images/icon/arrow_tri_up.png"></a>
            <a href="?col=entreprise&ord=desc"><img src="/www/images/icon/arrow_tri_down.png"></a>
        </th>
        <th>Duree
            <a href="?col=duree_mois&ord=asc"><img src="/www/images/icon/arrow_tri_up.png"></a>
            <a href="?col=duree_mois&ord=desc"><img src="/www/images/icon/arrow_tri_down.png"></a>
        </th>
        <th>Pays
            <a href="?col=pays&ord=asc"><img src="/www/images/icon/arrow_tri_up.png"></a>
            <a href="?col=pays&ord=desc"><img src="/www/images/icon/arrow_tri_down.png"></a>
        </th>
        <th>Ville
            <a href="?col=ville&ord=asc"><img src="/www/images/icon/arrow_tri_up.png"></a>
            <a href="?col=ville&ord=desc"><img src="/www/images/icon/arrow_tri_down.png"></a>
        </th>
        <th>Descriptif</th><th></th>
    </tr>
    
<?php

    $req_cesure = $bdd->query("SELECT num_cesure, filiere, majeure, ville, descriptif, duree_mois, entreprise, pays, continent FROM tab_cesure ORDER BY $col $ord");
    
   

while($donnees = $req_cesure->fetch())
{
?>

    <tr>
        <td><?php echo $donnees['filiere'];?></td>
        <td><?php echo $donnees['majeure'];?></td>
        <td><?php echo $donnees['entreprise'];?></td>
        <td><?php echo $donnees['duree_mois'];?></td>
        <td><?php echo $donnees['pays'];?></td>
        <td><?php echo $donnees['ville'];?></td>
        <td><?php echo $donnees['descriptif'];?></td> <!-- Afficher seulement une partie du descriptif -->
        <td><?php echo "<a href ='/www/modules/detail_stage.php?num_cesure=". $donnees['num_cesure'] . "'>See More</a>";?></td>;
    </tr>


<?php
}

echo '</table>';

?>