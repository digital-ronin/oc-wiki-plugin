<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
Route::get('wiki', [
    'uses' => 'DigitalRonin\Wiki\Controllers\WikiController@showPage',
    'as'   => 'wiki.index'
]);

Route::get('wiki/{slug}', [
    'as'   => 'wiki.page.show',
    'uses' => 'DigitalRonin\Wiki\Controllers\WikiController@showPage',
]);
*/

/**
 * TODO: Edit and History Routes
 *
Route::get('wiki/{page}/edit', [
    'as'   => 'wiki.page.edit',
    'uses' => 'DigitalRonin\Wiki\Controllers\WikiController@edit',
]);

Route::get('wiki/{page}/history', [
    'as'   => 'wiki.page.history',
    'uses' => 'DigitalRonin\Wiki\Controllers\WikiController@history'
]);
*/