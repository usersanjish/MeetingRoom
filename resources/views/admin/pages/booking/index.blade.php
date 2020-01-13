@extends('admin.layout')
@section('scripts')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Забронировать
      </h1>
      <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="{{ url('/admin') }}">Главное</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              Заброниновать
            </li>
          </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('success.success')
      <!-- Default box -->
      <div class="box">
            <div class="box-header">
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('booking.create')}}" class="btn btn-success">Добавить</a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Место</th>
                  <th>Названия событии</th>
                  
                  <th>Кто</th>
                  <th>Начало</th>
                  <th>Конец</th>
                  <th>Фото</th>
                  <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                   @if(isset($bookings))
                     @foreach($bookings as $booking)
                      <tr>

                          @if(date('d-m-Y H:i') <= $booking->end)
                              <td>{{$booking->id}}</td>
                              <td>{{$booking->getLoc($booking->room_id)}}</td>
                              <td>{{$booking->title}}</td>
                              <td>{{$booking->getUser($booking->user_id)}}</td>
                              <td>{{$booking->start}}</td>
                              <td>{{$booking->end}}</td>
                          <td>
                            <div class="js-lightgallery">
                                <a href="{{asset($booking->getImg($booking->room_id))}}">
                                  <img src="{{asset($booking->getImg($booking->room_id))}}" alt="" class="thumbnail img-responsive" width="150">
                                </a>
                              </div>
                          </td>
                            <td>
                            <a href="{{route('view',$booking->id)}}" class="glyphicon glyphicon-search btn btn-default"></a>
                            <br>
                            <a href="{{route('booking.edit',$booking->id)}}" class="glyphicon glyphicon-pencil btn btn-default"></a>
                            <form action="{{route('booking.destroy', $booking->id)}}" method="POST" onsubmit="deletefuc(this); return false;">
                              {{ csrf_field() }} {{ method_field('DELETE') }}
                              <button type="submit"
                                class="glyphicon glyphicon-trash btn btn-default"></button>
                            </form>
                          </td>
                          @endif
                      </tr>
                      @endforeach
                   @endif
                </tfoot>
              </table>
              @if($bookings->total() > $bookings->count())
                <br>
                <div class="row justify-content-center">
                  <div class="col-md-12">
                    <div class="card">
                      <div class="card-body">
                        {{ $bookings->links() }}
                      </div>
                    </div>
                  </div>
                </div>
              @endif
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->
      </div>
      @include('modals.delet_modal')
    </section>
    <!-- /.content -->
  </div>
@endsection