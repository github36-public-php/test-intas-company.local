<?php

namespace App\classes;

use PDO;
use PDOException;

use App\classes\Regions;

require_once __DIR__ . '/Regions.php';

use App\classes\Couriers;

require_once __DIR__ . '/Couriers.php';


class Rides
{

    // Получить массив поездок (объединение таблиц и выборка).
    public static function getRidesArray($pdo, $dateRideFromMoscow)
    {
        $dateRideFromMoscow = strtotime($dateRideFromMoscow);

        $sql = "SELECT regions.region_name,  
                    couriers.courier_fio, 
                    rides.date_ride_from_moscow
            FROM rides
            JOIN regions ON rides.region_id = regions.id
            LEFT JOIN couriers ON rides.courier_id = couriers.id 
            WHERE rides.date_ride_from_moscow = :dateRideFromMoscow";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':dateRideFromMoscow', $dateRideFromMoscow, PDO::PARAM_INT);
            $stmt->execute();

            $rides = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $rides;

        } catch (PDOException $e) {
            echo "Ошибка при выполнении запроса: " . $e->getMessage();
        }
    }


    // Вывести список поездок.
    public static function getRidesList($pdo, $dateRideFromMoscow)
    {

        try {
            $ridesList = "<table>";
            $rides = self::getRidesArray($pdo, $dateRideFromMoscow);


            foreach ($rides as $ride) {
                $ridesList = $ridesList . '<tr><td>'.$ride['region_name'] . '</td><td>' . $ride['courier_fio'] . "</td><td>" . date('d.m.Y', $ride['date_ride_from_moscow']) . '</td></tr>';

            }
            $ridesList .= "</table>";
            return $ridesList;


        } catch (PDOException $e) {
            echo " Ошибка при выполнении запроса: " . $e->getMessage();

        }


    }

}