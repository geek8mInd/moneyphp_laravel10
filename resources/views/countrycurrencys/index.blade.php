@extends('layout')

@extends('navbar')  

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Countries & Currencies</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('countrycurrencys.create') }}"> Create New (Countries & Currencies)</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Country</th>
            <th>Currency</th>
            <th>Symbol</th>
            <th>Rate</th>
            <th>Money Object Representation</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($countrycurrencys as $countrycurrency)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $countrycurrency->country->country_name }}</td>
            <td>{{ $countrycurrency->currency->currency_name }}</td>
            <td>{{ $countrycurrency->currency->currency_symbol }}</td>
            <td>{{ $countrycurrency->currency_rate }}</td>
            <td>{{ $countrycurrency->formatted_currency_rate }}</td>
            <td>
                <form action="{{ route('countrycurrencys.destroy',$countrycurrency->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('countrycurrencys.show',$countrycurrency->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('countrycurrencys.edit',$countrycurrency->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    {!! $countrycurrencys->links() !!}
@endsection