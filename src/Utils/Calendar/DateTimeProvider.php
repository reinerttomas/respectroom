<?php
declare(strict_types=1);

namespace App\Utils\Calendar;

use DateTime;
use DateTimeImmutable;
use Throwable;

class DateTimeProvider implements DateTimeProviderInterface
{
    private string $timestamp;

    public function __construct(string $timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * @throws Throwable
     */
    public function create(): DateTime
    {
        return new DateTime($this->timestamp);
    }

    /**
     * @throws Throwable
     */
    public function createImmutable(): DateTimeImmutable
    {
        return new DateTimeImmutable($this->timestamp);
    }
}
