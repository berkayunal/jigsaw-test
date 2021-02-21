<?php

namespace App\Helpers;

abstract class LanguageHelper
{
    public static function allowedLangs(): array
    {
        return [
            'en',
            'es',
            'fr'
        ];
    }
}