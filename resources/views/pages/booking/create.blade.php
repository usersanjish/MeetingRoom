@extends('layout')

@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <input type="hidden" name="route" value="{{route('checkdate')}}">
  @if(isset($room_id))
    <input id="check_id" type="hidden" name="" value="{{$room_id}}">
  @endif
	<div class="wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h2>
        Добавить
      </h2>
    </section>
    <!-- Main content -->
    <section class="content">
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
                  <li class="breadcrumb-item active" aria-current="page">Добавить событие
                  </li>
                </ol>
              </nav>
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
                      href="{{route('selects', $booking->id)}}" class=" list-group-item list-group-item-action"
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
              href="{{route('bookings.index')}}">Назад</a>
          </div>
        @include('modals.add_booking_modal')
          <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    <!-- /.content -->
  </div>
@endsection