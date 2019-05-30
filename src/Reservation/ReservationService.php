<?php

declare(strict_types=1);

namespace App\Reservation;

class ReservationService
{
    /**
     * @var \App\Reservation\ReservationRepository
     */
    private $reservationRepository;

    /**
     * ReservationService constructor.
     *
     * @param \App\Reservation\ReservationRepository $repository
     */
    public function __construct(ReservationRepository $repository)
    {
        $this->reservationRepository = $repository;
    }

    /**
     * @param string $reservationDate
     * @param string $phone
     * @param string $email
     *
     * @return \App\Reservation\Reservation
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Driver\DriverException
     */
    public function makeReservation(string $reservationDate, string $phone, string $email): Reservation
    {
        $reservation = Reservation::createReservation($reservationDate, $phone, $email);
        $this->reservationRepository->add($reservation);

        return $reservation;
    }
}
