@extends('admin.layout')

@section('content')
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Добавить
      </h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ url('/admin') }}">Главное</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ url('/admin/rooms') }}">Комнаты</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Добавить кмнату
          </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('errors.errors')
      <form enctype="multipart/form-data" method="post"
              action="{{route('rooms.store')}}">
              {{ csrf_field() }}
            <!-- Default box -->
            <div class="box">
              <div class="box-header with-border">
              </div>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Названия</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="{{old('name')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Фото</label>
                    <input type="file" id="exampleInputFile" name="img">

                    <p class="help-block">Размер файла должен быть не более 2мб.</p>
                  </div>
              </div>
            </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a type="button" class="btn btn-default"
                  href="{{route('rooms.index')}}">Отменить</a>
                <button type="submit" class="btn btn-success pull-right">Добавить</button>
              </div>
              <!-- /.box-footer-->
            </div>
            <!-- /.box -->
      </form>
    </section>
    <!-- /.content -->
  </div>
@endsection