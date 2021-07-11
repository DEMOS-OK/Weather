

/**
 * Собирает данные формы
 * @param {string} selector
 * @param {Array} exclude
 */
function getFormData(selector, exclude = []) {
    obj_form = $(selector);

    var hData = {};
    $('input, textarea', obj_form).each(function () {
        if (this.name && this.name != '' && !(exclude.includes(this.name))) {
            hData[this.name] = this.value;
        }
    });

    return hData;
}

/**
 * Отображает сообщение об ошибке
 * @param {string} message
 */
function showError(message) {
    $('.error-row').css('display', 'flex');
    $('.error-row .alert').html(message);
}

/**
 * Проверяет поле "город" на заполненность
 * @param {string} city 
 */
function validateCity(city)
{
    return city.length > 0;
}

/**
 * Проверяет формат на заполненность
 * @param {string} format
 */
function validateFormat(format)
{
    return format === 'json' || format == 'xml';
}

/**
 * Проверяет данные формы на заполненность
 * @param {string} city 
 * @param {string} format 
 */
function validateForm(city, format)
{
    errors = 0;
    if (!validateCity(city)) {
        errors++;
        showError('Город обязателен для заполнения');
    }
    if (!validateFormat(format)) {
        errors++;
        showError('Не указан формат данных');
    }
    
    return errors === 0;

}

$('#getWeather').click(function() {

    data = getFormData('#weatherForm');
    format = $('select[name=format]').val();

    if (validateForm(data['city'], format)) {
        $.ajax({
            type: 'POST',
            data: data,
            dataType: 'json',
            url: '/weather/' + format,
            async: true,
            success: function (data) {

            }
        });
    }
});