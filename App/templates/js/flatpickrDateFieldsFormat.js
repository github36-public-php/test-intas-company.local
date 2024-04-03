// Форматирование полей ввода даты.
$(function () {
    $("#dateRideFromMoscow, #regionListDateRideFromMoscow").flatpickr({
        locale: "ru", // Установка локализации на русский язык
        dateFormat: "d.m.Y", // Формат даты
        defaultDate: new Date() // Текущая дата
    });
});
