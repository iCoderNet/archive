<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');

    $router->resource('categories', CategoryController::class);
    $router->resource('regions', RegionController::class);
    $router->resource('topics', TopicController::class);
    $router->resource('locations', LocationController::class);
    $router->resource('articles', ArticleController::class);
    $router->resource('videos', VideoController::class);
    $router->resource('photo-articles', PhotoArticleController::class);
    $router->resource('photo', PhotoController::class);
    $router->resource('audio', AudioController::class);
    $router->resource('appeals', AppealController::class);
    $router->resource('people', PersonController::class);

    $router->get('import/person', 'PersonController@import')->name('import.person');
    $router->post('import', 'PersonController@processImport')->name('import.person.process');

    $router->resource('language', LanguageController::class);
    $router->get('language/pages/', 'LanguageController@pages')->name('language.pages');
    $router->get('language/pages/{group}', 'LanguageController@pagesGR')->name('languages.pagesGR');
});
