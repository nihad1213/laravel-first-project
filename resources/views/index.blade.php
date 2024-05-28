@extends('layouts.app')

@section('title', 'The list of Tasks')

@section('content')
    @if (count($tasks))
        @foreach ($tasks as $task)
            <div><a href="{{ route('task.show', ['id' => $task->id]) }}">{{$task->title}}</a></div>
        @endforeach
    @else
        <div>There is no task</div>
    @endif

@endsection
