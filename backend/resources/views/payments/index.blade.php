@extends('layouts.app')

@section('content')
    <div class="container">

        @include('payments.modal')

        <payment-component
            :initial-payments='@json($payments)'
            :initial-members='@json($members)'
        >
        </payment-component>
    </div>
@endsection
