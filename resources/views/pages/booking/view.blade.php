@extends('layout')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
  <div class="wrapper">
    <!-- Main content -->
    <section class="content-header">
      <h2>
        Подробно
      </h2>
    </section>
      <!-- Default box -->
      <div>
          <div class="box-header with-border">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="{{ url('/') }}">Главное</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="{{ url('/bookings') }}">Заброниновать</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">Подробно
                  </li>
                </ol>
              </nav>
          </div>
          <div class="box-body">
              <div class="col-md-5">
                <div class="form-group">
                  @if(isset($getImg))
                      <img src="{{asset($getImg)}}" alt="" class="img-thumbnail img-responsive" >
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Загаловок</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="title" readonly value="@if(isset($booking)){{$booking->title}}@endif">
                </div>
                <label for="exampleInputFile">Начало</label>
                <div class="form-group">
                  <input type="text" class="form-control" id="exampleInputFile" name="start" readonly value="@if(isset($booking)){{$booking->start}} @endif">
                </div>
                <label for="exampleInputFile">Конец</label>
                <div class="form-group">
                  <input type="text" class="form-control" id="exampleInputFile" name="end" readonly value="@if(isset($booking)){{$booking->end}}@endif">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Описание</label>
                  <textarea class="form-control" rows="10" cols="45" name="description" readonly>@if(isset($booking)){{$booking->description}}@endif</textarea>
                </div>
              </div>
              <div class="col-md-7">
                @include('calendar.calendar')
              </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <a type="button" class="btn btn-default"
              href="{{route('bookings.index')}}">Назад</a>
          </div>
          <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    <!-- /.content -->
  </div>
@endsection