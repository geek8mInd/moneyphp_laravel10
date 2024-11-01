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
                <select name="operation" id="operation" class="form-control @error('operation') is-invalid @enderror" placeholder="Operation" @disabled(true)>
                    <option value="">-- Please select operation --</option>
                    <option value="min" {{ $operation == 'min' ? "selected" : "" }}>Lowest (Min)</option>
                    <option value="max" {{ $operation == 'max' ? "selected" : "" }}>Highest (Max)</option>
                    <option value="avg" {{ $operation == 'avg' ? "selected" : "" }}>Average (Avg)</option>
                    <option value="sum" {{ $operation == 'sum' ? "selected" : "" }}>Total (Sum)</option>
                </select>
                @error('operation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="currency">Currency:</label>
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
                <label class="form-label" for="inputone">Input #1:</label>
                <input 
                    type="text" 
                    name="inputone" 
                    id="inputone"
                    class="form-control @error('inputone') is-invalid @enderror" 
                    placeholder="Entities (Set)"
                    value={{ $inputone }}
                    @readonly(true)>
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
                    value={{ $inputtwo }}
                    @readonly(true)>
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
                    value={{ $inputthree }}
                    @readonly(true)>
                @error('inputthree')
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
                <a class="btn btn-primary" href="{{ route('aggregation.index') }}"> Back</a>
            </div>
        </form>
    </div>
@endsection