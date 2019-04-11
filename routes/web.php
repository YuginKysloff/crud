<?php

    Route::get('/', 'OrderController@index')->name('orders.index');
    Route::resource('orders', 'OrderController')->except(['index', 'create', 'store', 'show']);
