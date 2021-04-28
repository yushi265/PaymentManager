@extends('layouts.app')

@section('content')
    <div class="container">
        @include('errors')

        @include('payments.modal')

        <h6 class="ml-2" style="text-align: center">＜ {{ $travel->name }} ＞</h6>

        @if (isset($payments))
            <payment-component :initial-payments='@json($payments)' :initial-members='@json($members)'>
            </payment-component>
        @else
        <br>
        <p style="text-align: center;">
            イベントを追加しましょう！
        </p>
        @endif
    </div>
@endsection
