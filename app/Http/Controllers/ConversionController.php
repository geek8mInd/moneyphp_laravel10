<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Currencies;

class ConversionController extends Controller
{
    public function index(Request $request): View
    {
        $currencies = Currencies::orderBy('currency_name')->get();

        return view('conversion.index', compact('currencies'));
    }
    public function compute(Request $request): View
    {
        $validatedData = $request->validate([
            'currency' => 'required|integer',
            'next_currency' => 'required|integer',
            'amount' => 'required',
        ], [
            'currency.required' => 'Base Currency is required.',
            'currency.integer' => 'Base Currency must be selected.',
            'next_currency.required' => 'Convert To field must be provided.',
            'next_currency.integer' => 'Convert To field must be provided.',
            'amount.required' => 'Amount is required.',
        ]);
        dump('compute');
        dump($request->toArray());
        exit;
        return view('conversion.index');
    }
}
