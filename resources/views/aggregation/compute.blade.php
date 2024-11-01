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
                    <option value="lowest" {{ old('operation') == 'lowest' ? "selected" : "" }}>Lowest (Min)</option>
                    <option value="highest" {{ old('operation') == 'highest' ? "selected" : "" }}>Highest (Max)</option>
                    <option value="average" {{ old('operation') == 'average' ? "selected" : "" }}>Average (Avg)</option>
                    <option value="total" {{ old('operation') == 'total' ? "selected" : "" }}>Total (Sum)</option>
                </select>
                @error('operation')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="entities">Entities/Set (separated by comma):</label>
                <input 
                    type="text" 
                    name="entities" 
                    id="entities"
                    class="form-control @error('entities') is-invalid @enderror" 
                    placeholder="Entities (Set)"
                    value={{ old('entities')}}>
                @error('entities')
                    <span class="text-danger">{{ $message }}</span>
                @endif
            </div>
     
            <div class="mb-3">
                <button class="btn btn-success btn-submit">Submit</button>
            </div>
        </form>
    </div>
@endsection