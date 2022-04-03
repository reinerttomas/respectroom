<?php
declare(strict_types=1);

namespace App\Utils\Calendar;

use DateTime;
use DateTimeImmutable;
use Throwable;

class DateTimeProvider implements DateTimeProviderInterface
{
    /**
     * @throws Throwable
     */
    public function create(string $timestamp = 'now'): DateTime
    {
        return new DateTime($timestamp);
    }

    /**
     * @throws Throwable
     */
    public function createImmutable(string $timestamp = 'now'): DateTimeImmutable
    {
        return new DateTimeImmutable($timestamp);
    }
}
