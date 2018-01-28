<?php

namespace App\Report\SettingStorage;

use App\Report\Settings\SettingsContract;

interface SettingStorageContract
{
    /**
     * @param SettingsContract $settings
     * @return void
     */
    public function save(SettingsContract $settings);

    /**
     * @return SettingsContract
     */
    public function retrieve();
}