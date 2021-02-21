<?php

namespace App\Contracts;

interface PageContract
{
    public function setTitle(string $title = null): void;
    public function setMetaTitle(string $title = null): void;
    public function setMetaDescription(string $value = null): void;
    public function setMetaKeywords(string $value = null): void;
    public function setSlug(string $value = null): void;
    public function setUniSlug(string $value): void;
    public function setLang(string $lang = null): void;    
    
    public function getTitle(): ?string;
    public function getMetaTitle(): ?string;
    public function getMetaDescription(): ?string;
    public function getMetaKeywords(): ?string;
    public function getSlug(): ?string;
    public function getUniSlug(): ?string;
    public function getUrl(): string;
    public function getLang(): ?string;    
}