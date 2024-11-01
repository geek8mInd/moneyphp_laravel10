@extends('layout')

@extends('navbar')   

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show (Countries & Currencies)</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('countrycurrencys.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Country:</strong>
                {{ $countrycurrency->country->country_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Currency:</strong>
                {{ $countrycurrency->currency->currency_name }}
            </div>
        </div>
    </div>
@endsection