@extends('layouts.app')

@section('content')
    <div class="container">
        @include('errors')
        @include('travels.create_modal')
        <h6 style="text-align: center;">＜ ALL ＞</h6>
        @foreach ($travels as $travel)
            @include('travels.card')
        @endforeach
    </div>
@endsection
