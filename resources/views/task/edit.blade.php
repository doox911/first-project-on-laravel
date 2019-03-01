@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header"><h3>Редактировать задачу</h3></div>

                <div class="card-body">


                        <div class="form-group">
                            <label for="time">Заголовок: </label>
                            <input type="text" name="title" value="{{ $task->title }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="body">Описание: </label>
                            <textarea class="form-control" name="body" id="body" rows="5" placeholder="Описание задачи" required>{{ $task->body }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="responsible">Ответственный: </label>
                            <select class="form-control" name="responsible" id="responsible" required>
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->second_name }} {{ $user->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="statuses">Статус: </label>
                            <select class="form-control" name="statuses" id="statuses" required>
                            @foreach ($statuses as $status)
                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="priorities">Важность: </label>
                            <select class="form-control" name="priorities" id="priorities" required>
                            @foreach ($priorities as $priority)
                                <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                            @endforeach
                            </select>
                        </div>

                        <button type="submit" name="change" class="btn btn-secondary" data-task="{{ $task->id }}">Изменить</button>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
