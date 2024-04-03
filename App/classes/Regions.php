<?php

namespace App\classes;

use PDO;
use PDOException;


class Regions
{

    // Получить массив регионов.
    public static function getRegionsArray($pdo)
    {
        $sql = "SELECT * FROM regions";

        try {
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $regions = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $regions;
        } catch (PDOException $e) {
            echo " Ошибка при выполнении запроса: " . $e->getMessage();

        }

    }

    // Вывести список select регионов.
    public static function getRegionsOptionsList($pdo)
    {
        try {
            $regions = self::getRegionsArray($pdo);

            foreach ($regions as $region) {
                $regionsOptionsList = $regionsOptionsList . '<option value="' . $region['id'] . '">' . $region['region_name'] . '</option>';
            }
            return $regionsOptionsList;


        } catch (PDOException $e) {
            echo " Ошибка при выполнении запроса: " . $e->getMessage();

        }

    }


    // Получить дату прибытия в регион.
    public static function getRegionsArriveDate($pdo, $regionId, $dateRideFromMoscow)
    {
        try {
            $sql = "SELECT time_ride_to_region_in_seconds FROM regions WHERE id = :regionId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':regionId', $regionId, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            // Возвращаем значение времени в пути в секундах.
            $dateRideFromMoscowTimestamp = strtotime(str_replace('.', '-', $dateRideFromMoscow));
            $timeRideToRegionTimestamp = $result['time_ride_to_region_in_seconds'];

            return date('d.m.Y H:i', $dateRideFromMoscowTimestamp + $timeRideToRegionTimestamp);


        } catch (PDOException $e) {
            // Обработка ошибки
            echo "Ошибка при выполнении запроса: " . $e->getMessage();
            return 0;

        }


    }


}