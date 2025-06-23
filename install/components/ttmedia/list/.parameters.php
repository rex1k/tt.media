<?php

use TTMedia\Table\CurrenciesTable;

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
        'fieldsList' => [
            'NAME' => 'Поля',
            'TYPE' => 'LIST',
            'MULTIPLE' => 'Y',
            'VALUES' => [
                'id' => 'ИД',
                'code' => 'Код',
                'date' => 'Время',
                'course' => 'Курс'
            ],
            'PARENT' => 'SETTINGS',
        ],
        'usePageNavigation' => [
            'NAME' => 'Использовать навигацию',
            'TYPE' => 'CHECKBOX',
            'VALUES' => [
                'Y',
                'N',
            ],
            'PARENT' => 'SETTINGS',
        ],
        'showOnPage' => [
            'NAME' => 'Количество на странице',
            'TYPE' => 'INTEGER',
            'PARENT' => 'SETTINGS',
            'DEFAULT' => 10,
        ],
    ],
];