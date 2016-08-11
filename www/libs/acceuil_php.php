
<?php

function array_count_duplicate($Array) {
    $ResultArr = array();
    if( !empty($Array) && is_array($Array) ) {
        foreach( $Array as $key => $value) {
            $Array[$value] = ( empty($Array[$value]) ) ? 1 : $Array[$value]+1; //Attention ! on suppose ici que les valeurs peuvent etre des clés valides !
        }
    }
    return $ResultArr;
}


if (!isset($_SESSION)) { session_start(); }
ini_set('display_errors','on');
error_reporting(E_ALL);
        
        //Connexion bdd
        try
        {
            /*LOCAL*/
            /*$bdd = new PDO('mysql:host=localhost;dbname=cesure;charset=utf8','root','root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));/*
            /*ONLINE*/ 
            $bdd = new PDO('mysql:host=mysql.hostinger.fr;dbname=u751124898_cesur;charset=utf8','u751124898_root','Cg141294',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        catch(Exception $e)
        {
            $e->getMessage();
        }
        
if(isset($_SESSION['nom']))
{
    echo '<p>Bonjour ' . $_SESSION['nom']. '</p>';
}


$req= $bdd->query('SELECT * FROM tab_cesure');
$nb_cesure = 0;
while($cesure = $req->fetch())
{
    $nb_cesure++;
}

/*Array pour compteurs*/
$pays = array();
$ville= array();
$entreprise = array();
$duree_mois = array();
$filiere = array();
/*Requete spécifique pour le comptage*/
$query = "SELECT filiere, pays, ville, entreprise, duree_mois FROM tab_cesure";
//$link = mysqli_connect("localhost", "root", "root", "cesure"); //LOCAL
$link = mysqli_connect("mysql.hostinger.fr", "u751124898_root", "Cg141294", "u751124898_cesur"); //WEB
if (!$link) {
    die('Erreur de connexion (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
/*Extraction des données dans des tableaux associatifs*/
if ($result = mysqli_query($link, $query)) {
        while ($row = mysqli_fetch_assoc($result)) {
        $pays[]      = $row["pays"];
        $ville[]     = $row["ville"];
        $entreprise[]= $row["entreprise"];
        $duree_mois[]= $row["duree_mois"];
        $filiere[]   = $row["filiere"];
    }
}
$nbPays = 0;
$nbPays = compterPays($pays);
$nbVilles = 0;
$nbVilles = compterPays($ville);
$nbEntreprises=0;
$nbEntreprises = compterPays($entreprise);
$nbMois = 0;
$nbMois = compterMois($duree_mois);
$nbEti = 0; $nbCgp = 0; $nbIrc = 0;
$nbFiliere = array();
$nbFiliere = compterFiliere($filiere);
$nbEti = $nbFiliere[0]; $nbCgp = $nbFiliere[1]; $nbIRC = $nbFiliere[2];



?>




<ul class="accueil">
    <li id=""><a href="#"><?php echo $nb_cesure .'<br> <p style=font-size:6px>nbre de cesures</p>'; ?></a></li>
    <li><a href="#"><?php   printf("%d ",$nbPays);  echo'<p style=font-size:6px>nbre de pays</p>'; ?></a></li>
    <li><a href="#"><?php   printf("%d ",$nbVilles);  echo '<p style=font-size:6px>nbre de villes</p>'; ?></a></li>
    <li><a href="#"><?php   printf("%d ",$nbEntreprises);  echo "<p style=font-size:6px>nbre d'entreprises</p>"; ?></a></li>
    <li><a href="#"><?php   printf("%d ",$nbMois);  echo "<p style=font-size:6px>mois de stage</p>"; ?></a></li>
    <li><a id="rose" href="#"><?php   printf("%d ",$nbEti);  echo "<p style=font-size:6px>Stage SN</p>"; ?></a></li>
    <li><a id="green" href="#"><?php   printf("%d ",$nbCgp);  echo "<p style=font-size:6px>Stage CGP</p>"; ?></a></li>
</ul>
<!-- pourquoi pas faire un espece de graphique sympa avec le nombre de césures, le nombre de pays representés, le nombre de mois de stages au total, ... -->




<?php 
function compterPays($array)
{
    $tmp_array = array();
    $nb=0;
    if(!empty($array))
    {
        if(is_array($array))    
    
    {
        foreach($array as $value)
        {
            if(!in_array($value,$tmp_array))
                $tmp_array[$value] = 1;
            else
                $tmp_array[$value]++;
            //$tmp_array[$value] = ( empty($tmp_array[$value]) ) ? 1 : $tmp_array[$value]+1;
        }
        
        foreach($tmp_array as $value => $occurence)
        {
            $nb++;
         }   
            return $nb; //nbre de pays différents dans le tableau
    }
        else print 'erreur pas array';
    }
    else print 'Erreur array vide';
}

function compterMois($array)
{
    $tmp_array = array();
    $nb = 0;
    if(!empty($array) AND is_array($array))
    {
        foreach($array as $value)
        {
            $nb = $nb + $value;
        }
    }
    return $nb;
}

function compterFiliere($array)
{
    $tmp_array = array();
    $eti = 0;
    $cgp = 0;
    $irc = 0;
    $eti_array = array("ETI");
    $cgp_array = array("CGP");
    $irc_array = array("IRC");
    if(!empty($array) AND is_array($array))
    {
        foreach($array as $value)
        {
            if(in_array($value,$eti_array))
                $eti++;
            elseif(in_array($value,$cgp_array))
                $cgp++;
            else
                echo'coucou';
        }
        $nb = array($eti,$cgp,$irc);
        return $nb;
    }
}
?>