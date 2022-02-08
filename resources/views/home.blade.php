@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">
            <div class="papper py-5">
                <div class="row my-3">
                    <div class="col-md d-flex align-items-center justify-content-center my-2 my-md-0">
                        <a class="btn btn-primary" href="{{ route('sheets') }}">Check All your cheat sheets</a>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md d-flex align-items-center justify-content-center my-2 my-md-0">
                        <a class="btn btn-secondary" href="{{ route('sheets.create') }}">Create a new cheat sheet</a>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md d-flex align-items-center justify-content-center my-2 my-md-0">
                        <a class="btn btn-success" href="{{ route('sheets.most') }}">Most visited cheat sheet</a>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md d-flex align-items-center justify-content-center my-2 my-md-0">
                        <a class="btn btn-warning" href="{{ route('sheets.pinned') }}">Pinned cheat sheet</a>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md d-flex align-items-center justify-content-center my-2 my-md-0">
                        <a class="btn btn-dark" href="{{ route('settings') }}">Settings</a>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md d-flex align-items-center justify-content-center my-2 my-md-0">
                        <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
