<?php

use Src\Route;

Route::add('GET', '/books', [Controller\Site::class, 'books']);
Route::add('GET', '/readers', [Controller\Site::class, 'readers'])
   ->middleware('auth');
Route::add('GET', '/bookhistorys', [Controller\Site::class, 'bookhistorys'])
   ->middleware('auth');
Route::add('GET', '/borrowedbooks', [Controller\Site::class, 'borrowedbooks'])
   ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
