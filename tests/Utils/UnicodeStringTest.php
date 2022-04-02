<?php
declare(strict_types=1);

namespace App\Tests\Utils;

use App\Utils\String\UnicodeString;
use PHPUnit\Framework\TestCase;

class UnicodeStringTest extends TestCase
{
    public function testLower(): void
    {
        self::assertEquals('hello world!', UnicodeString::from('HELLO WORLD!')->lower());
    }

    public function testUpper(): void
    {
        self::assertEquals('HELLO WORLD!', UnicodeString::from('hello world!')->upper());
    }

    public function testTitle(): void
    {
        self::assertEquals('Hello world!', UnicodeString::from('hello world!')->title());
        self::assertEquals('Hello World!', UnicodeString::from('hello world!')->title(true));
    }
}
