@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="col d-flex justify-content-md-end justify-content-center">
            <form action="{{ route('fields.store',$sheet->id) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">Add New Field</button>
                <a class="btn btn-dark ms-2" href="{{ route('sheets.show',$sheet->id) }}">Back</a>
            </form>
        </div>
    </div>
    <div class="cheat-sheet theme-{{ $sheet->theme }} my-3">
        <div class="row my-3">
            <div class="col-md-4">
                <h1 class="cheat-sheet-head">{{ $sheet->title }}</h1>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <div class="card">
                    @if($sheet->fields->count() == 0)
                        <h2 class="display-6 text-center p-5">No Fields on this Cheat Sheet Yet.</h2>
                    @else
                        @foreach ($sheet->fields as $field)
                            <div class="row cs-row m-0">
                                <div class="col-md-11">
                                    <form action="{{ route('fields.update',$field->id) }}" method="POST" class="row">
                                        @csrf
                                        @method('PATCH')
                                        <div class="col-md-5 my-md-0 my-1">
                                            <textarea class="form-control text-area-resize-none" name="title" id="title">{{ $field->title }}</textarea>
                                        </div>
                                        <div class="col-md-5 my-md-0 my-1">
                                            <textarea class="form-control text-area-resize-none" name="info" id="info">{{ $field->info }}</textarea>
                                        </div>
                                        <div class="col-md-2 d-flex align-items-center justify-content-center">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-1 d-flex align-items-center justify-content-center">
                                    <form action="{{ route('fields.destroy',$field->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
