<?php

use Illuminate\Filesystem\Filesystem;
use Illuminate\Translation\FileLoader;
use Illuminate\Translation\Translator;

use App\Data\RelatedPages;
use App\Pages\Page;
use App\Helpers\LanguageHelper;

$relatedPages = new RelatedPages;

//
// Logic for languages
//
// Prepare the FileLoader
$loader = new FileLoader(new Filesystem(), './app/resources/lang');

$allowedLangs = LanguageHelper::allowedLangs();
$translators = [];

foreach ($allowedLangs as $locale) {
    $translators[$locale] = new Translator($loader, $locale);
}
/////

return [
    'production' => false,
    'baseUrl' => 'http://localhost',

    '__' => function ($page, $key, $locale = null) use ($translators) {
        if (is_null($locale)) {
            $locale = $page->lang;
        }

        if ($locale === null) {
            $locale = "en";
        }

        // Register the Translator
        $translator = $translators[$locale];
        return $translator->get($key);
    },

    'collections' => [
        'relatedPages' => [
            'extends' => 'related-page',
            'path' => '{path}',
            'items' => function () use ($relatedPages) {
                $pages = $relatedPages->getPages();

                $items = collect($pages)->map(function (Page $page) {
                    return [
                        'title' => $page->getTitle(),
                        'metaTitle' => $page->getMetaTitle(),
                        'metaDescription' => $page->getMetaDescription(),
                        'metaKeywords' => $page->getMetaKeywords(),
                        'slug' => $page->getSlug(),
                        'uniSlug' => $page->getUniSlug(),
                        'lang' => $page->getLang(),
                        'url' => $page->getUrl(),
                        'pageValue' => $page->getPageValue(),
                        // this is neeed to prevent adding english related pages into "en" subfolder
                        'path' => $page->getLang() === "en" ? '{slug}' : '{lang}/{slug}'
                    ];
                });

                return $items;
            }
        ]
    ]
];
