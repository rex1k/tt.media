<?php

/**
 * @var $APPLICATION CMain
 * @var $arResult array
 */

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>

<form action="<?= $APPLICATION->GetCurPage() ?>" method="get">
    <?php foreach ($arResult['fields'] as $field) {
        switch ($field['name']) {
            case 'id':
                continue 2;
            case 'date': ?>
                <input placeholder="date from" type="datetime-local" name="date_from">
                <input placeholder="date to" type="datetime-local" name="date_to">
            <?php
                break;
            case 'course': ?>
            <input placeholder="course from" type="number" step="0.01" name="course_from">
            <input placeholder="course to" type="number" step="0.01" name="course_to">

            <?php
                break;
            default: ?>
            <input placeholder="code" type="text" name="code">
        <?php   break;
        }
    } ?>
    <input type="submit" value="send">
</form>

<a href="<?= $APPLICATION->getCurPage() ?>">очистить</a>
