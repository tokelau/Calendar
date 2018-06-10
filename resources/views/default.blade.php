
<!doctype html>
<html lang="en">

@include('layouts.header')

  <body class="bg-light">

    <div class="container p-3 mb-2 bg-gradient-light text-dark">
      <div class="py-5 text-left">
        <h1>Планировщик</h1>
      </div>
            <nav>
              <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active text-center " id="nav-new-tab" data-toggle="tab" href="#nav-new" role="tab" aria-controls="new-home" aria-selected="true"><h4>Добавить задачу</h4></a>
                <a class="nav-item nav-link  text-center" id="nav-list-tab" data-toggle="tab" href="#nav-list" role="tab" aria-controls="nav-list" aria-selected="false"><h4>Список задач</h4></a>
              </div>
            </nav>

            <div class="row align-items-center justify-content-center col-md-12 order-md-1 tab-content col-sm-2">
                <div class="tab-pane fade in active mt-4" id="nav-new" role="tabpanel" aria-labelledby="nav-new-tab">
                  <form class="needs-validation justify-content-center" novalidate action="{{ url('') }}" method="post" >
                    {!! csrf_field() !!}

                    <div class="form-group mt-2">
                      <label for="topic" class="col-form-label col-form-label-lg-5">Заголовок*:</label>
                      <input type="text" name="topic" class="form-control form-control-lg" id="topic" placeholder="" required>
                      <!-- <div class="invalid-feedback">
                        Please enter your shipping address.
                      </div> -->
                    </div>

                    <div class="form-group row ml-0">
                      <div class="form-group col-3 pl-0"">
                          <label for="type" class="col-form-label col-form-label-lg-5">Тип:</label><br>  
                          <select class="form-control h-50 pl-0" id="type" required>
                            <option value="">Другое</option>
                            <option>Встреча</option>
                            <option>Звонок</option>
                            <option>Дело</option>
                            <option>Совещание</option>
                            <option class="bg-danger text-light">!!!ЭКЗАМЕН!!!</option>
                          </select>
                      </div> 
                      <div class="form-group col-3 pl-0 ml-0"">
                          <label for="type" class="col-form-label col-form-label-lg-5">Длительность:</label><br>  
                          <select class="form-control h-50 pl-0" id="type" required>
                            <option value="">Выберите...</option>
                            <option>< 30 мин.</option>
                            <option>30-60 мин.</option>
                            <option>1-3 ч.</option>
                            <option>> 3 ч.</option>
                          </select>
                      </div> 
                      <div class="form-group pr-0 mr-0">
                        <label for="datetime" class="col-11 col-form-label text-right">Дата и время: </label><br>
                        <div class="col-11">
                            <input class="form-control form-control-sm" type="datetime-local" value="2018-08-19T13:45:00" id="datetime">
                        </div>
                      </div>
                      
                    </div>

                    <div class="form-group mt-2">
                      <label for="address" class="col-form-label col-form-label-lg-5">Место:</label>
                      <input type="text" class="form-control form-control-lg" id="address" placeholder="" required>
                      <!-- <div class="invalid-feedback">
                        Please enter your shipping address.
                      </div> -->
                    </div>

                    <div class="form-group mt-2">
                      <label for="comment" class="col-form-label col-form-label-lg-5">Комментарий:</label>
                      <textarea class="form-control" id="comment" rows="3"></textarea>
                      <!-- <div class="invalid-feedback">
                        Please enter your shipping address.
                      </div> -->
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Добавить задачу</button>
                  </form>
              </div>

              <div class="tab-pane fade in col-md-12" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">
                  <table class="table table-hover">
                    <thead class="pt-3">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Тема</th>
                        <th scope="col">Тип</th>
                        <th scope="col">Место</th>
                        <th scope="col">Дата</th>
                        <th scope="col">Длительность</th>
                        <th scope="col">Комментарий</th>
                        <th scope="col">Функции</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($tasks as $task)
                        <tr>
                          <th scope="row">{{ var_dump($task) }}</th>
                          <td>Mark</td>
                          <td>Otto</td>d
                          <td>@mdo</td>
                          <td>@mdo</td>
                          <td>@mdo</td>
                          <td>@mdo</td>
                          <td class="row"><button class="btn btn-primary btn-lg btn-block col-1" type="submit">ред.</button>
                            <button class="btn btn-primary btn-lg btn-block col-1" type="submit">уд.</button></td>
                        @endforeach
                      </tr>
                    </tbody>
                  </table>
              </div>
            </div>
          </div>

    </div>

  </body>
</html>
