<?php

namespace App\Report\DataSources;

use App\Report\Exceptions\FileNotFoundException;

abstract class FileDataSource implements DataSourceContract
{
    /**
     * @var string
     */
    public $content;

    /**
     * FileDataSource constructor.
     *
     * @param string $fileName
     * @throws FileNotFoundException
     */
    public function __construct($fileName)
    {
        if (!file_exists($fileName)) {
            throw new FileNotFoundException($fileName);
        }

        $this->content = file_get_contents($fileName);
    }
}