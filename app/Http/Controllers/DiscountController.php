<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Currencies;
use App\Services\MoneyService;

class DiscountController extends Controller
{

    public function index(Request $request): View
    {
        $currencies = Currencies::orderBy('currency_name')->get();

        return view('discount.index', compact('currencies'));
    }
    public function compute(Request $request, MoneyService $moneyService): View
    {
        $validatedData = $request->validate([
            'currency' => 'required|exists:currencies,currency_iso_code',
            'discount_rate' => 'required|numeric|min:0|max:100',
            'amount' => 'required',
        ], [
            'currency.required' => 'Currency must be provided.',
            'discount_rate.required' => 'Discount Rate must be provided.',
            'discount_rate.integer' => 'Discount Rate must be an absolute value.',
            'amount.required' => 'Amount is required.',
        ]);

        $result = $moneyService->calculateDiscount(
            $request->input('discount_rate'), 
            $request->input('amount'),
            $request->input('currency'));
        $currencies = Currencies::orderBy('currency_name')->get();

        $oldcurrency = $request->input('currency');
        $discountrate = $request->input('discount_rate');
        $amount = $request->input('amount');

        return view('discount.compute', compact('currencies', 'oldcurrency', 'discountrate', 'amount', 'result'));
    }
}
