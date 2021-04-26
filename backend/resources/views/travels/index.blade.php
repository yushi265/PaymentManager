@extends('layouts.app')

@section('content')
    <div class="container">
        @include('errors')
        @include('travels.modal')
        <h6 style="text-align: center;">＜ ALL ＞</h6>
        @foreach ($travels as $travel)
            <a href="{{ route('travels.show', ['travel' => $travel]) }}">
                @include('travels.card')
            </a>
        @endforeach
    </div>
@endsection
