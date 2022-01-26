@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <a href="{{ route('sheets.create') }}">Creat a new Cheat Sheet</a>
        </div>
    </div>
    @foreach ($sheets as $sheet)
    <div class="row justify-content-center my-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="m-0">{{ $sheet->title }}</h3>
                </div>

                <div class="card-body">
                    {!! nl2br($sheet->description) !!}
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
