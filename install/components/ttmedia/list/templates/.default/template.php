<?php

/**
 * @var $arResult array
 * @var $arParams array
 */

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>

<table>
    <thead>
    <tr>
        <?php foreach ($arParams['fieldsList'] as $field) { ?>
            <td><a class="sort" data-sort="<?= $field ?>" href="javascript:void(0);"><?= $field ?></a></td>
        <?php } ?>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($arResult['elements'] as $element) { ?>
        <tr>
            <?php foreach ($arParams['fieldsList'] as $field) { ?>
                <td><?= $element[$field] ?></td>
            <?php } ?>
        </tr>
    <?php } ?>
    </tbody>
</table>

<?php if ($arParams['usePageNavigation'] === 'Y') {
    $page = 1;
    while ($page <= $arResult['pages']) { ?>
        <a class="page" data-page="<?= $page ?>" href="javascript:void(0);"><?= $page ?></a>
        <?php $page++;
    }
} ?>
