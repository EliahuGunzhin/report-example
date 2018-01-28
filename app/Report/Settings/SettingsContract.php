<?php

namespace App\Report\Settings;

use App\Report\DataSources\DataSourceContract;
use App\Report\Presenters\PresenterContract;

interface SettingsContract
{
    /**
     * @return DataSourceContract
     */
    public function dataSource();

    /**
     * @return PresenterContract
     */
    public function presenter();
}