@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card card-{{ $sheet->theme }}">
                <div class="card-header">
                    <div class="row">
                        <h1 class="col-md-6 m-md-0 my-2 d-flex justify-content-md-start justify-content-center align-items-center">
                            {{ $sheet->title }}
                        </h1>
                        <div class="col-md-6 m-md-0 my-2 d-flex justify-content-md-end justify-content-center align-items-center">
                            <a class="btn btn-light ms-2" href="{{ route('sheets.show',$sheet->id) }}">Back</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-{{ $sheet->theme }} table-striped table-bordered">
                        <tr class="row">
                            <td class="col-md-4"></td>
                            <td class="col-md-4"></td>
                            <td class="col-md-4 d-flex align-items-center justify-content-center">
                                <form action="{{ route('fields.store',$sheet->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Add New Field</button>
                                </form>
                            </td>
                        </tr>
                        @foreach ($sheet->fields as $field)
                        <tr class="row">
                            <form action="{{ route('fields.update',$field->id) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <td class="col-md-4">
                                    <textarea class="form-control text-area-resize-none" name="title" id="title" >{{ $field->title }}</textarea>
                                </td>
                                <td class="col-md-4">
                                    <textarea class="form-control text-area-resize-none" name="info" id="info">{{ $field->info }}</textarea>
                                </td>
                                <td class="col-md-2 d-flex align-items-center justify-content-center">
                                    <button type="submit" class="btn btn-primary">Update</button>                              
                                </td> 
                            </form>
                                <td class="col-md-2 d-flex align-items-center justify-content-center">
                                    <form action="{{ route('fields.destroy',$field->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Remove</button>
                                    </form>
                                </td> 
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
