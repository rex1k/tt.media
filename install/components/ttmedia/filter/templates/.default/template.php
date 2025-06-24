<?php

/**
 * @var $APPLICATION CMain
 * @var $arResult array
 */

use Bitrix\Main\Application;

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

$request = Application::getInstance()->getContext()->getRequest();
$dateFrom = $request->getQuery('date_from');
$dateTo = $request->getQuery('date_to');
$courseFrom = $request->getQuery('course_from');
$courseTo = $request->getQuery('course_to');
$code = $request->getQuery('code');

?>

<form action="<?= $APPLICATION->GetCurPage() ?>" method="get" style="width: 50%;" class="rounded px-3 py-3 border mb-3 mt-5 mx-auto">
    <?php foreach ($arResult['fields'] as $field) { ?>
        <?php switch ($field['name']) {
            case 'id':
                continue 2;
            case 'date': ?>
                <div class="input-group mb-3">
                    <label for="dateFrom" class="form-label">Date from</label>
                    <input class="form-control ms-2" placeholder="date from" value="<?= $dateFrom ?: '' ?>"
                           type="datetime-local" name="date_from" id="dateFrom">
                    <label for="dateTo" class="form-label ms-2">Date to</label>
                    <input class="form-control ms-2" placeholder="date to" value="<?= $dateTo ?>"
                           type="datetime-local" name="date_to" id="dateTo">
                </div>
                <?php
                break;
            case 'course': ?>
                <div class="input-group mb-3">
                    <label for="course_from" class="form-label">Course from</label>
                    <input class="form-control ms-2" placeholder="course from" value="<?= $courseFrom ?: '' ?>"
                           type="number" step="0.01" name="course_from" id="course_from">
                    <label for="course_to" class="form-label ms-2">Course to</label>
                    <input class="form-control ms-2" placeholder="course to" value="<?= $courseTo ?: '' ?>"
                           type="number" step="0.01" name="course_to" id="course_to">
                </div>
                <?php
                break;
            default: ?>
                <div class="mb-3 input-group">
                    <label for="code" class="form-label">Code</label>
                    <input class="form-control ms-4" placeholder="code" type="text" value="<?= $code ?: '' ?>" name="code" id="code">
                </div>
                <?php break;
        }
    } ?>
    <button type="submit" class="btn btn-primary" value="send">Поиск</button>
    <a class=" btn btn-primary" href="<?= $APPLICATION->getCurPage() ?>">Очистить</a>
</form>


