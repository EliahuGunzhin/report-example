<?php

use App\Report\Compiler;
use App\Report\DataSources\JsonFileDataSource;
use App\Report\Presenters\TablePresenter;
use App\Report\Settings\Settings;
use App\Report\SettingStorage\SessionSettingStorage;

class SettingsTest extends TestCase {

    /**
     * @return void
     */
    public function testDataSource()
    {
        $dataSource = new JsonFileDataSource(base_path('/tests/files/report.json'));
        $presenter = new TablePresenter();
        $settings = new Settings($dataSource, $presenter);

        $this->assertTrue($settings->dataSource() === $dataSource);
    }

    /**
     * @return void
     */
    public function testPresenter()
    {
        $dataSource = new JsonFileDataSource(base_path('/tests/files/report.json'));
        $presenter = new TablePresenter();
        $settings = new Settings($dataSource, $presenter);

        $this->assertTrue($settings->presenter() === $presenter);
    }

    /**
     * @return void
     */
    public function testGetData()
    {
        $dataSource = new JsonFileDataSource(base_path('/tests/files/report.json'));
        $presenter = new TablePresenter();
        $settings = new Settings($dataSource, $presenter);
        $settingStorage = new SessionSettingStorage();

        $compiler = new Compiler($settings, $settingStorage);

        $this->assertTrue($compiler->getData() == $dataSource->retrieve());
    }

    /**
     * @return void
     */
    public function testGetView()
    {
        $dataSource = new JsonFileDataSource(base_path('/tests/files/report.json'));
        $presenter = new TablePresenter();
        $settings = new Settings($dataSource, $presenter);
        $settingStorage = new SessionSettingStorage();

        $compiler = new Compiler($settings, $settingStorage);

        $this->assertTrue($compiler->getView() == $presenter->view($dataSource->retrieve()));
    }

}
