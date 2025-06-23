<?php

use Bitrix\Main\Loader;
use Bitrix\Main\Type\DateTime as BitrixDatetime;
use TTMedia\Table\CurrenciesTable;

class CurrencyFilterComponent extends CBitrixComponent
{
    public function __construct($component = null)
    {
        Loader::includeModule('tt.media');

        parent::__construct($component);
    }

    public function onPrepareComponentParams($arParams)
    {
        if (empty($arParams['filterName'])) {
            throw new Exception('Missing required parameter filterName');
        }

        return parent::onPrepareComponentParams($arParams);
    }

    public function executeComponent()
    {
        $this->arResult['fields'] = $this->getFilterFields();
        $this->prepareFilter();
        $this->includeComponentTemplate();
    }

    private function getFilterFields(): array
    {
        $fields = [];
        $fieldsMap = CurrenciesTable::getMap();

        /** @var \Bitrix\Main\ORM\Fields\Field $field */
        foreach ($fieldsMap as $field) {
            $fields[$field->getName()] = [
                'name' => $field->getName(),
                'type ' => $field->getDataType(),
            ];
        }

        return $fields;
    }

    private function prepareFilter(): void
    {
        $requestFilter = [];
        foreach ($this->arResult['fields'] as $field) {
            if ($field['name'] === 'id') {
                continue;
            }

            if ($field['name'] === 'date') {
                if (!empty($this->request->getQuery('date_from'))) {
                    $requestFilter['>=date'] = new BitrixDatetime($this->request->getQuery('date_from'),DateTime::ISO8601_EXPANDED);
                }

                if (!empty($this->request->getQuery('date_to'))) {
                    $requestFilter['<=date'] = new BitrixDatetime($this->request->getQuery('date_to'),DateTime::ISO8601_EXPANDED);
                }

                continue;
            }

            if ($field['name'] === 'course') {
                if (!empty($this->request->getQuery('course_from'))) {
                    $requestFilter['>=course'] = $this->request->getQuery('course_from');
                }

                if (!empty($this->request->getQuery('course_to'))) {
                    $requestFilter['<=course'] = $this->request->getQuery('course_to');
                }

                continue;
            }

            if (!empty($this->request->getQuery($field['name']))) {
                $requestFilter[$field['name']] = $this->request->getQuery($field['name']);
            }
        }

        $filterName = $this->arParams['filterName'];

        global $$filterName;
        $$filterName = $requestFilter;
    }
}