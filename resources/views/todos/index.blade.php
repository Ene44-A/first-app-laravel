@extends('app')

@section('container')
<div class="container w-25 border p-4 mt-4">
    <form>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titulo de tarea</label>
            <input type="text" class="form-control" name="title">
        </div>
        <button type="submit" class="btn btn-primary">Crear Tarea</button>
    </form>
</div>
@endsection