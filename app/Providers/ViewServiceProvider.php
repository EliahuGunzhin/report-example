<?php

namespace App\Providers;

use App\Report\DataSources\JsonFileDataSource;
use App\Report\Presenters\ChartJsPresenter;
use App\Report\Presenters\TablePresenter;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('data_sources_list', [
            JsonFileDataSource::class => 'JSON File',
        ]);

        view()->share('presenters_list', [
            TablePresenter::class => 'Table',
            ChartJsPresenter::class => 'ChartJs',
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
