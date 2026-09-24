<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            new TwigFilter('fullCapitalize', [$this, 'fullCapitalize']),
        ];
    }

    public function fullCapitalize(string $value): string
    {
        return ucfirst($value);
    }
}