<?php

namespace App\Data;

use App\Contracts\DataPages;
use App\Data\DataEnglishPages;
use App\Data\DataSpanishPages;
use App\Data\DataFrenchPages;

class RelatedPages implements DataPages
{
    private array $relatedPages = [];

    public function __construct()
    {        
        $this->createPages();
    }    

    public function getPages(): array
    {
        return $this->relatedPages;
    }

    private function createPages(): void
    {
        $pages = [];
        $dataClasses = [
            DataEnglishPages::class,
            DataSpanishPages::class,            
            DataFrenchPages::class            
        ];

        foreach ($dataClasses as $dc) {
            $pages = array_merge($pages, (new $dc)->getPages());    
        }

        $this->relatedPages = $pages;
    }
}