@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-header">Профиль</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card card-primary card-outline">
                                            <div class="card-body box-profile">
                                                <h3 class="profile-username text-center">{{ $user->name }}</h3>
                                                <p class="text-muted text-center">{{ $user->email }}</p>
                                                <a href="{{ route('logout') }}" class="btn btn-primary btn-block"><b>Выйти</b></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card">
                                            <div class="card-header p-2">
                                                <ul class="nav nav-pills">
                                                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Профиль</a></li>
                                                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Настройки</a></li>
                                                </ul>
                                            </div><!-- /.card-header -->
                                            <div class="card-body">
                                                <div class="tab-content">
                                                    <div class="active tab-pane" id="activity">
                                                        <div class="post">
                                                            <p>Почта подтверждена.</p>
{{--                                                                @if($user->phone == null)--}}
{{--                                                                    <p>Вы пока не подтвердили номер телефона. <a href="/home">Подтвердить?</a></p>--}}
{{--                                                                @else--}}
{{--                                                                    <p>Номер телефона подтвержден.</p>--}}
{{--                                                                @endif--}}

                                                                @if($user->tg == null)
                                                                    <p>Вы пока не подтвердили телеграмм. <a href="https://t.me/laravel_test_for_EasyCode_bot">Подтвердить?</a></p>
                                                                @else
                                                                    <p>Телеграмм подтвержден.</p>
                                                                @endif
                                                        </div>
                                                    </div>

                                                    <div class="tab-pane" id="settings">
                                                        <form class="form-horizontal" action="{{ route('changeSettings') }}" method="post">
                                                            @csrf
                                                            <p>Для того что бы поменять имя, Вам необходимо вписать новое имя и выбрать способ подтверждения</p>
                                                            <div class="form-group row">
                                                                <label for="inputName" class="col-sm-2 col-form-label">Имя</label>
                                                                <div class="col-sm-10">
                                                                    <input name="name" type="text" class="form-control" id="inputName" placeholder="Name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="inputName" class="col-sm-2 col-form-label">Подтверждение</label>
                                                                <div class="col-sm-10">
                                                                    <select name="select" class="w-100">
                                                                        <option value="email">Подтвердить смену имени по почте</option>
{{--                                                                        <option value="phone">Подтвердить смену имени по номеру телефона</option>--}}
                                                                        @if($user->tg != null)
                                                                            <option value="tg">Подтвердить смену имени в телеграмме</option>
                                                                        @endif
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="offset-sm-2 col-sm-10">
                                                                    <button type="submit" class="btn btn-danger">Сменить имя</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
