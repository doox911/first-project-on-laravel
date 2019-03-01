@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Добавить задачу</h3></div>

                <div class="card-body">

                    @if (count($errors) > 0)
                      <div class="alert alert-danger">
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul>
                      </div>
                    @endif

                    <form action="{{ route('task.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="setter">Постановщик</label>
                            <select class="form-control" name="setter" id="setter" required>
                                <option value="{{ Auth::user()->id }}" selected>{{ Auth::user()->second_name }} {{ Auth::user()->name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="responsible" id="responsible" required>
                                <option value="">Ответственный</option>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->second_name }} {{ $user->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Название задачи" required>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="body" id="body" rows="5" placeholder="Описание задачи" required></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="date">Дата: </label>
                                <input type="date" class="form-control" id="date" name="date" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="time">Время: </label>
                                <input type="time" class="form-control" id="time" name="time">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="priorities">Важность: </label>
                                <select class="form-control" name="priorities" id="priorities" required>
                                @foreach ($priorities as $priority)
                                    <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>

                        <button type="submit" name="add" class="btn btn-success">Добавить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
