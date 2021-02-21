<?php

namespace App\Data;

use Illuminate\Support\Collection;
use App\Data\UniversalRelatedPages;

abstract class DataRelatedPage
{
    protected array $pages = [];
    protected Collection $universalPages;

    public function __construct()
    {
        $this->universalPages = (new UniversalRelatedPages)->getPages();
    }    

    public function getPages(): array
    {
        return $this->pages;
    }   
}