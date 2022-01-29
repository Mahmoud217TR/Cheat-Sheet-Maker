@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-md-10">
            <div class="card card-{{ $sheet->theme }}">
                <div class="card-header">
                    <div class="row">
                        <h1 class="col-md-4 m-md-0 my-2 d-flex justify-content-md-start justify-content-center align-items-center">
                            {{ $sheet->title }}
                        </h1>
                        <div class="col-md-8 m-md-0 my-2 d-flex justify-content-md-end justify-content-center align-items-center">
                            <form action="{{ route('sheets.destroy',$sheet->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a href="{{ route('fields',$sheet->id) }}" class="btn btn-success ms">Modify Fields</a>
                                <a class="btn btn-primary ms-2" href="{{ route('sheets.edit',$sheet->id) }}">Edit</a>
                                <button class="btn btn-danger ms-2" type="submit">Delete</button>
                                <a class="btn btn-light ms-2" href="{{ route('sheets') }}">Back</a>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <h2 class="h4">Description</h2>
                            <p class="border p-2 desc-box">{!! nl2br($sheet->description) !!}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <table class="table table-{{ $sheet->theme }} table-striped table-bordered">
                                @foreach ($sheet->fields as $field)
                                    <tr class="row">
                                        <td class="col-md-5">
                                            <h3 class="h4">{{ $field->title }}</h3>
                                        </td>
                                        <td class="col-md-7">
                                            <p>
                                                {!! nl2br($field->info) !!}
                                            </p>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
