<?php

Route::get('wiki/{url?}', [
    'as'   => 'wiki.page.show',
    'uses' => 'DigitalRonin\Wiki\Controllers\WikiController@show',
]);

Route::get('wiki/{url?}/edit', [
    'as'   => 'wiki.page.edit',
    'uses' => 'DigitalRonin\Wiki\Controllers\WikiController@edit',
]);

Route::get('wiki/{url?}/history', [
    'as'   => 'wiki.page.history',
    'uses' => 'DigitalRonin\Wiki\Controllers\WikiController@history'
]);
