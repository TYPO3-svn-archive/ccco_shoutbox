<?php
if (!defined ('TYPO3_MODE')) die ('Access denied.');
Tx_Extbase_Utility_Extension::configurePlugin(
    $_EXTKEY,
    'Pi1',
    array(
         'Shout' => 'index, ajax, addshout, createshout, createshoutajax',
    ),
    array(
         'Shout' => 'index, ajax, addshout, createshout, createshoutajax',
    )
);
?>