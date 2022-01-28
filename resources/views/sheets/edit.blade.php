@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('sheets.update',$sheet->id) }}" method="post">
                        @csrf
                        @method('patch')
                        
                        @include('sheets.sheets-form')
                        <div class="row">
                            <div class="col-md-4 offset-md-4">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
