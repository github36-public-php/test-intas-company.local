<?php

namespace App\classes;

use PDO;
use PDOException;

class Couriers
{
// Добавить курьера в список поездок.
    public static function addCourierToRide($pdo, $regionId, $courierId, $dateRideFromMoscow)
    {
        $dateRideFromMoscow = strtotime($dateRideFromMoscow);

        $sql = "INSERT INTO rides (region_id, courier_id, date_ride_from_moscow) VALUES (:regionId, :courierId, :dateRideFromMoscow)";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':regionId', $regionId, PDO::PARAM_INT);
            $stmt->bindParam(':courierId', $courierId, PDO::PARAM_INT);
            $stmt->bindParam(':dateRideFromMoscow', $dateRideFromMoscow, PDO::PARAM_INT);
            $stmt->execute();
            return 1;
        } catch (PDOException $e) {
            echo "Ошибка при выполнении запроса: " . $e->getMessage();
            return 0;
        }
    }


    // Получить массив курьеров.
    public static function getCouriersArray($pdo)
    {
        $sql = "SELECT * FROM couriers";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $couriers = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $couriers;
        } catch (PDOException $e) {
            echo " Ошибка при выполнении запроса: " . $e->getMessage();

        }

    }


    // Вывести список select курьеров.
    public static function getCouriersOptionsList($pdo)
    {
        try {

            $couriers = self::getCouriersArray($pdo);

            foreach ($couriers as $courier) {
                $couriersOptionsList = $couriersOptionsList . '<option value="' . $courier['id'] . '">' . $courier['courier_fio'] . '</option>';
            }
            return $couriersOptionsList;


        } catch (PDOException $e) {
            echo " Ошибка при выполнении запроса: " . $e->getMessage();

        }

    }


}