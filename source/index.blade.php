@extends('_layouts.master')

@section('title', 'Index en')

@push('head')
    <link rel="canonical" href="{{ pageLink('/') }}" />

    @include('_partials.alternate-hreflang', [
        'skipLang' => 'en'
    ])
@endpush

@section('body')
    <h1 class="text-4xl text-center mb-1">
        <strong>Index EN</strong>
    </h1>    
@endsection
