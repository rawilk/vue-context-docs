@extends('layouts.app')

@if ($title)
    @section('title', $title)
@endif

@section('content')
    {!! $html !!}
@endsection
