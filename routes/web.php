<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api', 'middleware' => 'autenticador'], function () use ($router){
    $router->group(['prefix' => 'series'], function () use ($router){
        $router->post('', 'SeriesController@store');
        $router->get('', 'SeriesController@index');
        $router->get('{id}', 'SeriesController@show');
        $router->put('{id}', 'SeriesController@update');
        $router->delete('{id}', 'SeriesController@destroy');

        $router->get('{serie_id}/episodios', 'EpisodiosController@buscaPorSerie');
    });

    $router->group(['prefix' => 'episodios'], function () use ($router) {
    $router->post('', 'EpisodiosController@store');
    $router->get('', 'EpisodiosController@index');
    $router->get('{id}', 'EpisodiosController@show');
    $router->put('{id}', 'EpisodiosController@update');
    $router->delete('{id}', 'EpisodiosController@destroy');
});

});

$router->post('/api/login', 'TokenController@gerarToken');
