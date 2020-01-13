@extends('admin.layout')
@section('scripts')
@section('content')
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Комнаты
        </h1>
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ url('/admin') }}">Главное</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Комнаты
        </li>
      </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="box">
          @include('success.success')
              <div class="box-header">
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="form-group">
                  <a href="{{route('rooms.create')}}" class="btn btn-success">Добавить</a>
                </div>
                @if(isset($rooms))
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Названия</th>
                      <th>Фото</th>
                      <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rooms as $room)
                      <tr>
                        <td>{{$room->id}}</td>
                        <td>{{$room->name}}</td>
                        <td>
                          <div class="js-lightgallery">
                            <a href="{{asset($room->getImage())}}">
                              <img src="{{asset($room->getImage())}}" alt="" class="thumbnail img-responsive" width="150">
                            </a>
                          </div>
                        </td>
                        <td>
                          <a href="{{route('rooms.edit', $room->id)}}" class="glyphicon glyphicon-pencil btn btn-default"></a>

                          <form action="{{route('rooms.destroy', $room->id)}}" method="POST" onsubmit="deletefuc(this); return false;">
                            {{ csrf_field() }} {{ method_field('DELETE') }}
                            <button type="submit"
                              class="glyphicon glyphicon-trash btn btn-default"></button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                    </tfoot>
                  </table>
                @endif
                @if($rooms->total() > $rooms->count())
                  <br>
                  <div class="row justify-content-center">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-body">
                          {{ $rooms->links() }}
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
              </div>
              <!-- /.box-body -->
            </div>
        <!-- /.box -->
        @include('modals.delet_modal')
      </section>
      <!-- /.content -->
  </div>
@endsection