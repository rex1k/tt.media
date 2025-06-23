### Установка

1. **Установить модуль из админки битрикс**
2. **Готово**

### Подключение

1.
```
  $APPLICATION->IncludeComponent(
    'ttmedia:filter',
    '',
    array(
        'filterName' => 'filter',
    )
  );
```
2. 
```
   $APPLICATION->IncludeComponent(
	"ttmedia:list", 
	".default", 
	array(
		"filterName" => "filter",
		"fieldsList" => array(
			0 => "id",
			1 => "code",
			2 => "date",
			3 => "course",
		),
		"usePageNavigation" => "Y"
	),
	false
  );
```

Настройки компонентов вынесены в .parameters.php, так что можно все настроить из публичной части. Имена фильтров в настройках обоих компонентов должны совпадать(по умолчанию "filter")

Компонент фильтра отрисовывает сам фильтр и подготавливает переменную. Фильтрация происходит внутри компонента списка.



