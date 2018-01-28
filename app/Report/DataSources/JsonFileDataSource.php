<?php

namespace App\Report\DataSources;

use App\Report\Exceptions\UnavailableJsonFormatException;

class JsonFileDataSource extends FileDataSource
{
    public function retrieve()
    {
        $array = json_decode($this->content, true);

        $collection = collect($array);

        if (!$collection->has('Columns') || !$collection->has('Rows')) {
            throw new UnavailableJsonFormatException("Content must include 'Columns' and 'Rows' keys");
        }

        return $collection;
    }
}