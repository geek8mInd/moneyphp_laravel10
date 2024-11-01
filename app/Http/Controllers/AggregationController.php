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
            'entities' => 'required',
        ], [
            'operation.required' => 'Operation must be selected.',
            'entities.required' => 'Entities or set must be provided as separated by comma.',
        ]);

        dump($moneyService->calculateAggregation('sum', $sets = [100, -200, 300], 'EUR'));

        return view('aggregation.compute');
    }
}
