@extends('layouts.documentation')

@section('content')
    <div class="{{ $slug }}" id="app">
        {!! $content !!}
    </div>
@endsection

@push('js')
    <script src="{!! mix('js/demos.js') !!}"></script>
@endpush
