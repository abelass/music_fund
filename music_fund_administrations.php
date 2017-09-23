<?php
/**
 * Fichier gérant l'installation et désinstallation du plugin Réservation Événements
 *
 * @plugin     Music Fund
 * @copyright  2016
 * @author     Rainer Müller
 * @licence    GNU/GPL
 * @package    SPIP\Music_fund\Installation
 */

if (!defined('_ECRIRE_INC_VERSION')) return;


/**
 * Fonction d'installation et de mise à jour du plugin Music Fund.
 *
 * Vous pouvez :
 *
 * - créer la structure SQL,
 * - insérer du pre-contenu,
 * - installer des valeurs de configuration,
 * - mettre à jour la structure SQL
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @param string $version_cible
 *     Version du schéma de données dans ce plugin (déclaré dans paquet.xml)
 * @return void
**/

include_spip('inc/cextras');
include_spip('base/music_fund');

function music_fund_upgrade($nom_meta_base_version, $version_cible) {
	$maj = array();
	cextras_api_upgrade(music_fund_declarer_champs_extras(), $maj['create']);
	cextras_api_upgrade(music_fund_declarer_champs_extras(), $maj['1.0.2']);
	cextras_api_upgrade(music_fund_declarer_champs_extras(), $maj['1.1.0']);
	cextras_api_upgrade(music_fund_declarer_champs_extras(), $maj['1.1.4']);

	$maj['1.1.3'] = array (
		array (
			'sql_alter',
			'TABLE spip_organisations CHANGE resultats impact text DEFAULT \'\' NOT NULL',
		),
		array(
			'sql_alter',
			'TABLE spip_organisations DROP approche',
		)
	);

	include_spip('base/upgrade');
	maj_plugin($nom_meta_base_version, $version_cible, $maj);
}


/**
 * Fonction de désinstallation du plugin Music Fund.
 *
 * Vous devez :
 *
 * - nettoyer toutes les données ajoutées par le plugin et son utilisation
 * - supprimer les tables et les champs créés par le plugin.
 *
 * @param string $nom_meta_base_version
 *     Nom de la meta informant de la version du schéma de données du plugin installé dans SPIP
 * @return void
**/
function music_fund_vider_tables($nom_meta_base_version) {

	cextras_api_vider_tables(music_fund_declarer_champs_extras());

	effacer_meta($nom_meta_base_version);
}

?>