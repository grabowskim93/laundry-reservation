<?php

declare(strict_types=1);

namespace App\Reservation;

use App\Entity;

/**
 * Class Reservation
 *
 * @package App\Reservation
 */
class Reservation implements Entity
{
    /**
     * @var string
     */
    private $reservationDate;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $email;

    /**
     * Reservation constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param string $reservationDate
     * @param string $phone
     * @param string $email
     *
     * @return \App\Reservation\Reservation
     */
    public static function createReservation(string $reservationDate, string $phone, string $email)
    {
        $reservation = new Reservation();
        $reservation->reservationDate = $reservationDate;
        $reservation->phone = $phone;
        $reservation->email = $email;

        return $reservation;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getDate()
    {
        return $this->reservationDate;
    }

    public function getPhone()
    {
        return $this->phone;
    }
}
