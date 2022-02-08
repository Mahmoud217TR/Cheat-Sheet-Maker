@extends('layouts.app')

@section('content')
<div class="container">
    @if ($sheets->count()>0)
        @foreach ($sheets as $sheet)
        <div class="row justify-content-center my-3">
            <div class="col-md-10">
                <div class="card card-{{ $sheet->theme }}">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 my-3 my-md-0 d-flex justify-content-center justify-content-md-start align-items-center">
                                <h2 class="h4 m-0 "><b>{{ $sheet->title }}</b></h2>
                            </div>
                            <div class="col-lg-4 col-md-6 my-3 my-md-0 d-flex justify-content-center justify-content-md-end align-items-center">
                                <span class="text-center">Visits: {{ $sheet->visits }}</span>
                                <a class="btn btn-success ms-2" href="{{ route('sheets.visit',$sheet->id) }}">Show</a>
                                <pin-button url="{{ route('sheets.pin',$sheet->id) }}" initial-state="{{ $sheet->pinned }}"></pin-button>
                                <delete-button url="{{ route('sheets.destroy',$sheet->id) }}" name = '{{ $sheet->title }}' theme='{{ $sheet->theme }}'></delete-button>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        {!! nl2br($sheet->description) !!}
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @if ($sheets->hasPages())
            <div class="row my-5">
                <div class="col d-flex justify-content-center">
                    <a  class="btn @if($sheets->currentPage() > 1) btn-primary @else btn-secondary @endif mx-2" href="{{ $sheets->previousPageUrl() }}"><b>Previous</b></a>
                    <span class="btn btn-light mx-2"><b>{{ $sheets->currentPage() }}</b></span>
                    <a  class="btn @if($sheets->hasMorePages()) btn-primary @else btn-secondary @endif mx-2" href="{{ $sheets->nextPageUrl() }}"><b>Next</b></a>
                </div>
            </div>
        @endif
    @else
        <div class="papper my-5">
            <h1 class="display-3 text-center">
                No Cheat Sheets Found Here!
            </h1>
        </div>
    @endif
</div>
@endsection
