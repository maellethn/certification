<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class toInt extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('toInt', [$this, 'toInt']),
        ];
    }

    public function toInt(string $string): int
    {
        return (int)$string;
    }

}