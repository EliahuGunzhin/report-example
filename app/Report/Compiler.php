<?php

namespace App\Report;

use App\Report\Settings\SettingsContract;
use App\Report\SettingStorage\SettingStorageContract;
use Illuminate\Support\Collection;

class Compiler
{
    /**
     * @var SettingsContract
     */
    public $defaultSettings;

    /**
     * @var SettingStorageContract
     */
    public $settingStorage;

    /**
     * Compiler constructor.
     *
     * @param SettingsContract $defaultSettings
     * @param SettingStorageContract $settingStorage
     */
    public function __construct(SettingsContract $defaultSettings, SettingStorageContract $settingStorage)
    {
        $this->defaultSettings = $defaultSettings;
        $this->settingStorage = $settingStorage;
    }

    /**
     * @return SettingsContract
     */
    public function getCurrentSettings()
    {
        $savedSettings = $this->settingStorage->retrieve();

        if ($savedSettings instanceof SettingsContract) {
            return $savedSettings;
        }

        return $this->defaultSettings;
    }

    /**
     * @param SettingsContract $newSettings
     * @return SettingsContract
     */
    public function saveCurrentSettings(SettingsContract $newSettings)
    {
        $this->settingStorage->save($newSettings);
    }

    /**
     * Compile data collection
     *
     * @return Collection
     */
    public function getData()
    {
        return $this->getCurrentSettings()->dataSource()->retrieve();
    }

    /**
     * Compile view
     */
    public function getView()
    {
        return $this->getCurrentSettings()->presenter()->view($this->getData());
    }
}