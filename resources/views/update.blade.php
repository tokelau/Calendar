<!doctype html>
<html lang="en">

@include('layouts.header')

<body class="container p-3 mb-2 bg-gradient-light text-dark">
	<div class="row align-items-center justify-content-center col-md-12 order-md-1 tab-content col-sm-2">

	<form class="needs-validation justify-content-center" novalidate action="{{ url('task/'.$key) }}" method="post" >
                    {{ csrf_field() }}

                    <div class="form-group mt-2">
                      <label for="topic" class="col-form-label col-form-label-lg-5">Заголовок*:</label>
                      <input type="text" name="topic" class="form-control form-control-lg" id="topic" placeholder="" required value="{{ $task->topic }}">
                      <!-- <div class="invalid-feedback">
                        Please enter your shipping address.
                      </div> -->
                    </div>

                    <div class="form-group row ml-0">
                      <div class="form-group col-3 pl-0"">
                          <label for="type" class="col-form-label col-form-label-lg-5">Тип:</label><br>  
                          <select class="form-control h-50 pl-0" id="type" name="type" required value="{{ $task->type }}">
                            <option>Другое</option>
                            <option>Встреча</option>
                            <option>Звонок</option>
                            <option>Дело</option>
                            <option>Совещание</option>
                            <option class="bg-danger text-light">!!!ЭКЗАМЕН!!!</option>
                          </select>
                      </div> 
                      <div class="form-group col-3 pl-0 ml-0"">
                          <label for="type" class="col-form-label col-form-label-lg-5">Длительность:</label><br>  
                          <select class="form-control h-50 pl-0" id="duration" name="duration" required value="{{ $task->duration }}">
                            <option value="">Выберите...</option>
                            <option>30 мин.</option>
                            <option>30-60 мин.</option>
                            <option>1-3 ч.</option>
                            <option>> 3 ч.</option>
                          </select>
                      </div> 
                      <div class="form-group pr-0 mr-0">
                        <label for="date" class="col-11 col-form-label text-right">Дата и время: </label><br>
                        <div class="col-11">
                            <input class="form-control form-control-sm" type="datetime-local" id="date" name="date" value="{{ str_replace(' ', 'T', $task->date) }}">
                        </div>
                      </div>
                      
                    </div>

                    <div class="form-group mt-2">
                      <label class="col-form-label col-form-label-lg-5">Место:</label>
                      <input type="text" class="form-control form-control-lg" id="place" name="place" placeholder="" required value="{{ $task->place }}">
                      <!-- <div class="invalid-feedback">
                        Please enter your shipping address.
                      </div> -->
                    </div>

                    <div class="form-group mt-2">
                      <label for="comment" class="col-form-label col-form-label-lg-5">Комментарий (макс. 255):</label>
                      <textarea class="form-control" id="comment" name="comment" rows="3" value="{{ $task->comment }}"></textarea>
                      <!-- <div class="invalid-feedback">
                        Please enter your shipping address.
                      </div> -->
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Сохранить изменения</button>
                  </form>
        </div>
</body>
</html>
