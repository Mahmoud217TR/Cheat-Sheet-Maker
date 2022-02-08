@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="pepper-container">
                <div class="papper">
                    <h1 class="display-4 text-center">
                        Welcome to Cheat Sheets Maker
                    </h1>
                    <div class="d-flex justify-content-center my-3">
                        <a href="{{ route('sheets.create') }}" class="btn btn-primary">Create your Cheat Sheet Now!!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
