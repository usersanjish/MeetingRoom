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
          <a href="{{ url('/admin/user') }}">Пользователи</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Добавить пользователя
        </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('errors.errors')
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
        </div>
        <form method="post" action="{{route('user.store')}}" enctype="multipart/form-data">
          {{ csrf_field() }}
            <div class="box-body">
              <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Имя</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="name" value="{{old('name')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="email" value="{{old('email')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Пароль</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Аватар</label>
                    <input type="file" id="exampleInputFile" name="avatar" value="{{old('avatar')}}">
                
                <p class="help-block">Размер файла должен быть не более 2мб.</p>
              </div>
            </div>
          </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <a type="button" class="btn btn-default"
                      href="{{route('user.index')}}">Отменить</a>
              <button type="submi" class="btn btn-success pull-right">Добавить</button>
            </div>
        </form>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@endsection