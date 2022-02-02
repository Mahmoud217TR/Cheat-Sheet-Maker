@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($sheets as $sheet)
    <div class="row justify-content-center my-3">
        <div class="col-md-10">
            <div class="card card-{{ $sheet->theme }}">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="h4 m-0"><b>{{ $sheet->title }}</b></h2>
                        <div >
                            
                            <form action="{{ route('sheets.destroy',$sheet->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a class="btn btn-success ms-2" href="{{ route('sheets.show',$sheet->id) }}">Show</a>
                                <a class="btn btn-primary ms-2" href="{{ route('sheets.edit',$sheet->id) }}">Edit</a>
                                <button class="btn btn-danger ms-2" type="submit">Delete</button>
                            </form>
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
</div>
@endsection
