<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/calculadora')->group(function () {
    Route::get('soma/{n1}/{n2}', function ($n1, $n2) {
        if (is_numeric($n1) && is_numeric($n2)) {
            return 'Soma = ' . ($n1 + $n2);
        } else {
            return 'O que foi digitado não é um número';
        }
    });

    Route::get('subtracao/{n1}/{n2}', function ($n1, $n2) {
        if (is_numeric($n1) && is_numeric($n2)) {
            return 'Subtração = ' . ($n1 - $n2);
        } else {
            return 'O que foi digitado não é um número';
        }
    });

    Route::get('multiplicacao/{n1}/{n2}', function ($n1, $n2) {
        if (is_numeric($n1) && is_numeric($n2)) {
            return 'Multiplicação = ' . ($n1 * $n2);
        } else {
            return 'O que foi digitado não é um número';
        }
    });

    Route::get('divisao/{n1}/{n2}', function ($n1, $n2) {
        if (is_numeric($n1) && is_numeric($n2)) {
            return 'Divisão = ' . ($n1 / $n2);
        } else {
            return 'O que foi digitado não é um número';
        }
    });
});
