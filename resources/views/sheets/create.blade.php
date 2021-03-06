@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <h1 class="m-0">Create a new Cheat Sheet</h1>
                </div>

                <div class="card-body">
                    <form action="{{ route('sheets.store') }}" method="post">
                        @csrf
                        
                        @include('sheets.sheets-form')
                        <div class="row">
                            <div class="col-md-4 offset-md-4">
                                <button class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
