<?php

namespace App\Http\Controllers;

use App\Services\MoneyService;
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
    public function compute(Request $request, MoneyService $moneyService): View
    {
        $validatedData = $request->validate([
            'currency' => 'required|max:3',
            'next_currency' => 'required|max:3',
            'amount' => 'required|regex:/^[1-9]\d*(\.\d+)?$/',
            'conversion_ratio' => 'required|regex:/^[1-9]\d*(\.\d+)?$/',
        ], [
            'currency.required' => 'Base Currency is required.',
            'currency.max' => 'Base Currency must be selected.',
            'next_currency.required' => 'Convert To field must be selected.',
            'next_currency.max' => 'Convert To field must be selected.',
            'amount.required' => 'Amount must be provided.',
            'amount.regex' => 'Amount must only contain numbers and decimal period.',
            'conversion_ratio.required' => 'Conversion Ratio must be provided.',
            'conversion_ratio.regex' => 'Conversion Ratio must only contain numbers and decimal period.',
        ]);

        $currencies = Currencies::orderBy('currency_name')->get();
        $oldcurrency = $request->input('currency');
        $next_currency = $request->input('next_currency');
        $conversion_ratio = $request->input('conversion_ratio');
        $amount = $request->input('amount');

        $result = $moneyService->calculateExchange($oldcurrency, $next_currency, $conversion_ratio, $amount);

        return view('conversion.compute', compact(
            'currencies',
            'oldcurrency',
            'next_currency',
            'amount',
            'conversion_ratio',
            'result'
        ));
    }
}
