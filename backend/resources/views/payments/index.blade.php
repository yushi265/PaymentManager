@extends('layouts.app')

@section('content')
    <div class="container">
        
        <payment-component
            :initial-payments='@json($payments)'
            :initial-members='@json($members)'
        >
        </payment-component>
    </div>
@endsection
