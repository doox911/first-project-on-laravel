@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="text-center"> Личный кабинет </h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-12">
            <div class="foto-container align-items-start">
                <div class="foto p-3 text-center">
                    <img src="{{ Auth::user()->foto }}" class="person-avatar rounded" alt="{{ Auth::user()->second_name }} {{ Auth::user()->name }} {{ Auth::user()->patronumic }}">
                </div>
                <div class="foto-app d-flex justify-content-center mt-3 mb-3">
                    <button type="button" class="btn btn-primary border-0 m-1" data-toggle="modal" data-target="#person-upload">Изменить</button>
                    <button type="button" class="btn btn-danger border-0 m-1 personal-foto-remove" data-user="{{ Auth::user()->id }}">Удалить</button>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-12">
            <div class="person-container">
                <div class="fio">
                    <h2>{{ Auth::user()->second_name }} {{ Auth::user()->name }}</h2>
                </div>
                <div class="person-properties">
                    <div class="mt-3 mb-3">
                        <h4>Перональные данные</h4>
                    </div>
                    <div class="input-group mt-3 mb-3 mt-3 mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="person-second-name">Фамилия</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input" name="second-name" aria-describedby="person-second-name" value="{{ Auth::user()->second_name }}">
                        <button type="button" class="btn btn-success border-0 ml-3 btn-change-second-name" data-user="{{ Auth::user()->id }}">Изменить</button>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="person-name">Имя</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input" name="name" aria-describedby="person-name" value="{{ Auth::user()->name }}">
                        <button type="button" class="btn btn-success border-0 ml-3 btn-change-name" data-user="{{ Auth::user()->id }}">Изменить</button>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="person-patronumic">Отчество</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input" name="patronumic" aria-describedby="person-patronumic" value="{{ Auth::user()->patronumic }}">
                        <button type="button" class="btn btn-success border-0 ml-3 btn-change-patronumic" data-user="{{ Auth::user()->id }}">Изменить</button>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="person-login">Логин</span>
                        </div>
                        <input type="text" class="form-control" name="login" aria-label="login" aria-describedby="person-login" value="{{ Auth::user()->nick }}">
                        <button type="button" class="btn btn-success border-0 ml-3 btn-change-login" data-user="{{ Auth::user()->id }}">Изменить</button>
                    </div>
                    <div class="input-group mt-3 mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="person-email">Email</span>
                        </div>
                        <input type="text" class="form-control" aria-label="Sizing example input" name="email" aria-describedby="person-email" value="{{ Auth::user()->email }}">
                        <button type="button" class="btn btn-success border-0 ml-3 btn-change-email" data-user="{{ Auth::user()->id }}">Изменить</button>
                    </div>
                    <div class="mt-3 mb-3">
                        <h4>Подпись</h4>
                    </div>
                    <div class="input-group  mt-3 mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Подпись</span>
                        </div>
                        <textarea class="form-control" id="person-signature" name="signature" rows="5">{{ Auth::user()->signature }}</textarea>
                        <button type="button" class="btn btn-success btn-block border-0  mt-3 btn-change-signature" data-user="{{ Auth::user()->id }}">Изменить</button>
                    </div>
                </div>
                <div class="person-app">
                    <button id="delete-profile" type="button" class="btn btn-danger border-0" data-user={{ Auth::user()->id }}>Удалить Аккаунт</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="person-upload" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Загрузить новое изображение</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="input-group mb-3">
                    <input type="file" name="foto" id="personBrowseImage" data-user="{{ Auth::user()->id }}" aria-describedby="person-upload-image">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                <button type="button" class="btn btn-success border-0 btn-change-foto" data-user="{{ Auth::user()->id }}" data-dismiss="modal">Изменить</button>
            </div>
        </div>
    </div>
</div>
@endsection
