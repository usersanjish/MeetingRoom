@extends('admin.layout')
@section('scripts')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Список
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('errors.errors')
      <!-- Default box -->
      <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-3">
              <form action="{{route('filter')}}" method="POST">
                {{ csrf_field() }}
                  <div class="form-row">
                    <div class="form-group pull-left">
                        <label for="exampleFormControlSelect1">Филтер</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="status">
                          
                          <option value="0">Все</option>
                          <option value="1">Свободные</option>
                          <option value="2">Занитые</option>
                        </select>
                      </div>
                      <br>
                  <button type="submit" class="input-control glyphicon glyphicon-search btn btn-default" style="margin-top: 4px;"></button>
                  </div>
                </form>
              </div>
              </div>
              <div class="row list-group list-group-horizontal-lg">
                @if(isset($booked))
                  @foreach($booked as $key => $value)
                    <div class="col-md-3">
                      <div class="card-group">
                        <div class="card">
                          <h5 class="card-title">
                              {{$value->getLoc($value->room_id)}}
                          </h5>
                          
                          <img src="{{asset($value->getImg($value->room_id))}}" class="card-img-top thumbnail img-responsive" alt="">
                          <div class="card-body">
                            <h5 class="red">Статус: Занято</h5>
                            <p class="card-text">
                              <b>Кто: </b> {{$value->getUser($value->user_id)}}
                            </p>
                            <p class="card-title">
                              <b>Названия событии:</b> {{$value->title}}
                            </p>
                            <p class="card-text">
                              <b>Описание:</b> {{$value->description}}
                            </p>
                            <p class="card-text">
                              <b>Начало:</b> {{$value->start}}
                            </p>
                            <p class="card-text">
                              <b>Конец:</b> {{$value->end}}
                            </p>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                @endif
                @if(isset($free))
                  @foreach($free as $key => $value)
                    <div class="col-md-3">
                      <div class="card-group">
                        <div class="card">
                          <h5 class="card-title">
                                {{$value->name}}
                          </h5>
                          @if( $value->img != '')
                            <img src="{{asset('uploads')}}/{{$value->img}}" class="card-img-top thumbnail img-responsive" alt="">
                          @else
                            <img src="{{asset('uploads/img')}}/no-image.png" class="card-img-top thumbnail img-responsive" alt="">
                          @endif
                          <div class="card-body">
                            <h5 class="green">Статус: Свободно</h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                @endif
              </div>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->
      </div>
    </section>
    <!-- /.content -->
  </div>
@endsection