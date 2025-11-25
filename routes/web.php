<?php

use App\Models\Edisi;
use App\Models\Page;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    return view('index', [
        'edisis' => Edisi::orderBy('id', 'desc')->get()
    ]);
})->name('index');

Route::get('{edisi}', function(Edisi $edisi) {
    return view('edisi', [
        'edisi' => $edisi
    ]);
})->name('edisi');

Route::get('{edisi}/{page}', function(Edisi $edisi, Page $page) {
    return view('page', [
        'edisi' => $edisi,
        'page' => $page
    ]);
})->name('page');