@extends('layout')

@section('content')
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-4">

                <div class="leave-comment mr0"><!--leave comment-->
                    @include('success.success')
                    @if(session('status'))
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">x</span>
                            </button>
                            {{session('status')}}
                        </div>
                    @endif
                    <h3 class="text-uppercase">Войти</h3>
                    @include('errors.errors')
                    <br>
                    <form class="form-horizontal contact-form" role="form" method="post" action="{{route('login')}}">
                    {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" 
                                       placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="password" class="form-control" id="password" name="password"
                                       placeholder="Пароль">
                            </div>
                        </div>
                        <button type="submit" class="btn send-btn">Вход</button>

                    </form>
                </div><!--end leave comment-->
            </div>
        </div>
    </div>
</div>
<!-- end main content-->
@endsection