@extends('layouts.app')

@section('content')
    <div class="container">

        @include('payments.modal')

    <h6 class="ml-2" style="text-align: center">＜ {{ $travel->name }} ＞</h6>

        <payment-component
            :initial-payments='@json($payments)'
            :initial-members='@json($members)'
        >
        </payment-component>
    </div>
@endsection
