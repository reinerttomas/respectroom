<?php
declare(strict_types=1);

namespace App\Utils\String;

use Symfony\Component\String\UnicodeString as UnicodeStringSymfony;

class UnicodeString extends UnicodeStringSymfony
{
    public static function from(string $string = ''): static
    {
        return new static($string);
    }
}
