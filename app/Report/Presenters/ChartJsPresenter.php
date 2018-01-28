<?php

namespace App\Report\Presenters;

use Illuminate\Support\Collection;
use Illuminate\View\View;

class ChartJsPresenter implements PresenterContract
{
    /**
     * @param Collection $collection
     * @return View
     */
    public function view(Collection $collection)
    {
        return view('presenters.chartjs', [
            'labels' => $this->labels($collection),
            'datasets' => $this->datasets($collection),
            'color' => $this->generateColorString(),
        ]);
    }

    /**
     * @param Collection $collection
     * @return string
     */
    protected function labels(Collection $collection)
    {
        $columns = $collection->get('Columns');

        if ($columns instanceof Collection) {
            $columns = $columns->toArray();
        }

        return '"'.implode('", "', $columns).'"';
    }

    /**
     * @param Collection $collection
     * @return array
     */
    protected function datasets(Collection $collection)
    {
        $datasets = [];

        $rows = $collection->get('Rows');

        if ($rows instanceof Collection) {
            $rows = $rows->toArray();
        }

        foreach ($rows as $rowName => $row) {
            $datasets[] = [
                'label' => $rowName,
                'data' => implode(',', $row),
            ];
        }

        return $datasets;
    }

    public function generateColorString()
    {
        return function($n) {
            $color1 = $n % 4 * 20 + 100;
            $color2 = $n % 3 * 30 + 100;
            $color3 = $n % 2 * 40 + 100 ;

            return "rgba({$color1},{$color2},{$color3}, 1)";
        };
    }
}