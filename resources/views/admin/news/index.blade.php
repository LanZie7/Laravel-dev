@extends('layouts.admin.index')
@section('title') Список новостей - @parent @stop
@section('content')

    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Новости</h1>
            <a href="{{ route('admin.news.create') }}" class="btn btn-primary" style="float: right">Добавить новость</a>
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
                                <th>Категория</th>
                                <th>Описание</th>
                                <th>Дата добавления</th>
                                <th>Управление</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($news as $news)
                                <tr>
                                    <td>{{ $news->id }}</td>
                                    <td>{{ $news->title }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.filter', ['id' => $news->category_id]) }}">
                                            {{ $news->categoryTitle }}
                                        </a>
                                    </td>
                                    <td>{{ $news->description }}</td>
                                    <td>{{ $news->created_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.news.edit', ['news' => $news->id]) }}" style="font-size: 12px;">Edit</a> &nbsp; | &nbsp;
                                        <a href="javascript:;" class="delete" rel="{{ $news->id }}" style="font-size: 12px; color: red;">Delete</a></td>
                                </tr>
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

@push('js')
    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
            crossorigin="anonymous">
    </script>
    <script>
        $(function() {
            $(".delete").on('click', function() {
                if(confirm("Do you confirm deleting this news?")) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "DELETE",
                        url: "/admin/news/" + $(this).attr('rel'),
                        complete: function() {
                            alert("This news has been deleted.");
                            location.reload();
                        }
                    })
                }
            })
        });
    </script>
@endpush
