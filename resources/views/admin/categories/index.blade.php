@extends('layouts/admin/index')
@section('title') Список категорий - @parent @stop
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Категории</h1>
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary" style="float: right">Добавить категорию</a>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Список категорий</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Список категорий
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Заголовок</th>
                            <th>Описание</th>
                            <th>Дата добавления</th>
                            <th>Управление</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($categoryList as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.filter', ['id' => $loop->iteration]) }}">
                                        {{ $category->title }}
                                    </a>
                                </td>
                                <td>{{ $category->description }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}" style="font-size: 12px;">Ред.</a> &nbsp; | &nbsp;
                                    <a href="javascript:;" style="font-size: 12px; color: red;">Уд.</a></td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">Категорий не найдено</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection
