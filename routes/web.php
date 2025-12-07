<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/storage-link', function () {
    $target = storage_path('app/public');
    $link = public_path('storage');
    if (!file_exists($link)) {
        symlink($target, $link);
        return 'Storage Linked Successfully!';
    }
    return 'Already Linked!';
});