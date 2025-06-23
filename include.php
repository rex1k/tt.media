<?php

use Bitrix\Main\Loader;

Loader::registerAutoLoadClasses(
    'tt.media',
    ['TTMedia\Table\CurrenciesTable' => 'lib/Table/CurrenciesTable.php']
);