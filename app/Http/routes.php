<?php

$app->group([
    'namespace' => 'App\Http\Controllers',
], function () use ($app) {
    $app->get('/', [
        'as' => 'index',
        'uses' => 'HomeController@index',
    ]);
    $app->post('/', [
        'as' => 'index.post',
        'uses' => 'HomeController@update',
    ]);
});
