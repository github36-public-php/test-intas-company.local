// Добавить курьера в список поездок.
$(function () {

    // Обработчик отправки формы курьера.
    $("#courierForm").submit(function (event) {
        event.preventDefault();

        var formData = {
            action: $("#action").val(),
            regionId: $("#regionId").val(),
            courierId: $("#courierId").val(),
            dateRideFromMoscow: $("#dateRideFromMoscow").val()

        };

        $.ajax({
            type: "POST",
            url: "classes/Router.php",
            data: formData,
            success: function (response) {
                $("#message").html(response);
                // Вызываем функцию getRidesList (она экспортирована).
                getRidesList();
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
