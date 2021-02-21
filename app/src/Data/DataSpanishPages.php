<?php

namespace App\Data;

use App\Contracts\DataPages;
use App\Pages\DefaultSpanishPage;
use App\Data\DataRelatedPage;
use App\Pages\Page;

class DataSpanishPages extends DataRelatedPage implements DataPages
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
            $page->setTitle("title es {$value}");
            $page->setMetaTitle("meta title es");
            $page->setSlug("page-es-{$value}");
            $page->setUniSlug($universalPage->slug);
            $page->setLang('es');            

            $pages[] = $page;
        }

        $this->pages = $pages;
    }    
}