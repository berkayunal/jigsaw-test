@php
    use App\Helpers\LanguageHelper;

    $allowedLangs = LanguageHelper::allowedLangs();
    $skipLang = isset($skipLang) ? $skipLang : null;
@endphp

@foreach ($allowedLangs as $lang)
    @if($lang === $skipLang)
        @continue
    @endif

    <link rel="alternate" hreflang="{{ $lang }}" href="{{ $lang === 'en' ? pageLink('/') : pageLink('/' . $lang . '/') }}" />
@endforeach