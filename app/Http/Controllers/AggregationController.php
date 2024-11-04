<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Currencies;
use App\Services\MoneyService;

class AggregationController extends Controller
{
    public function index(Request $request): View
    {
        $currencies = Currencies::orderBy('currency_name')->get();

        return view('aggregation.index', compact('currencies'));
    }
    public function compute(Request $request, MoneyService $moneyService): View
    {
        $validatedData = $request->validate([
            'operation' => 'required',
            'currency' => 'required|max:3',
            'inputone' => 'required|regex:/^[1-9]\d*(\.\d+)?$/',
            'inputtwo' => 'required|regex:/^[1-9]\d*(\.\d+)?$/',
            'inputthree' => 'required|regex:/^[1-9]\d*(\.\d+)?$/',
        ], [
            'operation.required' => 'Operation must be selected.',
            'currency.required' => 'Currency must be selected.',
            'currency.max' => 'Currency must be selected.',
            'inputone.required' => 'Input #1 must be provided.',
            'inputone.regex' => 'Input #1 must must only contain numbers and decimal period.',
            'inputtwo.required' => 'Input #2 must be provided.',
            'inputtwo.regex' => 'Input #2 must only contain numbers and decimal period.',
            'inputthree.required' => 'Input #3 must be provided.',
            'inputthree.regex' => 'Input #3 must only contain numbers and decimal period.',
        ]);

        $result = $moneyService->calculateAggregation($request->input('operation'), 
        $request->input('inputone'), 
        $request->input('inputtwo'),
        $request->input('inputthree'),
        $request->input('currency'));

        $currencies = Currencies::orderBy('currency_name')->get();

        $oldcurrency = $request->input('currency');
        $operation = $request->input('operation');
        $inputone = $request->input('inputone');
        $inputtwo = $request->input('inputtwo');
        $inputthree = $request->input('inputthree');

        return view('aggregation.compute', compact( 'currencies', 'operation', 'oldcurrency', 'inputone', 'inputtwo', 'inputthree', 'result'
        ));
    }
}
