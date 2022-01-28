@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center my-3">
        <div class="col-md-10">
            <div class="card card-{{ $sheet->theme }}">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="m-0">{{ $sheet->title }}</h1>
                        <div >
                            <form action="{{ route('sheets.destroy',$sheet->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <a class="btn btn-primary ms-2" href="{{ route('sheets.edit',$sheet->id) }}">Edit</a>
                                <button class="btn btn-danger ms-2" type="submit">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h2 class="h4">Description</h2>
                            <p class="border p-2 desc-box">{!! nl2br($sheet->description) !!}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mx-3">
                            <table class="table table-{{ $sheet->theme }} table-striped table-bordered">
                                @foreach ($sheet->fields as $field)
                                    <tr class="row">
                                        <td class="col-md-4">
                                            <h3 class="h4">{{ $field->title }}</h3>
                                        </td>
                                        <td class="col-md-6">
                                            <p>
                                                {!! nl2br($field->info) !!}
                                            </p>
                                        </td>
                                        <td class="col-md-2">
                                            <div class="row">
                                                <div class="col px-lg-3 px-2">
                                                    <a class="btn btn-primary my-1" href="#">Edit</a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col px-lg-3 px-2">
                                                    <a class="btn btn-danger my-1" href="#">Remove</a>
                                                </div>
                                            </div>
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
