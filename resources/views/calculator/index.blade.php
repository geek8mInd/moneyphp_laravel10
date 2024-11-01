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

        <form action="{{ route('calculator.compute') }}" method="POST">      
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
                <label class="form-label" for="operation">Operation:</label>
                <select name="operation" id="operation" class="form-control @error('operation') is-invalid @enderror" placeholder="Operation">
                    <option value="">-- Please select operation --</option>
                    <option value="add" {{ old('operation') == 'add' ? "selected" : "" }}>Add</option>
                    <option value="subtract" {{ old('operation') == 'subtract' ? "selected" : "" }}>Subtract</option>
                    <option value="multiply" {{ old('operation') == 'multiply' ? "selected" : "" }}>Multiply</option>
                    <option value="divide" {{ old('operation') == 'divide' ? "selected" : "" }}>Divide</option>
                </select>
                @error('operation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="inputOne">#1 Input:</label>
                <input 
                    type="text" 
                    name="inputone" 
                    id="inputone"
                    class="form-control @error('inputone') is-invalid @enderror" 
                    placeholder="#1 Input"
                    value={{ old('inputone')}}>
                @error('inputone')
                    <span class="text-danger">{{ $message }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label" for="inputTwo">#2 Input:</label>
                <input 
                    type="text" 
                    name="inputtwo" 
                    id="inputTwo"
                    class="form-control @error('inputtwo') is-invalid @enderror" 
                    placeholder="#2 Input"
                    value={{ old('inputtwo')}}>
                @error('inputtwo')
                    <span class="text-danger">{{ $message }}</span>
                @endif
            </div>
     
            <div class="mb-3">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
        </form>
    </div>
@endsection