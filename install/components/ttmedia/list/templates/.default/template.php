<?php

/**
 * @var $arResult array
 * @var $arParams array
 */

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

?>

<div class="table-responsive px-5">
    <table class="table table-hover table-bordered">
        <thead class="table-light">
        <tr>
            <?php foreach ($arParams['fieldsList'] as $field) {
                $order = 'ASC';

                if ($arParams['sort'] === $field) {
                    $order = $arParams['order'] === 'ASC' ? 'DESC' : 'ASC';
                } ?>
                <th scope="col">
                    <a class="sort link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                       data-order="<?= $order ?>" data-sort="<?= $field ?>" href="javascript:void(0);"><?= $field ?></a>
                </th>
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

    <?php if ($arParams['usePageNavigation'] === 'Y') { ?>
        <div class="mb-3 mt-3">
            <?php
            $page = 1;
            $currentPage = (int)$arParams['page'] ?? 1;
            while ($page <= $arResult['pages']) { ?>
                <a class="page btn <?= $page === $currentPage ? 'btn-primary' : 'btn-light' ?>" data-page="<?= $page ?>"
                   href="javascript:void(0);"><?= $page ?></a>
                <?php $page++;
            } ?>
        </div>
    <?php } ?>
</div>