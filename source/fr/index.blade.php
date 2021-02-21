@php
    $setLang = "fr";
@endphp

@extends('_layouts.master')

@section('title', 'Index FR')

@push('head')
    <link rel="canonical" href="{{ pageLink('/fr/') }}" />

    @include('_partials.alternate-hreflang', [
        'skipLang' => 'fr'
    ])
@endpush

@section('body')
    <h1 class="text-4xl text-center mb-1">
        <strong>Index FR</strong>
    </h1>  
@endsection
