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

        <form action="{{ route('aggregation.compute') }}" method="POST">      
            @csrf
            <div class="mb-3">
                <label class="form-label" for="operation">Operation:</label>
                <select name="operation" id="operation" class="form-control @error('operation') is-invalid @enderror" placeholder="Operation">
                    <option value="">-- Please select operation --</option>
                    <option value="min" {{ old('operation') == 'min' ? "selected" : "" }}>Lowest (Min)</option>
                    <option value="max" {{ old('operation') == 'max' ? "selected" : "" }}>Highest (Max)</option>
                    <option value="avg" {{ old('operation') == 'avg' ? "selected" : "" }}>Average (Avg)</option>
                    <option value="sum" {{ old('operation') == 'sum' ? "selected" : "" }}>Total (Sum)</option>
                </select>
                @error('operation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

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
                <label class="form-label" for="inputone">Input #1:</label>
                <input 
                    type="text" 
                    name="inputone" 
                    id="inputone"
                    class="form-control @error('inputone') is-invalid @enderror" 
                    placeholder="Entities (Set)"
                    value={{ old('inputone')}}>
                @error('inputone')
                    <span class="text-danger">{{ $message }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label" for="inputtwo">Input #2:</label>
                <input 
                    type="text" 
                    name="inputtwo" 
                    id="inputtwo"
                    class="form-control @error('inputtwo') is-invalid @enderror" 
                    placeholder="Entities (Set)"
                    value={{ old('inputtwo')}}>
                @error('inputtwo')
                    <span class="text-danger">{{ $message }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label class="form-label" for="inputthree">Input #3:</label>
                <input 
                    type="text" 
                    name="inputthree" 
                    id="inputthree"
                    class="form-control @error('inputthree') is-invalid @enderror" 
                    placeholder="Entities (Set)"
                    value={{ old('inputthree')}}>
                @error('inputthree')
                    <span class="text-danger">{{ $message }}</span>
                @endif
            </div>
     
            <div class="mb-3">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
        </form>
    </div>
@endsection