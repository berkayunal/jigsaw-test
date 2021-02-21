@php
    $setLang = "es";
@endphp

@extends('_layouts.master')

@section('title', 'Index es')

@push('head')
    <link rel="canonical" href="{{ pageLink('/es/') }}" />

    @include('_partials.alternate-hreflang', [
        'skipLang' => 'es'
    ])
@endpush

@section('body')
    <h1 class="text-4xl text-center mb-1">
        <strong>Index es</strong>
    </h1>  
@endsection
