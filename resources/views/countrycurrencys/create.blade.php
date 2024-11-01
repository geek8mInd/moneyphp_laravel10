@extends('layout')

@extends('navbar')  

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New (Countries & Currencies)</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('countrycurrencys.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('countrycurrencys.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Select Country:</strong>
                <select name="country_id" id="country_id" class="form-control @error('country_id') is-invalid @enderror">
                    <option>-- Please select country --</option>
                    @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? "selected" : "" }}>
                            {{ $country->country_name }}
                        </option>
                     @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Select Currency:</strong>
                <select name="currency_id" id="currency_id" class="form-control @error('currency_id') is-invalid @enderror">
                    <option>-- Please select currency --</option>
                    @foreach($currencies as $currency)
                        <option value="{{ $currency->id }}" {{ old('currency_id') == $currency->id ? "selected" : "" }}>
                            {{ $currency->currency_name }}
                        </option>
                     @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Currency Rate:</strong>
                <input 
                    type="text" 
                    name="currency_rate" 
                    id="currency_rate"
                    class="form-control @error('currency_rate') is-invalid @enderror" 
                    placeholder="Currency Rate"
                    value={{ old('currency_rate')}}>
            </div>
        </div>
                
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
@endsection