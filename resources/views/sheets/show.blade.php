@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="col d-flex justify-content-md-end justify-content-center">
            <form action="{{ route('sheets.destroy',$sheet->id) }}" method="POST">
                @csrf
                @method('delete')
                <a href="{{ route('fields',$sheet->id) }}" class="btn btn-success ms-2 my-md-0 my-2">Modify Fields</a>
                <a class="btn btn-primary ms-2 my-md-0 my-2" href="{{ route('sheets.edit',$sheet->id) }}">Edit Sheet</a>
                <button class="btn btn-danger ms-2 my-md-0 my-2" type="submit">Delete</button>
                <a class="btn btn-dark ms-2" href="{{ route('sheets') }}">Back</a>
            </form>
        </div>
    </div>
    <div class="cheat-sheet theme-{{ $sheet->theme }} my-3">
        <div class="row my-3">
            <div class="col-md-4">
                <h1 class="cheat-sheet-head">{{ $sheet->title }}</h1>
            </div>
            <div class="col-md-8">
                <p class="cheat-sheet-desc text-muted">
                    {{ $sheet->description }}
                </p>
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
                                <div class="col-md-4 my-md-0 my-1">
                                    <p class="field-title">
                                        {{ $field->title }}
                                    </p>
                                </div>
                                <div class="col-md-8 my-md-0 my-1">
                                    <p class="field-info">
                                        {!! nl2br($field->info) !!}
                                    </p>
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
