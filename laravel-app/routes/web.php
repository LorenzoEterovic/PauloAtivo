<?php

use App\Http\Controllers\LivroController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/livros');

Route::resource('livros', LivroController::class);
