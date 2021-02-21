<?php

namespace App\Data;

class PageValues
{
    public function getValues(): array
    {
        $values = range(1, 5);    

        return $values;
    }
}