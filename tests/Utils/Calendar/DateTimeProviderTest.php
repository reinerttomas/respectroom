<?php
declare(strict_types=1);

namespace App\Tests\Utils\Calendar;

use App\Utils\Calendar\DateTimeProvider;
use DateTime;
use DateTimeImmutable;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Throwable;

class DateTimeProviderTest extends KernelTestCase
{
    private DateTimeProvider $dateTimeProvider;

    protected function setUp(): void
    {
        self::bootKernel();
        $container = static::getContainer();

        $this->dateTimeProvider = $container->get(DateTimeProvider::class);
    }

    /**
     * @throws Throwable
     */
    public function testCreate(): void
    {
        $dateTime = $this->dateTimeProvider->create();

        self::assertInstanceOf(DateTime::class, $dateTime);
        self::assertEquals('2020-01-01 08:00:00', $dateTime->format('Y-m-d H:i:s'));
    }

    /**
     * @throws Throwable
     */
    public function testCreateImmutable(): void
    {
        $dateTime = $this->dateTimeProvider->createImmutable();

        self::assertInstanceOf(DateTimeImmutable::class, $dateTime);
        self::assertEquals('2020-01-01 08:00:00', $dateTime->format('Y-m-d H:i:s'));
    }
}
