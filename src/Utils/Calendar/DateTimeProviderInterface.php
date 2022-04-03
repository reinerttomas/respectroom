<?php
declare(strict_types=1);

namespace App\Utils\Calendar;

use DateTime;
use DateTimeImmutable;

interface DateTimeProviderInterface
{
    public function create(string $timestamp = 'now'): DateTime;

    public function createImmutable(string $timestamp = 'now'): DateTimeImmutable;
}
