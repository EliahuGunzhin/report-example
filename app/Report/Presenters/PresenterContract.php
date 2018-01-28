<?php

namespace App\Report\Presenters;

use Illuminate\Support\Collection;
use Illuminate\View\View;

interface PresenterContract
{
    /**
     * @param Collection $collection
     * @return View
     */
    public function view(Collection $collection);
}