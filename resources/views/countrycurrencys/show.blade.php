@extends('layout')

@extends('navbar')   

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Currency</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('countrycurrencys.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Currency:</strong>
                <input 
                    type="text" 
                    name="currency" 
                    id="currency"
                    class="form-control" 
                    placeholder="Currency"
                    value={{ $countrycurrency->currency->currency_name }} @readonly(true)>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Symbol:</strong>
                <input 
                    type="text" 
                    name="currency_symbol" 
                    id="currency_symbol"
                    class="form-control" 
                    placeholder="Currency"
                    value={{ $countrycurrency->currency->currency_symbol }} @readonly(true)>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rate:</strong>
                <input 
                    type="text" 
                    name="currency_rate" 
                    id="currency_rate"
                    class="form-control" 
                    placeholder="Currency"
                    value={{ $countrycurrency->currency_rate }} @readonly(true)>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Money Object Representation:</strong>
                <input 
                    type="text" 
                    name="currency_rate" 
                    id="currency_rate"
                    class="form-control" 
                    placeholder="Currency"
                    value={{ $countrycurrency->formatted_currency_rate }} @readonly(true)>
            </div>
        </div>
    </div>    
@endsection