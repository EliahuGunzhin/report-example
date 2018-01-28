<?php

namespace App\Providers;

use App\Report\DataSources\DataSourceContract;
use App\Report\DataSources\JsonFileDataSource;
use App\Report\Presenters\PresenterContract;
use App\Report\Presenters\TablePresenter;
use App\Report\Settings\Settings;
use App\Report\Settings\SettingsContract;
use App\Report\SettingStorage\CookieSettingStorage;
use App\Report\SettingStorage\SessionSettingStorage;
use App\Report\SettingStorage\SettingStorageContract;
use Illuminate\Support\ServiceProvider;

class ReportServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Initialize default settings

        $this->app->bind(JsonFileDataSource::class, function () {
            return new JsonFileDataSource(base_path('/public/data_source/report.json'));
        });

        $this->app->bind(DataSourceContract::class, JsonFileDataSource::class);

        $this->app->bind(PresenterContract::class, function () {
            return new TablePresenter();
        });

        $this->app->bind(SettingsContract::class, Settings::class);

        $this->app->bind(SettingStorageContract::class, function () {
            return new CookieSettingStorage();
        });
    }
}
