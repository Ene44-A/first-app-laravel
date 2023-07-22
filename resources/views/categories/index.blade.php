@extends('app')

@section('container')
<div class="container w-25 border p-4 my-4">
    <div class="row mx-auto">
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            @if (session('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>
            @endif

            @error('name')
            <h6 class="alert alert-danger">{{ $message }}</h6>
            @enderror
            <div class="mb-3">
                <label for="name" class="form-label">Titulo de categoria</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color de categoria</label>
                <input type="color" class="form-control" name="color">
            </div>
            <button type="submit" class="btn btn-primary">Crear Categoria</button>
        </form>
    </div>
</div>

@endsection