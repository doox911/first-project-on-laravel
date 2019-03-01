@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">

            <div class="jumbotron pb-1">
                <h1 class="display-5"><a href="#" class="text-muted">{{ $task->title }}</a></h1>
                <hr class="my-4">
                <p class="lead">{{ $task->body }}</p>
                <hr class="my-4">
                <div class="row mb-3">
                    <div class="">
                        <b class="badge">Постановщик:&nbsp;&nbsp;</b>
                        <span class="badge badge-secondary">{{ $task->setter_name }} {{ $task->setter_second_name }}</span>
                        <b class="badge">Ответственый:&nbsp;&nbsp;</b>
                        <span class="badge badge-secondary">{{ $task->responsible_name }} {{ $task->responsible_second_name }}</span>
                        <b class="badge">Создана:&nbsp;&nbsp;</b>
                        <span class="badge badge-info">{{ $task->created_at }}</span>
                        <b class="badge">Статус:&nbsp;&nbsp;</b>
                        <span class="badge badge-danger">{{ !empty($task->status) ? $task->status : 'Не установлено'}}</span>
                        <b class="badge">Deadline:&nbsp;&nbsp;</b>
                        <span class="badge badge-danger">{{ !empty($task->deadline) ? $task->deadline : 'Не установлено'}}</span>
                    </div>
                </div>
                <p>

                <div class="d-flex justify-content-end pt-3 pb-3">
                    <a class="btn btn-secondary mr-2" href="{{ URL::to('task', $task->id ) . '/edit'}}" role="button">Изменить</a>
                    <a class="btn btn-danger text-white delete-task" role="button" data-task="{{ $task->id }}">Удалить</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
