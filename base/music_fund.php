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
			'label' => '<multi>[fr]Titre secondaire[en]Additional title</multi>',
			'type' => 'text',
			'size' => '40',
			'autocomplete' => 'defaut',
			'sql' => 'text DEFAULT \'\' NOT NULL',
			'rechercher_ponderation' => '2',
			'traitements' => '_TRAITEMENT_RACCOURCIS',
			'versionner' => 'on',
		),
	);

	$champs['spip_rubriques']['collected_instruments'] = array(
		'saisie' => 'input',
		'options' => array(
			'nom' => 'collected_instruments',
			'label' => '<multi>[en]collected instruments over the year</multi>',
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
			'label' => '<multi>[en]repaired & given instruments</multi>',
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
			'label' => '<multi>[en]permanent repair workshops created</multi>',
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
			'label' => '<multi>[en]permanent collection points in 6 countries</multi>',
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
			'label' => 'Short Description',
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
			'label' => 'Prix',
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
			'label' => 'What to bring',
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
			'label' => 'Short description',
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
			'label' => '<multi>[fr]Approche[en]Approach</multi>',
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
			'label' => '<multi>[fr]Resultats[en]Results</multi>',
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

	return $champs;
}
?>