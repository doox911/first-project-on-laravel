@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col">
            <form action="{{ route('tasks.index') }}">

                <div class="row">
                    <div class="col text-center">
                        <label for="setter">Постановщик</label>
                        <input id="setter" type="text" class="form-control" name="setter"  value="{{ request()->setter }}" placeholder="Введите имя">
                    </div>
                    <div class="col text-center">
                        <label for="responsible">Ответственный</label>
                        <input id="responsible" type="text" class="form-control" name="responsible"  value="{{ request()->responsible }}" placeholder="Введите имя">
                    </div>
                    <div class="col text-center">
                        <label for="status">Сортировать по статусу</label>
                        <select id="status" class="form-control" name="status">
                            <option value="">Не учитывать</option>
                            @foreach ($statuses as $status)
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col text-center">
                        <label for="priority">Сортировать по важности</label>
                        <select id="priority" class="form-control" name="priority">
                            <option value="">Не учитывать</option>
                            @foreach ($priorities as $priority)
                            <option value="{{ $priority->id }}">{{ $priority->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col d-flex align-items-end justify-content-center">
                        <button type="submit" class="btn btn-primary">Применить</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">

            @if (!empty ($tasks))
                @foreach ($tasks as $id => $task)

                <div class="jumbotron pb-1">
                    <h1 class="display-5"><a href="{{ URL::to('tasks', $task->id ) }}" class="text-muted">{{ $task->title }}</a></h1>
                    <hr class="my-4">
                    <p class="lead">{{ $task->body }}</p>

                    <div class="d-flex justify-content-end pt-3 pb-3">
                        <a class="btn btn-secondary mr-2" href="{{ URL::to('tasks', $task->id ) . '/edit'}}" role="button">Изменить</a>
                        <a class="btn btn-danger text-white delete-task" role="button" data-task="{{ $task->id }}">Удалить</a>
                    </div>
                </div>

                @endforeach
            @endif

        </div>
    </div>
</div>
<div class="container">
    <hr>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-center">
                @if (!empty ($tasks))
                    {{ $tasks->appends(request()->query())->links() }}
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
