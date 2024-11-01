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
            'amount' => 'required',
            'conversion_ratio' => 'required'
        ], [
            'currency.required' => 'Base Currency is required.',
            'currency.max' => 'Base Currency must be selected.',
            'next_currency.required' => 'Convert To field must be selected.',
            'next_currency.max' => 'Convert To field must be selected.',
            'amount.required' => 'Amount must be provided.',
            'conversion_ratio.required' => 'Amount must be provided.',
        ]);

        $currencies = Currencies::orderBy('currency_name')->get();
        $oldcurrency = $request->input('currency');
        $next_currency = $request->input('next_currency');
        $amount = $request->input('amount');
        $conversion_ratio = $request->input('conversion_ratio');

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
