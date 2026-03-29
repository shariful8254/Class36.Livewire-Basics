<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::livewire('/demo/counter','demo.counter');
Route::livewire('/demo/mirror','demo.mirror');
Route::livewire('/demo/todo','demo.todo');
Route::livewire('/products/search','pages::products.search');



