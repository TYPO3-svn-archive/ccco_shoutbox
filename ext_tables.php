<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');
 ///
// the folowing line adds the plugin named "ccco Shoutbox" to the pluginlist
Tx_Extbase_Utility_Extension::registerPlugin($_EXTKEY,'Pi1','ccco Shoutbox');
// the folowing line adds a typoscriptfile to the static templatelist
t3lib_extMgm::addStaticFile($_EXTKEY, 'Configuration/TypoScript', $_EXTKEY);
?>