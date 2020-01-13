@extends('admin.layout')

@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <input type="hidden" name="route" value="{{route('checkdate')}}">
  @if(isset($room_id))
    <input id="check_id" type="hidden" name="" value="{{$room_id}}">
  @endif
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
          <a href="{{ url('/admin/booking') }}">Заброниновать</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Добавить событие
        </li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
          <div class="box-header with-border">
          </div>
          <div class="box-body">
              <div class="col-md-4">
                  <div class="list-group">
                    @if(isset($getImg))
                      <div class="js-lightgallery">
                          <a href="{{asset($getImg)}}">
                            <img src="{{asset($getImg)}}" alt="" class="img-thumbnail img-responsive" >
                          </a>
                        </div>
                        <button type="button" class="btn btn-success" id="addBooking">
                          Добавить событие в календарь
                        </button>
                      @endif
                  </div>

                  <div class="listscroll pre-scrollable list-group-item-action">
                    @foreach($bookings as $key => $booking)
                      <a 
                      <?php if(isset($room_id)): echo ($room_id == $booking->id) ? "class='active list-group-item list-group-item-action'" : ""; endif?>
                      href="{{route('select', $booking->id)}}" class=" list-group-item list-group-item-action"
                      >{{$booking->name}}
                      </a>
                    @endforeach
                  </div>
              </div>
              <div class="col-md-8">
                @include('calendar.calendar')
              </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <a type="button" class="btn btn-default"
              href="{{route('booking.index')}}">Назад</a>
          </div>
        @include('modals.add_booking_modal')
          <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    <!-- /.content -->
  </div>
@endsection