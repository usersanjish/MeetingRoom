@extends('admin.layout')
@section('scripts')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Пользователи
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="{{ url('/admin') }}">Главное</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Пользователи
        </li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('success.success')
      <!-- Default box -->
      <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                <a href="{{route('user.create')}}" class="btn btn-success">Добавить</a>
              </div>
              @if(isset($users))
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>E-mail</th>
                    <th>Аватар</th>
                    <th>Действия</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach($users as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>
                        <img src="{{asset($user->getImage())}}" alt="" class="img-responsive" width="65" height="65">
                      </td>
                      <td>
                        <a href="{{route('user.edit',$user->id)}}" class="glyphicon glyphicon-pencil btn btn-default"></a>
                        <form action="{{route('user.destroy', $user->id)}}" method="POST" onsubmit="deletefuc(this); return false;">
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
            </div>
            <!-- /.box-body -->
          </div>
          @include('modals.delet_modal')
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
@endsection