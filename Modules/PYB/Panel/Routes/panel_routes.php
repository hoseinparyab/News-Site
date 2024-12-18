<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function ($router) {
    $router->get('panel', ['uses' => 'PanelController@index','as' => 'panel.index']);
});
