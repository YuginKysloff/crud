<?php

    Route::get('/', 'OrderController@index')->name('orders.index');

    Route::get('/orders/email', 'OrderController@report')->name('orders.email');

    Route::resource('orders', 'OrderController')->except(['index', 'create', 'store', 'show']);
