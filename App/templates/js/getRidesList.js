// Обновить список поездок.
$(function () {
    $("#courierForm").submit(function (event) {
        getRidesList();
    });

    $("#regionListDateRideFromMoscow").change(function () {
        getRidesList();
    });


    function getRidesList() {
        var regionListDateRideFromMoscow = $("#regionListDateRideFromMoscow").val();
        $.ajax({
            type: "POST",
            url: "classes/Router.php",
            data: {
                action: "getRidesList",
                dateRideFromMoscow: regionListDateRideFromMoscow,
            },
            success: function (response) {
                $("#courierRegionList").html(response);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });

    }

    // Вызываем функцию при загрузке страницы.
    getRidesList();

    // Экспортируем функцию getRidesList для доступа из других файлов.
    window.getRidesList = getRidesList;
});