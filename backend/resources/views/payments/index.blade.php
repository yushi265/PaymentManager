@extends('layouts.app')

@section('content')
    <div class="container">
        <payment-component
            :initial-payments='@json($payments)'
        >
        </payment-component>
    </div>
@endsection
