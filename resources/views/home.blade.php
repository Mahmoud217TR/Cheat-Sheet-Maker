@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a href="{{ route('sheets') }}">Check your cheat sheets</a>
                    <br>
                    <a href="{{ route('sheets.create') }}">Create a new cheat sheet</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
