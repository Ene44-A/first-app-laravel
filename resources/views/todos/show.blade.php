@extends('app')

@section('container')
<div class="container w-25 border p-4 mt-4">
    <form action="{{ route('todos-update', [$todo->id]) }}" method="POST">
    @method('PATCH')
    @csrf

        @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif

        @error('title')
        <h6 class="alert alert-danger">{{ $message }}</h6>
        @enderror
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titulo de tarea</label>
            <input type="text" class="form-control" name="title" value="{{ $todo->title }}">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Texto de la tarea</label>
            <input type="text" class="form-control" name="textTodo" value="{{ $todo->textTodo }}">
        </div>
        <button type="submit" class="btn btn-primary">Actualizar Tarea</button>
    </form>

</div>
@endsection