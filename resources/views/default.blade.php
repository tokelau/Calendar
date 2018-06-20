
<!doctype html>
<html lang="en">

@include('layouts.header')

<body class="bg-light">

    <div class="container p-3 mb-2 bg-gradient-light text-dark">
      <div class="py-5 text-left">
        <h1 class="col-4">Планировщик</h1> 
          
            <nav>
              <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                <a class="nav-item nav-link @if($toShow == 'add') active @endif text-center " id="nav-new-tab" data-toggle="tab" href="#nav-new" role="tab" aria-controls="new-home" aria-selected="true"><h4>Добавить задачу</h4></a>
                <a class="nav-item nav-link @if($toShow == 'list') active @endif text-center" id="nav-list-tab" data-toggle="tab" href="#nav-list" role="tab" aria-controls="nav-list" aria-selected="false"><h4>Список задач</h4></a>
              </div>
            </nav>

            <div class="row align-items-center justify-content-center col-md-12 order-md-1 tab-content col-sm-2">
                <div class="tab-pane @if($toShow == 'add') active @else fade in @endif mt-4" id="nav-new" role="tabpanel" aria-labelledby="nav-new-tab">
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
                          <select class="form-control h-50 pl-0" id="type" name="type" required>
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
                          <select class="form-control h-50 pl-0" id="duration" name="duration" required>
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
                            <input class="form-control form-control-sm" type="datetime-local" value="2018-08-19T13:45:00" id="date" name="date">
                        </div>
                      </div>
                    </div>

                    <div class="form-group mt-2">
                      <label for="address" class="col-form-label col-form-label-lg-5">Место:</label>
                      <input type="text" class="form-control form-control-lg" id="place" name="place" placeholder="" required>
                      <!-- <div class="invalid-feedback">
                        Please enter your shipping address.
                      </div> -->
                    </div>

                    <div class="form-group mt-2">
                      <label for="comment" class="col-form-label col-form-label-lg-5">Комментарий (макс. 255):</label>
                      <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                      <!-- <div class="invalid-feedback">
                        Please enter your shipping address.
                      </div> -->
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Добавить задачу</button>
                  </form>
                </div>

              <div class="tab-pane @if($toShow == 'list') active @else fade in @endif col-md-12" id="nav-list" role="tabpanel" aria-labelledby="nav-list-tab">

                <div class="d-flex flex-row-reverse">
                  <form action="{{ url('/', 'overdue') }}" method="GET" class="m-1 ">
                      {{ csrf_field() }}

                      <button type="submit" class="btn">
                        <i class="fa fa-trash"></i> Просроченные
                      </button>
                  </form>
                  <form action="{{ url('/', 'current') }}" method="GET" class="m-1">
                        {{ csrf_field() }}

                        <button type="submit" class="btn">
                          <i class="fa fa-trash"></i> Текущие
                        </button>
                    </form>

                    <form action="{{ url('/', 'today') }}" method="GET" class="m-1">
                        {{ csrf_field() }}

                        <button type="submit" class="btn" class="m-1">
                          <i class="fa fa-trash"></i> Сегодня
                        </button>
                    </form>
                    <form action="{{ url('/', 'tomorrow') }}" method="GET" class="m-1">
                        {{ csrf_field() }}

                        <button type="submit" class="btn">
                          <i class="fa fa-trash"></i> Завтра
                        </button>
                    </form>
                  </div>

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
                      @foreach($tasks as $key => $value)
                        <tr>
                          <th>{{ $key + 1 }}</th>
                          <td>{{ $tasks[$key]->topic }}</td>
                          <td>{{ $tasks[$key]->type }}</td>
                          <td>{{ $tasks[$key]->place }}</td>
                          <td>{{ $tasks[$key]->date }}</td>
                          <td>{{ $tasks[$key]->duration }}</td>
                          <td>{{ $tasks[$key]->comment }}</td>

                          <td><form action="{{ url('task/'.$tasks[$key]->id) }}" method="GET">
                                <button type="submit" class="btn btn-danger">
                                  <i class="fa fa-trash"></i> Ред.
                                </button>
                            </form>
                            <form action="{{ url('task/'.$tasks[$key]->id, $key) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}

                                <button type="submit" class="btn btn-danger">
                                  <i class="fa fa-trash"></i> Уд.
                                </button>
                            </form></td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>

                  
              </div>
      </div>
    </div>

  </body>
</html>
