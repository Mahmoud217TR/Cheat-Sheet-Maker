@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="col d-flex justify-content-md-end justify-content-center">
            <div>
                <a href="{{ route('fields',$sheet->id) }}" class="btn btn-success ms-2 my-md-0 my-2">Modify Fields</a>
                <pin-button url="{{ route('sheets.pin',$sheet->id) }}" initial-state="{{ $sheet->pinned }}"></pin-button>
                <a class="btn btn-primary ms-2 my-md-0 my-2" href="{{ route('sheets.edit',$sheet->id) }}">Edit Sheet</a>
                <delete-button url="{{ route('sheets.destroy',$sheet->id) }}" name = '{{ $sheet->title }}' theme='{{ $sheet->theme }}'></delete-button>
                <a class="btn btn-dark ms-2" href="{{ route('sheets') }}">Back</a>
            </div>
        </div>
    </div>
    <div class="cheat-sheet theme-{{ $sheet->theme }} my-3">
        <div class="row my-3">
            <div class="col-md-4">
                <h1 class="cheat-sheet-head">{{ $sheet->title }}</h1>
            </div>
            <div class="col-md-8">
                <p class="text-muted cheat-sheet-desc">{{ $sheet->description }}</p>
            </div>
        </div>
        <div class="row my-3">
            <div class="col">
                <div class="card">
                    @if($sheet->fields->count() == 0)
                        <h2 class="display-6 text-center p-5 text-dark">No Fields on this Cheat Sheet Yet.</h2>
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
