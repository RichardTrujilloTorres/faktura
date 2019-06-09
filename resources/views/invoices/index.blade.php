@extends('layouts.master')


@section('content')
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-primary btn-fab btn-fab-mini btn-round" href="{{ route('invoices.create') }}">
                <i class="material-icons">add</i>
            </a>
        </div>
    </div>

    // invoices listing
@endsection
