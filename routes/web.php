<?php

    Route::resource('/', 'OrderController')->except(['create', 'store', 'show']);
