<?php
/**
 * Déclarations relatives à la base de données
 *
 * @plugin     Music Fund
 * @copyright  2016
 * @author     Rainer Müller
 * @licence    GNU/GPL
 */

if (!defined('_ECRIRE_INC_VERSION')) return;



/**
    Champs extras
 */
function music_fund_declarer_champs_extras($champs = array()) {

	// Table : spip_rubriques
	if (!is_array($champs['spip_rubriques'])) {
		$champs['spip_rubriques'] = array();
	}

	$champs['spip_rubriques']['titre_secondaire'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'titre_secondaire',
			'label' => _T('music_fund:label_titre_secondaire'),
			'type' => 'text',
			'size' => '40',
			'autocomplete' => 'defaut',
			'sql' => 'text DEFAULT \'\' NOT NULL',
			'rechercher_ponderation' => '2',
			'versionner' => 'on',
		),
	);

	$champs['spip_rubriques']['collected_instruments'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'collected_instruments',
			'label' => _T('music_fund:label_collected_instruments'),
			'type' => 'text',
			'size' => '40',
			'autocomplete' => 'defaut',
			'restrictions' => array(
				'branches' => '49',
			),
			'sql' => 'text DEFAULT \'\' NOT NULL',
			'rechercher_ponderation' => '2',
		),
	);

	$champs['spip_rubriques']['repaired_given_instruments'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'repaired_given_instruments',
			'label' => _T('music_fund:label_repaired_given_instruments'),
			'type' => 'text',
			'size' => '40',
			'autocomplete' => 'defaut',
			'restrictions' => array(
				'branches' => '49',
			),
			'sql' => 'text DEFAULT \'\' NOT NULL',
			'rechercher_ponderation' => '2',
		),
	);

	$champs['spip_rubriques']['permanent_workshops_created'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'permanent_workshops_created',
			'label' => _T('music_fund:label_permanent_workshops_created'),
			'type' => 'text',
			'size' => '40',
			'autocomplete' => 'defaut',
			'restrictions' => array(
				'branches' => '49',
			),
			'sql' => 'text DEFAULT \'\' NOT NULL',
			'rechercher_ponderation' => '2',
		),
	);

	$champs['spip_rubriques']['permanent_collection_points'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'permanent_collection_points',
			'label' => _T('music_fund:label_permanent_collection_points'),
			'type' => 'text',
			'size' => '40',
			'autocomplete' => 'defaut',
			'restrictions' => array(
				'branches' => '49',
			),
			'sql' => 'text DEFAULT \'\' NOT NULL',
			'rechercher_ponderation' => '2',
		),
	);


	// Table : spip_evenements
	if (!is_array($champs['spip_evenements'])) {
		$champs['spip_evenements'] = array();
	}

	$champs['spip_evenements']['chapo'] = array(
		'saisie' => 'textarea',
		'options' => array(
			'nom' => 'chapo',
			'label' => _T('ecrire:info_chapeau'),
			'class' => 'multilang',
			'rows' => '3',
			'sql' => 'text DEFAULT \'\' NOT NULL',
			'rechercher_ponderation' => '2',
			'traitements' => '_TRAITEMENT_RACCOURCIS',
			'versionner' => 'on',
		),
		'verifier' => array(
			'type' => 'taille',
			'options' => array(
				'max' => '150',
			),
		),
	);

	$champs['spip_evenements']['prix'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'prix',
			'label' => _T('music_fund:label_prix'),
			'type' => 'text',
			'class' => 'multilang',
			'size' => '40',
			'autocomplete' => 'defaut',
			'sql' => 'text DEFAULT \'\' NOT NULL',
			'rechercher_ponderation' => '2',
			'versionner' => 'on',
		),
	);

	$champs['spip_evenements']['bring'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'bring',
			'label' => _T('music_fund:label_bring'),
			'type' => 'text',
			'class' => 'multilang',
			'size' => '40',
			'autocomplete' => 'defaut',
			'sql' => 'text DEFAULT \'\' NOT NULL',
			'rechercher_ponderation' => '2',
			'versionner' => 'on',
		),
	);


	// Table : spip_organisations
	if (!is_array($champs['spip_organisations'])) {
		$champs['spip_organisations'] = array();
	}

	$champs['spip_organisations']['chapo'] = array(
		'saisie' => 'textarea',
		'options' => array(
			'nom' => 'chapo',
			'label' => _T('ecrire:info_chapeau'),
			'rows' => '4',
			'cols' => '40',
			'sql' => 'text DEFAULT \'\' NOT NULL',
			'rechercher_ponderation' => '2',
		),
		'verifier' => array(
			'type' => 'taille',
			'options' => array(
				'max' => '150',
			),
		),
	);

	$champs['spip_organisations']['approche'] = array(
		'saisie' => 'textarea',
		'options' => array(
			'nom' => 'approche',
			'label' => _T('music_fund:label_approche'),
			'class' => 'inserer_barre_edition inserer_previsualisation multilang',
			'rows' => '5',
			'cols' => '40',
			'sql' => 'text DEFAULT \'\' NOT NULL',
			'rechercher' => 'on',
			'rechercher_ponderation' => '4',
			'traitements' => '_TRAITEMENT_RACCOURCIS',
			'versionner' => 'on',
		),
	);

	$champs['spip_organisations']['resultats'] = array(
		'saisie' => 'textarea',
		'options' => array(
			'nom' => 'resultats',
			'label' => _T('music_fund:label_resultats'),
			'class' => 'inserer_barre_edition inserer_previsualisation multilang',
			'rows' => '5',
			'cols' => '40',
			'sql' => 'text DEFAULT \'\' NOT NULL',
			'rechercher' => 'on',
			'rechercher_ponderation' => '4',
			'traitements' => '_TRAITEMENT_RACCOURCIS',
			'versionner' => 'on',
		),
	);


	// Table : spip_contacts
	if (!is_array($champs['spip_contacts'])) {
		$champs['spip_contacts'] = array();
	}

	$champs['spip_contacts']['pays'] = array(
		'saisie' => 'pays',
		'options' => array(
			'nom' => 'pays',
			'label' => 'Pays',
			'defaut' => '24',
			'cacher_option_intro' => 'on',
			'sql' => 'smallint(6) DEFAULT \'\' NOT NULL',
			'rechercher_ponderation' => '2',
		),
	);

	$champs['spip_contacts']['ordre'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'ordre',
			'label' => 'Ordre',
			'type' => 'text',
			'size' => '40',
			'autocomplete' => 'defaut',
			'sql' => 'bigint(21)',
			'rechercher_ponderation' => '2',
		),
	);

	$champs['spip_contacts']['url'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'url',
			'label' => _T('contacts:label_url_site'),
			'type' => 'text',
			'size' => '40',
			'autocomplete' => 'defaut',
			'sql' => 'varchar(255)',
			'rechercher_ponderation' => '2',
		),
	);

	return $champs;
}
?>