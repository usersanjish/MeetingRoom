@extends('admin.layout')
@section('content')
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @if(isset($room))
      <section class="content-header">
        <h1>
          Редактировать
        </h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ url('/admin') }}">Главное</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ url('/admin/rooms') }}">Комнаты</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Редактировать
          </li>
         </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        @include('errors.errors')
        <!-- Default box -->
        <div class="box">
          <form enctype="multipart/form-data" method="post" action="{{route('rooms.update', $room->id)}}
            ">
              <input name="_method" type="hidden" value="PUT">
              {{ csrf_field() }}
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Названия</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{$room->name}}" >
                  </div>
                  <div class="form-group">
                      <label for="exampleInputFile">Фото</label>
                          <div class="js-lightgallery">
                            <a href="{{asset('uploads')}}/{{$room->img}}">
                              <img src="{{asset('uploads')}}/{{$room->img}}" alt="" class=" img-responsive" width="150">
                            </a>
                          </div>
                      <input type="file" id="exampleInputFile" name="img" class="">
                      <p class="help-block">Размер файла должен быть не более 2мб.</p>
                  </div>
              </div>
            </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a type="button" class="btn btn-default" href="{{route('rooms.index')}}">Отменить</a>
                <button type="submit" class="btn btn-warning pull-right">Изменить</button>
              </div>
              <!-- /.box-footer-->
          </form>
        </div>
        <!-- /.box -->
      </section>
    @endif
    <!-- /.content -->
  </div>

@endsection