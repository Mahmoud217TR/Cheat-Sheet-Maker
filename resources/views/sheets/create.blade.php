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
                        
                        <div class="row mb-3">
                            <div class="col-md-4 text-md-end">
                                <label for="title" class="col-form-label">Title: </label>
                            </div>
                            <div class="col-md-6">
                                <input id="title" name="title" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 text-md-end">
                                <label for="description" class="col-form-label">Description: </label>
                            </div>
                            <div class="col-md-8">
                                <textarea id="description" name="description" type="text" class="form-control" style="resize:none"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-4 text-md-end">
                                <label for="theme" class="col-form-label">Theme: </label>
                            </div>
                            <div class="col-md-2">
                                <select class="form-select" name="theme" id="theme" required>
                                    <option value="1">Dark</option>
                                    <option value="2">Gold</option>
                                    <option value="3">Red</option>
                                </select>
                            </div>
                        </div>
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
