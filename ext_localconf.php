<?php

defined('TYPO3') || die('Access denied.');

$GLOBALS['TYPO3_CONF_VARS']['SYS']['formEngine']['nodeRegistry'][] = [
    'nodeName' => 'jsonText',
    'priority' => 40,
    'class' => \Passionweb\CustomTcaInputs\Form\Element\JsonText::class,
];

$GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['processDatamapClass']['CustomTcaInputs'] =
    \Passionweb\CustomTcaInputs\Hooks\DataHandlerHook::class;
