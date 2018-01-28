<?php

namespace App\Report\Settings;

use App\Report\DataSources\DataSourceContract;
use App\Report\Presenters\PresenterContract;

class Settings implements SettingsContract
{
    /** @var DataSourceContract */
    protected $dataSource;

    /** @var PresenterContract */
    protected $presenter;

    /**
     * Settings constructor.
     * @param DataSourceContract $dataSource
     * @param PresenterContract $presenter
     */
    public function __construct(DataSourceContract $dataSource, PresenterContract $presenter)
    {
        $this->dataSource = $dataSource;
        $this->presenter = $presenter;
    }

    /**
     * @return DataSourceContract
     */
    public function dataSource()
    {
        return $this->dataSource;
    }

    /**
     * @return PresenterContract
     */
    public function presenter()
    {
        return $this->presenter;
    }
}