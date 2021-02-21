<?php

namespace App\Pages;

use Illuminate\Support\Str;

use App\Contracts\PageContract;

class Page implements PageContract
{
    private ?string $title = null;
    private ?string $metaTitle = null;
    private ?string $metaDescription = null;
    private ?string $metaKeywords = null;
    private ?string $slug = null;
    
    /**
     * universal slug to connect multi lang pages
     */
    private ?string $uniSlug = null;
    private ?string $lang = null;
    private $pageValue = null;

    public function setPageValue($pageValue): void
    {
        $this->pageValue = $pageValue;
    }

    public function setTitle(string $title = null): void
    {
        $this->title = $title;
    }

    public function setMetaTitle(string $title = null): void
    {
        $this->metaTitle = $title;
    }
    
    public function setMetaDescription(string $value = null): void
    {
        $this->metaDescription = $value;
    }

    public function setMetaKeywords(string $value = null): void
    {
        $this->metaKeywords = $value;
    }

    public function setSlug(string $value = null): void
    {
        $this->slug = $value;
    }

    public function setUniSlug(string $value): void
    {
        $this->uniSlug = $value;
    }

    public function setLang(string $lang = null): void
    {
        $this->lang = $lang;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getMetaTitle(): ?string
    {
        return $this->metaTitle;
    }

    public function getMetaDescription(): ?string
    {
        return $this->metaDescription;
    }

    public function getMetaKeywords(): ?string
    {
        return $this->metaKeywords;
    }

    public function getSlug(): ?string
    {
        if ($this->slug !== null) {
            return $this->slug;
        }

        return Str::slug($this->title);
    }

    public function getUniSlug(): ?string
    {
        return $this->uniSlug;
    }

    public function getUrl(): string
    {
        if ($this->lang === 'en') {
            return pageLink("/{$this->slug}/");
        }

        return pageLink("{$this->lang}/{$this->slug}/");
    }

    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function getPageValue()
    {
        return $this->pageValue;
    }
}
