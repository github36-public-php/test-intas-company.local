// Получение списка регионов.
    $(function () {

    // Функция для отправки запроса и обновления списка регионов.
    function getRegionsOptionsList() {
        $.ajax({
            type: "POST",
            url: "classes/Router.php",
            data: {action: "getRegionsOptionsList"},
            success: function (response) {
                // Обновляем список регионов в элементе <select id="regionId">
                $("#regionId").html(response);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Вызываем функцию при загрузке страницы для обновления списка регионов.
    getRegionsOptionsList();
});
