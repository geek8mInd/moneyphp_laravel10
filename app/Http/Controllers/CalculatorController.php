<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Currencies;
use App\Services\MoneyService;

class CalculatorController extends Controller
{
    public function index(Request $request): View
    {
        $currencies = Currencies::orderBy('currency_name')->get();

        return view('calculator.index', compact('currencies'));
    }
    public function compute(Request $request, MoneyService $moneyService): View
    {
        $validatedData = $request->validate([
            'currency' => 'required|exists:currencies,currency_iso_code',
            'operation' => 'required',
            'inputone' => 'required|regex:/^[1-9]\d*(\.\d+)?$/',
            'inputtwo' => 'required|regex:/^[1-9]\d*(\.\d+)?$/',
        ], [
            'currency.required' => 'Currency must be selected.',
            'operation.required' => 'Operation must be selected.',
            'inputone.required' => '#1 Input is required.',
            'inputone.regex'=> '#1 Input must only contain numbers and decimal period',
            'inputtwo.required' => '#2 Input is required.',
            'inputtwo.regex'=> '#2 Input must only contain numbers and decimal period',
            
        ]);

        $currencies = Currencies::orderBy('currency_name')->get();

        $oldcurrency = $request->input('currency');
        $operation = $request->input('operation');
        $inputone = $request->input('inputone');
        $inputtwo = $request->input('inputtwo');

        switch ($operation) {
            case 'add':
            case 'subtract':
                $inputone_abs_value = ($request->input('inputone') * 100)/1;
                $inputtwo_abs_value = ($request->input('inputtwo') * 100)/1;
                break;
            default:
                $inputone_abs_value = ($request->input('inputone') * 100)/1;
                $inputtwo_abs_value = $request->input('inputtwo');
                break;
        }

        $result = $moneyService->calculateBasic(
            $request->input('currency'), 
            $request->input('operation'), 
            $inputone_abs_value,
            $inputtwo_abs_value);

        return view('calculator.compute', compact('currencies', 'oldcurrency','operation', 'inputone', 'inputtwo','result'));
    }
}
