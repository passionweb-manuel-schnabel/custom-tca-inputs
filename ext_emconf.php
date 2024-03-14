<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Custom TCA inputs',
    'description' => 'Adds a custom TCA field with special rendering for JSON data.',
    'category' => 'be',
    'author' => 'Manuel Schnabel',
    'author_email' => 'service@passionweb.de',
    'author_company' => 'PassionWeb Manuel Schnabel',
    'state' => 'stable',
    'version' => '1.1.0',
    'constraints' => [
        'depends' => [
            'typo3' => '12.0.0-12.4.99'
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
