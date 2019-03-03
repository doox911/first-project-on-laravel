@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">

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
                {{ $tasks->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
