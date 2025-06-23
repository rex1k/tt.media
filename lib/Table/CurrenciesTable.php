<?php

namespace TTMedia\Table;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\DatetimeField;
use Bitrix\Main\ORM\Fields\FloatField;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\StringField;

class CurrenciesTable extends DataManager
{
    public static function getTableName(): string
    {
        return 'currencies';
    }

    public static function getMap(): array
    {
        return [
            (new IntegerField('id'))
                ->configurePrimary()
                ->configureAutocomplete(),
            (new StringField('code'))
                ->configureRequired(),
            (new DatetimeField('date'))
                ->configureRequired(),
            (new FloatField('course'))
                ->configureRequired()
        ];
    }
}