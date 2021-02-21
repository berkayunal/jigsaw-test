@php
    $langPages = $relatedPages->filter(function ($item) use ($page) {
        return $item->pageValue === $page->pageValue && $item->lang !== $page->lang;
    });

    $nextPages = $relatedPages->filter(function ($item) use ($page) {
        $minValue = $page->pageValue - 5;
        $maxValue = $page->pageValue + 5;

        if ($item->pageValue === $page->pageValue) {
            return false;
        }

        return ($item->pageValue >= $minValue && $item->pageValue <= $maxValue) && ($item->lang === $page->lang);
    });
@endphp

@extends('_layouts.master')

@section('title', $page->metaTitle)
@section('metaDescription', $page->metaDescription)
@section('metaKeywords', $page->metaKeywords)

@push('head')
    <link rel="canonical" href="{{ $page->url }}" />

    @if(count($langPages) > 0)
        @foreach ($langPages as $item)
            <link rel="alternate" hreflang="{{ $item['lang'] }}" href="{{ $item['url'] }}" />
        @endforeach
    @endif    
@endpush

@section('body')
    <h1>
        {{ $page->title }}
    </h1>

    @includeIf('_partials.related-page-questions.' . $page->lang, compact('page'))

    @if(count($nextPages) > 0)
        <h3 class="text-2xl mb-1 mt-3">
            {{ $page->__('Related pages') }}
        </h3>

        <div class="card border">
            <ul>
                @foreach($nextPages as $item)
                    <li class="text-lg mb-2 md:mb-0 md:inline md:mr-2">
                        <a href="{{ $item['url'] }}">
                            {{ $item['title'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
