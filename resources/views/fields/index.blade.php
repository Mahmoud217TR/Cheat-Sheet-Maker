@extends('layouts.app')

@section('content')
<div class="container">
    <modify-fields-component back-href = "{{ route('sheets.show',$sheet->id) }}" add-field = "{{ route('fields.store',$sheet->id) }}"
                             theme = "{{ $sheet->theme }}" sheet-title = "{{ $sheet->title }}" sheet-id = "{{ $sheet->id }}"
                             update-url = "{{ route('fields.update','filler') }}" delete-url = "{{ route('fields.destroy','filler') }}"
                             get-url = {{ route('fields.get',$sheet->id) }}
    ></modify-fields-component>
</div>
@endsection
