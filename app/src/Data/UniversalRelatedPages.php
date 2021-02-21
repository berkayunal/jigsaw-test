<?php

namespace App\Data;

use Illuminate\Support\Collection;
use App\Pages\DefaultPage;
use App\Data\PageValues;

class UniversalRelatedPages
{
    private Collection $pages;

    public function __construct()
    {
        $this->createPages();
    }

    public function createPages(): void
    {
        $pages = new Collection;
        $pageValues = (new PageValues)->getValues();

        foreach ($pageValues as $value) {
            $pages->push((object) [
                "pageValue" => $value,
                "slug" => "page-{$value}"
            ]);
        }

        $this->pages = $pages;
    } 

    public function getPages(): Collection
    {
        return $this->pages;
    }
}