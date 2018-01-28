<?php

namespace App\Report\SettingStorage;

use App\Report\DataSources\DataSourceContract;
use App\Report\Instance;
use App\Report\Presenters\PresenterContract;
use App\Report\Settings\SettingsContract;

/**
 * Class SessionSettingStorage
 *
 * TODO: IMPORTANT! This class must to be origin handler settings storage.
 * But I have problem with sessions and csrf-token in lumen 5.1 and don't have a time that resolve it.
 *
 */
abstract class SettingStorage implements SettingStorageContract
{
    const SESSION_SETTING_STORAGE_DATA_SOURCE_NAME = 'report_settings_data_source';
    const SESSION_SETTING_STORAGE_PRESENTER_NAME = 'report_settings_presenter';

    /**
     * @param $dataSourceClassName
     * @param $presenterClassName
     * @return null|string
     */
    public function getSettings($dataSourceClassName, $presenterClassName)
    {
        $dataSource = Instance::create($dataSourceClassName, DataSourceContract::class);
        $presenter = Instance::create($presenterClassName, PresenterContract::class);

        if (!$dataSource || !$presenter) {
            return null;
        }

        return app(SettingsContract::class, [
            $dataSource,
            $presenter
        ]);
    }
}