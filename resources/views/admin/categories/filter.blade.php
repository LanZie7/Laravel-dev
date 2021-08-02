@extends('layouts/admin/index')
@section('title') Список новостей ({{ $category->name }}) - @parent @stop
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Все новости из категории "{{ $category->name }}"</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Список новостей</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Список новостей
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
                        @forelse ($news as $newsItem)
                            @if ($newsItem->category_id == $id)
                                <tr>
                                    <td>{{ $newsItem->id }}</td>
                                    <td>{{ $newsItem->name }}</td>
                                    <td>{{ $newsItem->description }}</td>
                                    <td>{{ $newsItem->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.news.edit', ['news' => $newsItem->id]) }}" style="font-size: 12px;">Edit</a> &nbsp; | &nbsp;
                                        <a href="javascript:;" style="font-size: 12px; color: red;">Delete</a></td>
                                </tr>
                            @endif
                        @empty
                            <tr>
                                <td colspan="5">Новостей не найдено</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

@endsection
