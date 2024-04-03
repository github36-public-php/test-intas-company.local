<?php
/*
 * Скрипт вставки данных в БД за 3 месяца.
 Написан быстро, без ООП, продуманной структуры и т.д.
Цель - просто вставить данные в Бд за период около 3х месяцев.
 */

use App\classes\DatabaseConnection;

require_once __DIR__ . '/../classes/DatabaseConnection.php';
$config = require_once __DIR__ . '/../config.php';

// Подключаемся к БД.
$database = $config['database'];
$host = $config[$database]['host'];
$dbname = $config[$database]['dbname'];
$username = $config[$database]['username'];
$password = $config[$database]['password'];
$database = DatabaseConnection::getlnstance($host, $dbname, $username, $password);
$pdo = $database->getConnection();

$dateRideFromMoscow = strtotime(date('Y-m-d 00:00:00'));
$secondsInOneday = 86400;
$insertDays = 90; // 90 дней Около 3х месяцев.


for ($i = 1; $i <= $insertDays; $i++) {

    // Вставим от 1 до 4 записей за 1 дату.
    $recordNumbers = rand(1, 4);

    for ($j = 1; $j <= $recordNumbers; $j++) {
        // Я знаю, что у меня в БД 10 регионов и 15 курьеров. В тестовом примере нет смысла писать код для получения кол-ва записей в БД.
        $regionId = rand(1, 10);
        $courierId = rand(1, 15);

        insertRides($pdo, $regionId, $courierId, $dateRideFromMoscow);
    }

    $dateRideFromMoscow += $secondsInOneday;

}


function insertRides($pdo, $regionId, $courierId, $dateRideFromMoscow)
{

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