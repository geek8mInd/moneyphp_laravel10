<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CountrycurrencyController;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\ConversionController;
use App\Http\Controllers\AggregationController;
use App\Http\Controllers\DiscountController;

Route::get('/', fn() => redirect('/countrycurrencys'));
Route::resource('countrycurrencys', CountrycurrencyController::class)
    ->name('index', 'countrycurrencys.index')
    ->name('create', 'countrycurrencys.create')
    ->name('store', 'countrycurrencys.store')
    ->name('edit', 'countrycurrencys.edit')
    ->name('update', 'countrycurrencys.update')
    ->name('destroy', 'countrycurrencys.destroy');
Route::get('calculator/', [ CalculatorController::class, 'index' ])->name('calculator.index');
Route::post('calculator/', [ CalculatorController::class, 'compute' ])->name('calculator.compute');
Route::get('conversion/', [ ConversionController::class, 'index' ])->name('conversion.index');
Route::post('conversion/', [ ConversionController::class, 'compute' ])->name('conversion.compute');
Route::get('aggregation/', [ AggregationController::class, 'index' ])->name('aggregation.index');
Route::post('aggregation/', [ AggregationController::class, 'compute' ])->name('aggregation.compute');
Route::get('discount/', [ DiscountController::class, 'index' ])->name('discount.index');
Route::post('discount/', [ DiscountController::class, 'compute' ])->name('discount.compute');