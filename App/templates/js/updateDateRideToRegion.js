// Обработчик изменения значения поля выбора региона.
$(function () {

    $("#regionId, #dateRideFromMoscow").change(function () {
        updateDateRideToRegion();
    });

    // Функция для отправки запроса и обновления даты прибытия в регион.
    function updateDateRideToRegion() {

        var regionId = $("#regionId").val();
        regionId = regionId ? regionId : 1;
        var dateRideFromMoscow = $("#dateRideFromMoscow").val();

        $.ajax({
            type: "POST",
            url: "classes/Router.php",
            data: {
                action: "getRegionsArriveDate",
                regionId: regionId,
                dateRideFromMoscow: dateRideFromMoscow
            },
            success: function (response) {
                $("#dateRideToRegion").val(response);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    updateDateRideToRegion();

});


