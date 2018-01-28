<?php

namespace App\Http\Controllers;

use App\Report\Compiler;
use App\Report\DataSources\DataSourceContract;
use App\Report\Instance;
use App\Report\Presenters\PresenterContract;
use App\Report\Settings\SettingsContract;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Compiler $compiler)
    {
        return $compiler->getView()->with([
            'current_data_source' => get_class($compiler->getCurrentSettings()->dataSource()),
            'current_presenter' => get_class($compiler->getCurrentSettings()->presenter()),
        ]);
    }

    public function update(Compiler $compiler, Request $request)
    {
        $dataSourceClassName = $request->get('data_source');
        $presenterClassName = $request->get('presenter');

        $dataSource = Instance::create($dataSourceClassName, DataSourceContract::class);
        $presenter = Instance::create($presenterClassName, PresenterContract::class);

        if ($dataSource && $presenter) {

            $settings = app()->make(SettingsContract::class, [
                $dataSource,
                $presenter,
            ]);

            $compiler->saveCurrentSettings($settings);
        }

        return redirect()->route('index');
    }
}
