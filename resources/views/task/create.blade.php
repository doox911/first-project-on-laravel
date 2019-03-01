@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Добавить задачу</h3></div>

                <div class="card-body">

                    <form action="post">
                        <div class="form-group">
                            <label for="task-setter">Постановщик</label>
                            <select class="form-control" name="task-setter" id="task-setter">
                                <option value="{{ Auth::user()->id }}" selected>{{ Auth::user()->second_name }} {{ Auth::user()->name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="task-responsible">Ответственный</label>
                            <select class="form-control" name="task-responsible" id="task-responsible">
                            @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->second_name }} {{ $user->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="task-name">Имя</label>
                            <input type="text" class="form-control" id="task-name" placeholder="Написать ТЗ">
                        </div>
                        <div class="form-group">
                            <label for="task-content">Описание</label>
                            <textarea class="form-control" id="task-content" rows="5"></textarea>
                        </div>

                        <button type="submit" name="task-add" class="btn btn-success">Добавить</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
