<?php
	// script invoqué par le script principal

	// création de la classe Exception spécifique
	class ParmsException extends Exception{};

	// quelques constantes utiles
	const METHOD = INPUT_GET;

 	const ETAT_VALUES = ['EN SERVICE','HORS SERVICE','TOUTES']; // valeurs autorisées pour 'etat';


  $etat = filter_input(METHOD,'etat',FILTER_SANITIZE_STRING);
	if ( $etat ===FALSE )
    throw new ParmsException("param 'etat': valeur INCORRECTE,veuillez rentrer une chaine de caractere");

  $nbvelosdispo = filter_input(METHOD,'nbvelosdispo',FILTER_VALIDATE_INT);
	if ( $nbvelosdispo ===FALSE )
    throw new ParmsException("param 'nbvelosdispo': valeur INCORRECTE,veuillez rentrer un entier");


  $nbplacesdispo = filter_input(METHOD,'nbplacesdispo',FILTER_VALIDATE_INT);
	if ( $nbplacesdispo ===FALSE )
    throw new ParmsException("param 'nbplacesdispo': valeur INCORRECTE,veuillez rentrer un entier");

  $commune = filter_input(INPUT_GET,'commune',FILTER_SANITIZE_STRING, ['flags'=>FILTER_REQUIRE_ARRAY]);
	if ( $commune ===FALSE )
    throw new ParmsException("param 'commune': valeur INCORRECTE,veuillez rentrer un tableau de  chaine de caractere");

  $nom =  filter_input(INPUT_GET,'nom',FILTER_SANITIZE_STRING, ['flags'=>FILTER_REQUIRE_ARRAY]);
  if ( $nom ===FALSE )
    throw new ParmsException("param 'commune': valeur INCORRECTE,veuillez rentrer un tableau de  chaine de caractere");

	$libelle = filter_input(METHOD,'libelle',FILTER_VALIDATE_INT);
		if ($libelle ===FALSE)
		    throw new ParmsException("param 'libelle': valeur INCORRECTE, veuillez rentrer un entier");

	$etatconnexion = filter_input(METHOD,'etatconnexion',FILTER_SANITIZE_STRING);
		if ($etatconnexion === FALSE)
				throw new ParmsException("param 'etatconnexion': valeur INCORRECTE,veuillez rentrer une chaine de caractere");

	$type = filter_input(METHOD,'type',FILTER_SANITIZE_STRING);
		if ($type === FALSE)
				throw new ParmsException("param 'type': valeur INCORRECTE,veuillez rentrer une chaine de caractere");

	$adresse = filter_input(METHOD,'adresse',FILTER_SANITIZE_STRING);
					if ($type === FALSE)
							throw new ParmsException("param 'adresse': valeur INCORRECTE,veuillez rentrer une chaine de caractere");
?>
