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
	/*$lifecycles_annees;
	$sql = sql_select('date', 'spip_lifecycles', '', 'YEAR(date)');
	
	while ($data = sql_fetch($sql)) {
		$annee = date('Y', strtotime($data['date']));
		$lifecycles_annees[$annee] = $annee;
	}*/

	// La requête de la recherche
	$from = array('spip_instruments AS inst');
	$where = array();
	
	
	if ($mf_id = _request('mf_id')) {
		$where[] = 'mf_id LIKE ' .sql_quote('%' . $mf_id . '%');
	}
	
	if ($type_instrument = _request('_type_instrument')
			and is_array($type_instrument)
			and count($type_instrument) > 0) {
				$sql = sql_select('id_objet',
						'spip_mots_liens',
						'objet="instrument" 
							AND id_mot IN (' . implode(',', $type_instrument) . ')'
						);
				
				$id_instrument = array(-1000);
				while ($row = sql_fetch($sql)) {
					$id_instrument[] = $row['id_objet'];
				}
				$where[] = 'inst.id_instrument IN (' . implode(',', $id_instrument) . ')';
	}
	
	if ($type_contact = _request('_type_contact')
				AND is_array($type_contact)
				AND count($type_contact) > 0
				) {
					$sql = sql_select('id_objet',
							'spip_mots_liens',
							'objet="contact"
							AND id_mot IN (' . implode(',', $type_contact) . ')'
							);
					
					$id_contact = array(-1000);
					while ($row = sql_fetch($sql)) {
						$id_contact[] = $row['id_objet'];
					}
					
					$from[] = 'spip_lifecycles as lcycles';
					$where[] = 'inst.id_instrument = lcycles.id_instrument 
							AND lcycles.id_contact IN (' . implode(',', $id_contact) . ')';
				}
				
	if ($contact = _request('contact')
		){
			$sql = sql_select('id_contact', 'spip_contacts', 'nom LIKE ' .sql_quote('%' . $contact . '%'));
			
			$c = array(-1000);
			while ($row = sql_fetch($sql)) {
				$c[] = $row['id_contact'];
			}
			
			if (!$type_contact) {
				$from[] = 'spip_lifecycles as lcycles';
				$where[] = 'inst.id_instrument = lcycles.id_instrument
							AND lcycles.id_contact IN (' . implode(',', $c) . ')';
			}
			else {
				$where[] = 'lcycles.id_contact IN (' . implode(',', $c) . ')';
			}
	}
	
	if ($lifecycles_statut = _request('_lifecycles_statut')
			and is_array($lifecycles_statut)
			and count($lifecycles_statut) > 0) {
		if (!$type_contact and !$contact ) {
			$from[] = 'spip_lifecycles as lcycles';
		}
		$statuts = array();
		foreach ($lifecycles_statut AS $statut) {
			$statuts[] = sql_quote($statut);
		}
		$where[] = 'lcycles.statut IN (' . implode(',', $statuts) . ')';
	}

	$sql = sql_select('*', $from, $where);
	
	$instruments =array();
	while ($row = sql_fetch($sql)) {
		$instruments[$row['id_instrument']] = $row;
	}
	
	return
		array(
			'lang' => $lang,
			'_id_champ' => $class ? substr(md5($action . $class), 0, 4) : 'recherche',
			'mf_id' => $mf_id,
			'_type_instrument' => $type_instrument,
			'contact' => _request('contact'),
			'_type_contact' => $type_contact,
			'_lifecycles_statuts' => $lifecycles_statuts,
			'_lifecycles_statut' => _request('_lifecycles_statut'),
			'_instruments' => $instruments
			/*'_lifecycles_annees' => $lifecycles_annees,
			'lifecycles_date_debut' => _request('lifecycles_date_debut'),
			'lifecycles_date_fin' => _request('lifecycles_date_fin'),*/
		);
}