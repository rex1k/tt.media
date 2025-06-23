<?php

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$arComponentParameters = [
    'GROUPS' => [
        'SETTINGS' => [
            'NAME' => 'Настройки',
            'SORT' => '100',
        ],
    ],
    'PARAMETERS' => [
        'filterName' => [
            'NAME' => 'Имя переменной фильтра',
            'TYPE' => 'STRING',
            'DEFAULT' => 'filter',
            'PARENT' => 'SETTINGS',
        ],
    ],
];