<?php

use App\Report\DataSources\JsonFileDataSource;

class DataSourceTest extends TestCase {

    /**
     * @return void
     */
    public function testRetrieve()
    {
        $dataSource = new JsonFileDataSource(base_path('/tests/files/report.json'));

        $collection = collect([
            'Columns' => [],
            'Rows' => [],
        ]);

        $this->assertTrue($dataSource->retrieve() == $collection);
    }
}
