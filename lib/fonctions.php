<?php
// fonction qui retourne une liste de données

/* argument : un tableau de station de vélo
 * chaque  tableau du tableau passé en argument  contient les informations d'une  station de vélo.On récupère celles qui nous intéressent:
  nom, type,géolocalisation,libelle,adresse,etat,commune, nombre de vélos disponibles et nombre de places disponibles
 * résultat: une liste HTML qui contient toutes les stations avec leurs informations.
*/

function arrayToList($tableau){
  $res="<ul id=\"stations\" >";
  foreach ($tableau as $tab) {
    $nom = $tab->{'fields'}->{'nom'};
    $nbvelosdispo = $tab->{'fields'}->{"nbvelosdispo"};
    $geo = $tab->{'fields'}->{'geo'};
    $geo1 = $geo[0];
    $geo2 = $geo[1];
    $type = $tab->{'fields'}->{'type'};
    $libelle = $tab->{'fields'}->{'libelle'};
    $commune = $tab->{'fields'}->{'commune'};
    $etat = $tab->{'fields'}->{'etat'};
    $nbplacesdispo = $tab->{'fields'}->{'nbplacesdispo'};
    $etatconnexion = $tab->{'fields'}->{'etatconnexion'};
    $adresse = $tab->{'fields'}->{'adresse'};
    $res .="<li data-geo=\"[$geo1,$geo2]\" data-etatconnexion=\"$etatconnexion\" data-adresse=\"$adresse\" data-type=\"$type\" data-libelle=\"$libelle\" data-nbvelosdispo=\"$nbvelosdispo\" data-nbplacesdispo=\"$nbplacesdispo\">nom de la station : $nom,
      nombre de vélos dispos : $nbvelosdispo,
      Commune : $commune,
      Adresse :  $adresse </li>";
      $res.= "<br/>";
  }$res.="</ul>";
  return $res;
}

/* argument: filter , une chaîne représentant un filtre
 * argument: values , les valeurs que prend le filtre
 * Ce filtre sera utilisé pour filtrer les stations selon le  nom ou la  commune
 * résultat: une chaîne représentant un filtre qui va servir à filtrer les stations  selon ses valeurs
*/

function filterBYStringToString($filter,$values){ //fonction qui transforme le filtre en String utilisé pour les filtres avec tableaux
  $res="";
  if (is_null($values))
   return $res;
  foreach($values as $valeur){
      $res.= $filter."=".str_replace(" ", "+",  $valeur)."&" ;
  }
    return $res;
}

/* argument: filter , une chaîne représentant un filtre
 * argument: value , la valeur que prend le filtre
 * Ce filtre sera utilisé pour filtrer les stations selon l'adresse , l'etat de connexion ou le type
 * résultat: une chaîne représentant un filtre qui va servir à filtrer les stations  selon ses valeurs
*/

function filterBySelectToString($filter,$value){ //filtre utilisé pour nbvelosdispo, nbplacesdispo ainsi que etat pour retourner une chaine de caracteres
 $res="";
 if (is_null($value))
    return $res;
 if ($value != "TOUTES")
     $res .= $filter."=".str_replace(" ", "+",  $value)."&";
 return $res;
}

/* argument: filter , une chaîne représentant un filtre
 * argument: value , la valeur que prend le filtre
 * Ce filtre sera utilisé pour filtrer les stations selon le nombre de vélos ou de places disponibles ,ou selon le libelle
 * résultat: une chaîne représentant un filtre qui va servir à filtrer les stations  selon ses valeurs
*/

function filterByIntToString($filter,$value){ //filtre utilisé pour nbvelosdispo, nbplacesdispo ainsi que etat pour retourner une chaine de caracteres
  if (is_null($value))
   return "";
  if ( ($filter==='libelle') && ($value=== 0) )
    return "";
  return $filter."=".$value."&";
}
