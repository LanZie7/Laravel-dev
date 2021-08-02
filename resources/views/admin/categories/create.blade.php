@extends('layouts.admin.index')
@section('title') Добавить категорию - @parent @stop
@section('content')

<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Добавить категорию</h1>

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Добавить новую категорию</li>
        </ol>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
        @endif

        <div>
            <form method="post" action="{{ route('admin.categories.store')  }}">
                @csrf
                <div class="form-group">
                    <label for="name">Заголовок</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                </div>
                <br>

                <div class="form-group">
                    <label for="status">Цвет</label>
                    <input type="text" class="form-control" id="color" name="color" value="{{ old('color') }}">
                </div>
                <br>

                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea class="form-control" id="description" name="description">{!! old('description') !!}</textarea>
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Сохранить</button>
                <br>
            </form>
            <br>
        </div>
    </div>
</main>
@endsection
