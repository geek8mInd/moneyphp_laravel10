<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Countrycurrency;
use App\Models\Currencies;

class CountrycurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $countrycurrencys = Countrycurrency::with("currency")
            ->latest()->paginate(20);

        return view('countrycurrencys.index',compact('countrycurrencys'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $currencies = Currencies::orderBy('currency_name')->get();

        return view('countrycurrencys.create', compact('currencies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'currency_id' => 'required|integer',
            'currency_rate' => 'required',
        ]);

        Countrycurrency::create($request->all());

        return redirect()->route('countrycurrencys.index')
            ->with('success','New record has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Countrycurrency $countrycurrency): View
    {
        return view('countrycurrencys.show',compact('countrycurrency'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Countrycurrency $countrycurrency): View
    {
        $currencies = Currencies::orderBy('currency_name')->get();

        return view('countrycurrencys.edit',compact('countrycurrency', 'currencies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Countrycurrency $countrycurrency): RedirectResponse
    {
        $request->validate([
            'currency_id' => 'required|integer',
            'currency_rate' => 'required',
        ]);
        $countrycurrency->update($request->all());

        return redirect()->route('countrycurrencys.index')
            ->with('success','Record has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Countrycurrency $countrycurrency): RedirectResponse
    {
        $countrycurrency->delete();

        return redirect()->route('countrycurrencys.index')
                        ->with('success','Record has been deleted successfully');
    }
}
