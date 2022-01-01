
<?php
require('lib/fonctions.php');
require('lib/verifyParms.php');
$url = "http://vlille.fil.univ-lille1.fr" ;

$res = filterBYStringToString('nom',$nom) . filterBYStringToString('commune',$commune).filterBySelectToString('adresse',$adresse) ;
$res.=  filterByIntToString('libelle',$libelle) . filterByIntToString('nbvelosdispo',$nbvelosdispo) . filterByIntToString('nbplacesdispo',$nbplacesdispo);
$res.= filterBySelectToString('etatconnexion',$etatconnexion).filterBySelectToString('type',$type);

if ($res !== "")
    $url = $url . "/?" . substr($res,0,strlen($res)-1) ;

$reponse = file_get_contents($url);
$reponse=json_decode($reponse);

if (count($reponse) != 0)
     $liste = arrayToList($reponse);
else
    $liste = "<p id=\"erreur\"> Malheureusement aucune station station n'est disponible avec ces critères, veuillez-en choisir d'autres SVP</p>";
require('views/pageAccueil.php');

?>
