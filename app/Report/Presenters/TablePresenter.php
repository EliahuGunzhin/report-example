<?php

namespace App\Report\Presenters;

use Illuminate\Support\Collection;
use Illuminate\View\View;

class TablePresenter implements PresenterContract
{
    /**
     * @param Collection $collection
     * @return View
     */
    public function view(Collection $collection)
    {
        return view('presenters.table', [
            'collection' => $collection
        ]);
    }
}