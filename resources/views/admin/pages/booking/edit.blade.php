@extends('admin.layout')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Редактировать
      </h1>
      <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="{{ url('/admin') }}">Главное</a>
          </li>
          <li class="breadcrumb-item">
            <a href="{{ url('/admin/booking') }}">Заброниновать</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Редактировать
          </li>
        </ol>
    </section>
  <input type="hidden" name="route" value="{{route('checkdate')}}">
    <!-- Main content -->
    <section class="content">
      @include('errors.errors')
      <!-- Default box -->
      <div class="box">
          <div class="box-header with-border">
          </div>
          <div class="box-body">
            <form method="post" action="{{route('booking.update', $booking->id)}}">
              <input name="_method" type="hidden" value="PUT">
              @if(isset($booking))
                <input id="check_id" type="hidden" name="room_id" value="{{$booking->room_id}}">
              @endif
              {{ csrf_field() }}
             
              <div class="col-md-5">
                <div class="form-group">
                  @if(isset($getImg))
                      <img src="{{asset($getImg)}}" alt="" class="img-thumbnail img-responsive" >
                  @endif
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Загаловок</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" name="title" value="@if(isset($booking)){{$booking->title}}@endif">
                  <span class="vtitle text-danger"></span>
                </div>
                <label for="exampleInputFile">Начало</label>
                <div class="input-group">
                  <span class="input-group-addon" id="set_start">
                    <i class="glyphicon glyphicon-calendar"></i>
                  </span>
                  <input type="text" class="form-control date_start" id="exampleInputFile" name="start" readonly aria-describedby="set_start clear_start" data-option="start" value="@if(isset($booking)){{$booking->start}} @endif">
                  <span class="input-group-addon danger" id="clear_start">
                    <i class="glyphicon glyphicon-remove"></i>
                  </span>
                </div>
                <div class="input-group">
                  <span class="vstart text-danger"></span>
                </div>
                <label for="exampleInputFile">Конец</label>
                <div class="input-group">
                  <span class="input-group-addon" id="set_end">
                    <i class="glyphicon glyphicon-calendar"></i>
                  </span>
                  <input type="text" class="form-control date_end" id="exampleInputFile" name="end" readonly aria-describedby="set_end clear_end" data-option="end"value="@if(isset($booking)){{$booking->end}}@endif">
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-remove" id="clear_end"></i>
                  </span>
                </div>
                <span class="vend text-danger"></span>
                <div class="form-group">
                  <label for="exampleInputFile">Описание</label>
                  <textarea class="form-control" rows="10" cols="45" name="description">@if(isset($booking)){{$booking->description}}@endif</textarea>
                  <span class="vdescription text-danger"></span>
                </div>
              </div>
              <div class="col-md-7">
                @include('calendar.calendar')
              </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <a type="button" class="btn btn-default"
              href="{{route('booking.index')}}">Отменить</a>
            <button id="submit" type="submit" class="btn btn-success pull-right">Сохранит</button>
          </div>
        </form>
          <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    <!-- /.content -->
  </div>
@endsection