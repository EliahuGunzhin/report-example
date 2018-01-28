<?php

namespace App\Report\SettingStorage;

use App\Report\Settings\SettingsContract;

/**
 * Class SessionSettingStorage
 *
 * TODO: IMPORTANT! This class must to be origin handler settings storage.
 * But I have problem with sessions and csrf-token in lumen 5.1 and don't have a time that resolve it.
 *
 */
class SessionSettingStorage extends SettingStorage
{
    /**
     * @param SettingsContract $settings
     */
    public function save(SettingsContract $settings)
    {
        session([
            self::SESSION_SETTING_STORAGE_DATA_SOURCE_NAME => get_class($settings->dataSource()),
            self::SESSION_SETTING_STORAGE_PRESENTER_NAME => get_class($settings->presenter()),
        ]);
    }

    /**
     * @return string|null
     */
    public function retrieve()
    {
        $dataSourceClassName = session(self::SESSION_SETTING_STORAGE_DATA_SOURCE_NAME);
        $presenterClassName = session(self::SESSION_SETTING_STORAGE_PRESENTER_NAME);

        return $this->getSettings($dataSourceClassName, $presenterClassName);
    }
}