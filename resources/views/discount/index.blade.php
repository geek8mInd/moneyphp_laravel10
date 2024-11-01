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

        <form action="{{ route('discount.compute') }}" method="POST">      
            @csrf
            <div class="mb-3">
                <label class="form-label" for="currency">Currency:</label>
                <select name="currency" id="currency" class="form-control @error('currency') is-invalid @enderror" placeholder="Currency">
                    <option>-- Please select currency --</option>
                    @foreach($currencies as $currency)
                        <option value="{{ $currency->currency_iso_code }}" {{ old('currency') == $currency->currency_iso_code ? "selected" : "" }}>
                            {{ $currency->currency_name }}
                        </option>
                        @endforeach
                </select>
                @error('currency')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="discount_rate">Discount Rate:</label>
                <input 
                    type="text" 
                    name="discount_rate" 
                    id="discount_rate"
                    class="form-control @error('discount_rate') is-invalid @enderror" 
                    placeholder="Discount Rate (%)"
                    value={{ old('discount_rate')}}>
                @error('discount_rate')
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
                    value={{ old('amount')}}>
                @error('amount')
                    <span class="text-danger">{{ $message }}</span>
                @endif
            </div>
     
            <div class="mb-3">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
        </form>
    </div>
@endsection