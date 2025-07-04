<?php

use Bitrix\Main\Loader;
use TTMedia\Table\CurrenciesTable;

class CurrencyListComponent extends CBitrixComponent
{
    public function __construct($component = null)
    {
        Loader::includeModule('tt.media');
        parent::__construct($component);
    }

    public function onPrepareComponentParams($arParams)
    {
        $filterName = $arParams['filterName'];

        if (!empty($filterName)) {
            global $$filterName;

            $arParams['filter'] = $$filterName;
        }

        $arParams['page'] = $this->request->getQuery('page') ?? 1;
        $arParams['sort'] = $this->request->getQuery('sort') ?? 'id';
        $arParams['order'] = $this->request->getQuery('order') ?? 'ASC';

        return parent::onPrepareComponentParams($arParams);
    }

    public function executeComponent()
    {
        $this->arResult['count'] = $this->getElementsCount();
        $this->arResult['pages'] = 1;

        if ($this->arResult['count'] > (int)$this->arParams['showOnPage']) {
            (int)$this->arResult['pages'] = $this->arResult['count'] / ($this->arParams['showOnPage'] ?: 10);

            if (($this->arResult['count'] % ((int)$this->arParams['showOnPage'] ?: 10)) > 0) {
                $this->arResult['pages'] += 1;
            }
        }

        $this->arResult['elements'] = $this->getElements();

        $this->includeComponentTemplate();
    }

    private function getElements(): array
    {
        $params = [
            'filter' => $this->arParams['filter'] ?? [],
            'limit' => $this->arParams['showOnPage'] ?? 10,
            'offset' => ($this->arParams['showOnPage'] ?? 10) * ((int)$this->arParams['page'] - 1),
            'order' => [$this->arParams['sort'] => $this->arParams['order']]
        ];

        if ($this->arParams['usePageNavigation'] !== 'Y') {
            unset($params['limit']);
            unset($params['offset']);
        }

        $result = CurrenciesTable::getList($params)->fetchAll();

        if (!empty($result)) {
            $result = array_column($result, null, 'id');
        }

        return $result;
    }

    private function getElementsCount(): int
    {
        return CurrenciesTable::getCount($this->arParams['filter'] ?? []);
    }
}