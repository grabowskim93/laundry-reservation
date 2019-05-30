<?php

declare(strict_types=1);

namespace Test;

use App\Reservation\Reservation;
use App\Reservation\ReservationRepository;
use App\Reservation\ReservationService;
use PHPUnit\Framework\TestCase;

class ReservationTest extends TestCase
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject | ReservationRepository
     */
    private $reservationRepository;

    public function setUp()
    {
        $this->reservationRepository = $this->getMockBuilder(ReservationRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    /**
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Driver\DriverException
     */
    public function testCreateReservation()
    {
        $reservationService = new ReservationService($this->reservationRepository);

        $reservation = $reservationService->makeReservation('2019-01-23 12:30', '111222333', 'example@example.com');
        $this->assertInstanceOf(Reservation::class, $reservation);
    }
}