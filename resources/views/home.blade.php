@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="d-flex justify-content-center">
                        <a class="btn btn-primary mx-2" href="{{ route('sheets') }}">Check your cheat sheets</a>
                        <a class="btn btn-secondary mx-2" href="{{ route('sheets.create') }}">Create a new cheat sheet</a>
                        <a class="btn btn-warning mx-2" href="{{ route('sheets.pinned') }}">Pinned cheat sheet</a>
                        <a class="btn btn-success mx-2" href="{{ route('sheets.most') }}">Most visited cheat sheet</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
