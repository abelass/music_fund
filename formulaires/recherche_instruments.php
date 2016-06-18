<?php

/**
 * Fichier gérant le formulaire recherche instruments
 *
 * @plugin     Squelette Music Fund 
 * @copyright  2016
 * @author     Philipe et Rainer
 * @licence    GNU/GPL
 * @package    SPIP\Music_fund\Formulaires\Recherche_instrunents
 */


if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

/**
 * chargement des valeurs par defaut des champs du #FORMULAIRE_RECHERCHE
 * on peut lui passer l'url de destination en premier argument
 * on peut passer une deuxième chaine qui va différencier le formulaire pour pouvoir en utiliser plusieurs sur une même page
 *
 * @param string $lien URL où amène le formulaire validé
 * @param string $class Une class différenciant le formulaire
 * @return array
 */
function formulaires_recherche_instruments_charger_dist() {
	if ($GLOBALS['spip_lang'] != $GLOBALS['meta']['langue_site']) {
		$lang = $GLOBALS['spip_lang'];
	} else {
		$lang = '';
	}

	
	$liste_objets = lister_tables_objets_sql();
	$lifecycles_statuts = array();
	
	//Le statuts des lifecycles
	foreach ($liste_objets['spip_lifecycles']['statut_textes_instituer'] AS $statut => $label) {
		$lifecycles_statuts[$statut] = _T($label);
	}
	
	// les années de lifecycles
	$lifecycles_annees;
	$sql = sql_select('date', 'spip_lifecycles', '', 'YEAR(date)');
	
	while ($data = sql_fetch($sql)) {
		$annee = date('Y', strtotime($data['date']));
		$lifecycles_annees[$annee] = $annee;
	}
	
	return
		array(
			'lang' => $lang,
			'_id_champ' => $class ? substr(md5($action . $class), 0, 4) : 'recherche',
			'mf_id' => _request('mf_id'),
			'_type_instrument' => _request('_type_instrument'),
			'contact' => _request('contact'),
			'_type_contact' => _request('_type_contact'),
			'_lifecycles_statuts' => $lifecycles_statuts,
			'_lifecycles_statut' => _request('_lifecycles_statut'),
			'_lifecycles_annees' => $lifecycles_annees,
			'lifecycles_date_debut' => _request('lifecycles_date_debut'),
			'lifecycles_date_fin' => _request('lifecycles_date_fin'),
		);
}