<?php

namespace App\Report\DataSources;

use Illuminate\Support\Collection;

interface DataSourceContract
{
    /**
     * @return Collection
     */
    public function retrieve();
}