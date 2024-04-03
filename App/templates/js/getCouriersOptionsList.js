// Получение списка курьеров.
$(function () {

    // Функция для отправки запроса и обновления списка регионов.
    function getCouriersOptionsList() {
        $.ajax({
            type: "POST",
            url: "classes/Router.php",
            data: {action: "getCouriersOptionsList"},
            success: function (response) {
                // Обновляем список регионов в элементе <select id="regionId">
                $("#courierId").html(response);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Вызываем функцию при загрузке страницы для обновления списка регионов.
    getCouriersOptionsList();
});
