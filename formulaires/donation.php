<?php

/**
 * Fichier gérant le formulaire donation.
 *
 * @plugin     Squelette Music Fund
 * @copyright  2016
 * @author     Philipe et Rainer
 * @licence    GNU/GPL
 * @package    SPIP\Music_fund\Formulaires\Donation
 */


if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

/**
 * chargement des valeurs par defaut des champs du #FORMULAIRE_DONATION
 * on peut lui passer l'url de destination en premier argument
 * on peut passer une deuxième chaine qui va différencier le formulaire pour pouvoir en utiliser plusieurs sur une même page
 *
 * @param string $lien URL où amène le formulaire validé
 * @param string $class Une class différenciant le formulaire
 * @return array
 */
function formulaires_donation_charger_dist($id_rubrique) {
	if ($GLOBALS['spip_lang'] != $GLOBALS['meta']['langue_site']) {
		$lang = $GLOBALS['spip_lang'];
	} else {
		$lang = '';
	}

	$valeurs = array(
		'certificat' => 'rien',
		'pays' => '',
		'recurrent' => '',
		'id_rubrique' => $id_rubrique,
		'lang' => $lang,
	);

	return $valeurs;
}