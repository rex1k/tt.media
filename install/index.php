<?php

use Bitrix\Main\EventManager;

class tt_media extends \CModule
{
    var $MODULE_ID = 'tt.media';

    var $MODULE_NAME;

    public function __construct()
    {
        $this->MODULE_NAME = 'Тест для TT media';
        $this->MODULE_DESCRIPTION = 'Валюты';
        $this->PARTNER_NAME = 'Маруняк Константин';
        $this->PARTNER_URI = 'mailto:kiber-rex@mail.ru';
    }

    /**
     * @throws Exception
     */
    function DoInstall()
    {
        $this->installTables();
        $this->copyFiles();
        RegisterModule($this->MODULE_ID);
    }

    /**
     * @throws Exception
     */
    function DoUninstall()
    {
        $this->uninstallTables();
        $this->deleteFiles();
        UnRegisterModule($this->MODULE_ID);
    }

    /**
     * @throws Exception
     */
    private function installTables()
    {
        /** @var $DB CDatabase */
        global $DB;

        $sqlFile = __DIR__ . '/db/install.sql';
        $sqlScript = file_get_contents($sqlFile);

        if (empty($sqlScript) && !file_exists($sqlFile)) {
            throw new Exception('Missing sql file.');
        }

        $DB->RunSqlBatch($sqlFile);
    }

    /**
     * @throws Exception
     */
    private function uninstallTables()
    {
        global $DB;

        $sqlFile = __DIR__ . '/db/uninstall.sql';
        $sqlScript = file_get_contents($sqlFile);

        if (empty($sqlScript) && !file_exists($sqlFile)) {
            throw new Exception('Missing sql file');
        }

        $DB->RunSqlBatch($sqlFile);
    }

    private function copyFiles()
    {
        CopyDirFiles(
            __DIR__ . '/components/ttmedia/filter/',
            $_SERVER['DOCUMENT_ROOT'] . '/local/components/ttmedia/filter/',
        );
        CopyDirFiles(
            __DIR__ . '/components/ttmedia/filter/templates/.default/',
            $_SERVER['DOCUMENT_ROOT'] . '/local/components/ttmedia/filter/templates/.default/',
        );
        CopyDirFiles(
            __DIR__ . '/components/ttmedia/list/',
            $_SERVER['DOCUMENT_ROOT'] . '/local/components/ttmedia/list/',
        );
        CopyDirFiles(
            __DIR__ . '/components/ttmedia/list/templates/.default/',
            $_SERVER['DOCUMENT_ROOT'] . '/local/components/ttmedia/list/templates/.default/',
        );
    }

    private function deleteFiles()
    {
        \Bitrix\Main\IO\Directory::deleteDirectory($_SERVER['DOCUMENT_ROOT'] . '/local/components/ttmedia');
    }
}