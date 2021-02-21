<?php

namespace App\Data;

use App\Contracts\DataPages;
use App\Data\DataRelatedPage;
use App\Pages\Page;
use App\Data\PageValues;

class DataEnglishPages extends DataRelatedPage implements DataPages
{
    public function __construct()
    {
        parent::__construct();

        $this->createPages();
    }

    private function createPages(): void
    {
        $pages = [];
        $values = (new PageValues)->getValues();

        foreach ($values as $value) {
            $universalPage = $this->universalPages->firstWhere('pageValue', $value);

            $page = new Page();
            $page->setPageValue($value);
            $page->setTitle("title en {$value}");
            $page->setMetaTitle("meta title en");
            $page->setSlug("page-en-{$value}");
            $page->setUniSlug($universalPage->slug);
            $page->setLang('en');            

            $pages[] = $page;
        }

        $this->pages = $pages;
    }    
}