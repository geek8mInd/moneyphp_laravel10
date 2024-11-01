@extends('layout')

@extends('navbar')  

@section('content')
    <div class="container">
        <h1>{{ ucfirst(Route::current()->uri) }}</h1>
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
        @endif

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

        <form action="{{ route('conversion.compute') }}" method="POST">      
            @csrf
            <div class="mb-3">
                <label class="form-label" for="currency">Base Currency:</label>
                <select name="currency" id="currency" class="form-control @error('currency') is-invalid @enderror" placeholder="Currency" @disabled(true)>
                    <option>-- Please select currency --</option>
                    @foreach($currencies as $currency)
                        <option value="{{ $currency->currency_iso_code }}" {{ $oldcurrency == $currency->currency_iso_code ? "selected" : "" }}>
                            {{ $currency->currency_name }}
                        </option>
                        @endforeach
                </select>
                @error('currency')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="next_currency">Convert To:</label>
                <select name="next_currency" id="next_currency" class="form-control @error('next_currency') is-invalid @enderror" placeholder="Currency" @disabled(true)>
                    <option>-- Please select currency --</option>
                    @foreach($currencies as $currency)
                        <option value="{{ $currency->currency_iso_code }}" {{ $next_currency == $currency->currency_iso_code ? "selected" : "" }}>
                            {{ $currency->currency_name }}
                        </option>
                        @endforeach
                </select>
                @error('next_currency')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="amount">Amount:</label>
                <input 
                    type="text" 
                    name="amount" 
                    id="amount"
                    class="form-control @error('amount') is-invalid @enderror" 
                    placeholder="Amount"
                    value={{ $amount }}
                    @readonly(true)>
                @error('amount')
                    <span class="text-danger">{{ $message }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label" for="conversion_ratio">Conversion Ratio:</label>
                <input 
                    type="text" 
                    name="conversion_ratio" 
                    id="conversion_ratio"
                    class="form-control @error('conversion_ratio') is-invalid @enderror" 
                    placeholder="Conversion Ratio"
                    value={{ $conversion_ratio }}
                    @readonly(true)>
                @error('conversion_ratio')
                    <span class="text-danger">{{ $message }}</span>
                @endif
            </div>
     
            <div class="mb-3 bg-info">
                <label class="form-label" for="result">Result:</label>
                <input 
                    type="text" 
                    name="result" 
                    id="result"
                    class="form-control" 
                    placeholder="Result"
                    value={{ $result }} @readonly(true)>
            </div>

            <div class="mb-3">
                <a class="btn btn-primary" href="{{ route('conversion.index') }}"> Back</a>
            </div>
        </form>
    </div>
@endsection