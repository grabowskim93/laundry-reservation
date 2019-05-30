<?php


use App\Reservation\Reservation;
use App\Reservation\ReservationService;

require 'vendor/autoload.php';



try {
    $pdo = new PDO("mysql:dbname=lundry;host=127.0.0.1;port=8082", 'root', 'root');
    echo 'Połączenie nawiązane!' . "\n";
} catch (PDOException $e) {
//    echo $e->getMessage() . "\n";
}


$configParam = [
    'driver' => 'pdo_mysql',
    'memory' => true,
    'host' => 'mysql',
//    'port' => '8082',
    'dbname' => 'lundry',
    'user' => 'root',
    'password' => 'root'
];

$config = new \Doctrine\DBAL\Configuration();



try {
    $conn = \Doctrine\DBAL\DriverManager::getConnection($configParam, $config);
} catch (Exception $e) {
    echo $e->getMessage() . "\n";
}

try {
    $repo = new \App\Reservation\ReservationRepository($conn);

    $reservationService = new ReservationService($repo);

//    $reservation = $reservationService->makeReservation('2019-01-23 12:30', '111222333', 'example@example.com');

//    var_dump($reservation);

    echo 'Reservation';
} catch (Exception $e) {
    var_dump($e->getMessage());
}

