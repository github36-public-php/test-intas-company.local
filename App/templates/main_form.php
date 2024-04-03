<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Расписание поездок курьеров</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv=Content-Type content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="templates/css/style.css">

    <script src="templates/js/jquery/jquery-3.7.1.min.js"></script>


    <link rel="stylesheet" type="text/css" href="templates/css/flatpickr/flatpickr.min.css">
    <script src="templates/js/flatpickr/flatpickr.js"></script>
    <script src="templates/js/flatpickr/ru.js"></script>

    <!-- В идеале лучше объединить всё в один скрипт, что уменьшит время загрузки -->
    <script src="templates/js/flatpickrDateFieldsFormat.js"></script>
    <script src="templates/js/updateDateRideToRegion.js"></script>
    <script src="templates/js/getRegionsOptionsList.js"></script>
    <script src="templates/js/addCourierToRide.js"></script>
    <script src="templates/js/getCouriersOptionsList.js"></script>
    <script src="templates/js/getRidesList.js"></script>


</head>
<body>
<!-- <div id="message"></div>  -->
<div class="wrapper">
    <div class="main-page">

        <div class="input-date-label align-items-center ">
            <label for="regionListDateRideFromMoscow">Показать поездки с временем выезда из Москвы:</label>
        </div>

        <div class="input-date-text align-items-center ">
            <input type="text" id="regionListDateRideFromMoscow">
        </div>


        <div id="courierRegionList" class="courier-region-list">
        </div>


        <form id="courierForm">


            <input type="hidden" id="action" value="addCourierToRide">

            <div class="courier-form__regionid-label align-items-center ">
                <label for="regionId">Выберите регион: </label>
            </div>

            <div class="courier-form__regionid-id-select align-items-center ">
                <select id="regionId" class="select-field">
                </select>
                <div class="select-field__arrow">
                </div>
            </div>


            <div class="courier-form__date-ride-from-moscow-label align-items-center ">
                <label for="dateRideFromMoscow">Дата выезда из Москвы (рассчитана)</label>
            </div>

            <div class="courier-form__date-ride-from-moscow-text align-items-center ">
                <input type="text" id="dateRideFromMoscow">
            </div>

            <div class="courier-form__courierid-label align-items-center ">
                <label for="courierId">Выберите курьера: </label>
            </div>

            <div class="courier-form__courierid-select align-items-center ">
                <select id="courierId" class="select-field">
                </select>
            </div>

            <div class="courier-form__date-riderto-region-label align-items-center ">
                <label for="dateRideToRegion" class="">Дата прибытия в регион: </label>
            </div>

            <div class="courier-form__date-riderto-region-text align-items-center ">
                <input type="text" id="dateRideToRegion" class="text-field disabled-field" readonly>
            </div>

            <div class="courier-form__submit">
                <input type="submit" class="courier-form__submit-button" value="Добавить курьера в расписание">
            </div>

        </form>


    </div>
</div>
</body>
</html>