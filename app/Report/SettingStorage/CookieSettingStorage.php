<?php

namespace App\Report\SettingStorage;

use App\Report\Settings\SettingsContract;

class CookieSettingStorage extends SettingStorage
{
    /**
     * @param SettingsContract $settings
     */
    public function save(SettingsContract $settings)
    {
        setcookie(self::SESSION_SETTING_STORAGE_DATA_SOURCE_NAME, get_class($settings->dataSource()));
        setcookie(self::SESSION_SETTING_STORAGE_PRESENTER_NAME, get_class($settings->presenter()));
    }

    /**
     * @return string|null
     */
    public function retrieve()
    {
        $dataSourceClassName = array_get($_COOKIE, self::SESSION_SETTING_STORAGE_DATA_SOURCE_NAME);
        $presenterClassName = array_get($_COOKIE, self::SESSION_SETTING_STORAGE_PRESENTER_NAME);

        return $this->getSettings($dataSourceClassName, $presenterClassName);
    }
}