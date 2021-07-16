@extends('layouts/admin/index')
@section('title') Добавить категорию - @parent @stop
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Добавить категорию</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Добавить новую категорию</li>
            </ol>
            @if ($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
            @endif

            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Название категории</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div>
                <br>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </form>
            <br>
        </div>
    </main>
@endsection
