<?php

namespace App\classes;

use App\classes\DatabaseConnection;

require_once __DIR__ . '/DatabaseConnection.php';

use App\classes\Regions;

require_once __DIR__ . '/Regions.php';

use App\classes\Couriers;

require_once __DIR__ . '/Couriers.php';

use App\classes\Rides;

require_once __DIR__ . '/Rides.php';

$config = require_once __DIR__ . '/../config.php';

// Подключаемся к БД.
$database = $config['database'];
$host = $config[$database]['host'];
$dbname = $config[$database]['dbname'];
$username = $config[$database]['username'];
$password = $config[$database]['password'];
$database = DatabaseConnection::getlnstance($host, $dbname, $username, $password);
$pdo = $database->getConnection();


// Роутер.
// Получаем данные.
$action = $_POST['action'] ?? null;
$regionId = $_POST['regionId'] ?? null;
$dateRideFromMoscow = $_POST['dateRideFromMoscow'] ?? null;
$courierId = $_POST['courierId'] ?? null;


// TODO В роутере должна быть обязательная фильтрация-проверка передаваемых данных выше на спецсимволы, возможные инъекции и т.д (но в тестовом задании я это делать не стал).

// Получить список регионов.
if ($action == 'getRegionsOptionsList') {
    echo Regions::getRegionsOptionsList($pdo);
}


// Вывести дату прибытия в информационном поле.
if ($action == 'getRegionsArriveDate') {
    echo Regions::getRegionsArriveDate($pdo, $regionId, $dateRideFromMoscow);
}


// Добавить курьера
if ($action == 'addCourierToRide') {
    Couriers::addCourierToRide($pdo, $regionId, $courierId, $dateRideFromMoscow);
}


// Получить список курьеров.
if ($action == 'getCouriersOptionsList') {
    echo Couriers::getCouriersOptionsList($pdo);
}


// Получить список поездок.
if ($action == 'getRidesList') {
    echo Rides::getRidesList($pdo, $dateRideFromMoscow);
}