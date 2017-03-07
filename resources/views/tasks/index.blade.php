@extends('layouts.app')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <ol class="breadcrumb">
              <li><a href="{{ route('home') }}">Home</a></li>
              <li class="active">Tasks</li>
            </ol>
            <div class="panel panel-default list">
                <div class="panel-heading header">{{ $pname }}'s Task List</div>

                <div class="panel-body">
                    <ul class="items">
                        @foreach($tasks as $task)
                            <li id="{{ $task->id }}" class="{{ $task->done ? 'done' : '' }}">
                            <input type="checkbox" class="check" name="done" {{ $task->done ?     'checked' : '' }} >
                            <span class="item">{{ $task->task_name }}</span>
                            <form action="{{ action('TasksController@destroy', ['task' => $task->id]) }}" method="post">
                            <button type="submit" class="delete-task">&#x2718</button>
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            </form>
                            </li>
                        @endforeach
                    </ul>
                    {!! Form::open(['action' => 'TasksController@store', 'class' => 'item-add']) !!}

                        {!! Form::text('task_name', null, ['placeholder' => 'Add new task', 'id' => 'new-task', 'autocomplete' => 'off', 'class' => 'input']) !!}

                        {!! Form::submit('Add', ['class' => 'submit']) !!}

                    {!! Form::close() !!}

                    @if($errors->any())
                        <ul class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
