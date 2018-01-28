<?php

use App\Report\DataSources\JsonFileDataSource;
use App\Report\Presenters\TablePresenter;

class PresenterTest extends TestCase {

    /**
     * @return void
     */
    public function testView()
    {
        $presenter = new TablePresenter();
        $dataSource = new JsonFileDataSource(base_path('/tests/files/report.json'));

        $collection = $dataSource->retrieve();

        $view = view('presenters.table')->with([
            'collection' => $collection
        ]);

        $this->assertTrue($presenter->view($collection) == $view);
    }
}
