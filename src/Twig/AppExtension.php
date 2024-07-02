<?php
// src/Twig/AppExtension.php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
public function getFilters(): array
{
return [
new TwigFilter('truncate_custom', [$this, 'truncate']),
];
}

public function truncate(string $text, int $length = 50, string $ending = '...'): string
{
if (strlen($text) > $length) {
return substr($text, 0, $length) . $ending;
}

return $text;
}
}
