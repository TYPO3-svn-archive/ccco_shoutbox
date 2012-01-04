<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');
 ///
// the folowing line adds the plugin named "ccco Shoutbox" to the pluginlist
Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY,'Pi1','ccco Shoutbox');
// the folowing line adds a typoscriptfile to the static templatelist
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', $_EXTKEY);
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript/DefaultStyles', 'ccco_shoutbox css-file');

///tx_cccoshoutbox_domain_model_shout
$TCA['tx_cccoshoutbox_domain_model_shout'] = array (
	'ctrl' => array (
		'title' => 'Guestbook-Entry',
		'label' => 'title',
	),
	'columns' => array(	
		'name' => array(
			'label'   => 'name',
			'config'  => array(
				'type' => 'input',
				'eval' => 'trim,required',
			)
		),
		'shout' => array(
			'label'   => 'shout',
			'config'  => array(
				'type' => 'textarea',
				'eval' => 'trim,required',
			)
		),
		'date' => array(
			'label'   => 'Entry-Datum',
			'config'  => array(
				'type'    => 'input',
				'eval' => 'datetime, required',
				'default' => time()
			)
		)
	)
);
?>