<?php

use App\Http\Livewire\Produk;
use App\Http\Livewire\Produk\Properti\Category;
use App\Http\Livewire\Produk\Properti\Color;
use Illuminate\Support\Facades\Route;

// main route
Route::get('warna', [Color::class, 'index'])->middleware(['auth'])->name('warna');
Route::get('kategori', [Category::class, 'index'])->middleware(['auth'])->name('kategori');
Route::get('produk', [Produk::class, 'index'])->middleware(['auth'])->name('produk');

// dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
require __DIR__ . '/auth.php';
