<?php

declare(strict_types=1);

namespace App\Reservation;

use App\Entity;
use App\RepositoryInterface;
use Doctrine\DBAL\Connection;

class ReservationRepository implements RepositoryInterface
{
    /**
     * @var \Doctrine\DBAL\Connection
     */
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param \App\Entity | \App\Reservation\Reservation $entity
     *
     * @return \App\Entity
     * @throws \Doctrine\DBAL\DBALException
     * @throws \Doctrine\DBAL\Driver\DriverException
     */
    public function add(Entity $entity): Entity
    {
        $this->connection->beginTransaction();

        $this->connection->insert(
            'reservation',
            [
                'email' => $entity->getEmail(),
                'phone' => $entity->getPhone(),
                'reservation_date' => $entity->getDate(),
            ]
        );

        $this->connection->commit();

        return $entity;
    }
}
