@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row"></div>

    <div class="row">
        <div class="col">

            @foreach ($tasks as $id => $task)

            <div class="jumbotron pb-1">
                <h1 class="display-5">{{ $task->title }}</h1>
                <hr class="my-4">
                <p class="lead">{{ $task->body }}</p>
                <hr class="my-4">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <b>Постановщик:&nbsp;&nbsp;</b>
                        <span class="bg-success text-white p-1 rounded">{{ $task->setter_name }} {{ $task->setter_second_name }}</span>
                    </div>
                    <div class="col-md-3">
                        <b>Ответственый:&nbsp;&nbsp;</b>
                        <span class="bg-success text-white p-1 rounded">{{ $task->responsible_name }} {{ $task->responsible_second_name }}</span>
                    </div>
                    <div class="col-md-3">
                        <b>Создана:&nbsp;&nbsp;</b>
                        <span class="bg-info text-white p-1 rounded">{{ $task->created_at }}</span>
                    </div>
                    <div class="col-md-3">
                        <b>Deadline:&nbsp;&nbsp;</b>
                        <span class="bg-danger text-white p-1 rounded">{{ !empty($task->deadline) ? $task->deadline : 'Не установлено'}}</span>
                    </div>
                </div>
                <p>


                <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
            </div>

            @endforeach


        </div>
    </div>


    <div class="row"></div>
</div>

@endsection
