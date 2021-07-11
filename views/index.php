<div class="container mt-5">

    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <h4> Получение информации о погоде </h4>
        </div>
    </div>

    <div class="row justify-content-center hidden error-row">
        <div class="col-md-6">
            <div class="alert alert-danger" role="alert">
                Ошибка
            </div>
        </div>
    </div>


    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/weather/get" method='POST'>
                <div class="form-group mb-3">
                    <label for="city"> Укажите название города </label>
                    <input type="text" class='form-control' name='city' placeholder='Москва'>
                </div>
                <div class="form-group">
                    <label for="format"> Выберите формат</label>
                    <select class="form-select mb-3" aria-label="Default select example" name='format'>
                        <option value="json"> JSON </option>
                        <option value="xml"> XML </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary"> Получить </button>
            </form>
        </div>
    </div>

</div>