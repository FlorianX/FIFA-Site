<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'fifaStats');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_fifastats_domain_model_club', 'EXT:fifa_stats/Resources/Private/Language/locallang_csh_tx_fifastats_domain_model_club.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_fifastats_domain_model_club');
$GLOBALS['TCA']['tx_fifastats_domain_model_club'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:fifa_stats/Resources/Private/Language/locallang_db.xlf:tx_fifastats_domain_model_club',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,league,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Club.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_fifastats_domain_model_club.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_fifastats_domain_model_league', 'EXT:fifa_stats/Resources/Private/Language/locallang_csh_tx_fifastats_domain_model_league.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_fifastats_domain_model_league');
$GLOBALS['TCA']['tx_fifastats_domain_model_league'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:fifa_stats/Resources/Private/Language/locallang_db.xlf:tx_fifastats_domain_model_league',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,clubs,country,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/League.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_fifastats_domain_model_league.gif'
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_fifastats_domain_model_country', 'EXT:fifa_stats/Resources/Private/Language/locallang_csh_tx_fifastats_domain_model_country.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_fifastats_domain_model_country');
$GLOBALS['TCA']['tx_fifastats_domain_model_country'] = array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:fifa_stats/Resources/Private/Language/locallang_db.xlf:tx_fifastats_domain_model_country',
		'label' => 'name',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,

		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'name,leagues,',
		'dynamicConfigFile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TCA/Country.php',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY) . 'Resources/Public/Icons/tx_fifastats_domain_model_country.gif'
	),
);

if (!isset($GLOBALS['TCA']['be_users']['ctrl']['type'])) {
	if (file_exists($GLOBALS['TCA']['be_users']['ctrl']['dynamicConfigFile'])) {
		require_once($GLOBALS['TCA']['be_users']['ctrl']['dynamicConfigFile']);
	}
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$GLOBALS['TCA']['be_users']['ctrl']['type'] = 'tx_extbase_type';
	$tempColumns = array();
	$tempColumns[$GLOBALS['TCA']['be_users']['ctrl']['type']] = array(
		'exclude' => 1,
		'label'   => 'LLL:EXT:fifa_stats/Resources/Private/Language/locallang_db.xlf:tx_fifastats.tx_extbase_type',
		'config' => array(
			'type' => 'select',
			'items' => array(),
			'size' => 1,
			'maxitems' => 1,
		)
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('be_users', $tempColumns, 1);
}

$GLOBALS['TCA']['be_users']['types']['Tx_FifaStats_Player']['showitem'] = $TCA['be_users']['types']['1']['showitem'];
$GLOBALS['TCA']['be_users']['types']['Tx_FifaStats_Player']['showitem'] .= ',--div--;LLL:EXT:fifa_stats/Resources/Private/Language/locallang_db.xlf:tx_fifastats_domain_model_player,';
$GLOBALS['TCA']['be_users']['types']['Tx_FifaStats_Player']['showitem'] .= '';

$GLOBALS['TCA']['be_users']['columns'][$TCA['be_users']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:fifa_stats/Resources/Private/Language/locallang_db.xlf:be_users.tx_extbase_type.Tx_FifaStats_Player','Tx_FifaStats_Player');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('be_users', $GLOBALS['TCA']['be_users']['ctrl']['type'],'','after:' . $TCA['be_users']['ctrl']['label']);
