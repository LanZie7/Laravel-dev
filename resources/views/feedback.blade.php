@extends('layouts.admin.main')
@section('title') Напишите нам - @parent @stop
@section('content')
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            @if (isset($flag) && $flag == 1)
                <div class="alert alert-success">Отзыв успешно отправлен!</div>
            @endif
            <div class="post-preview">
                <h1 class="mt-4">Форма обратной связи</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Оставьте свой отзыв о нашем сайте (либо пожелания по улучшению работы)</li>
                </ol>
                @if ($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                    @endforeach
                @endif
                <form action="{{ route('feedback.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Ваше имя</label>
                        <input type="text" class="form-control" placeholder="Имя" id="name" name="name" value="{{ old('name') }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="email">E-mail адрес</label>
                        <input type="text" class="form-control" placeholder="E-mail" id="email" name="email" value="{{ old('email') }}">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="message">Сообщение</label>
                        <textarea class="form-control" name="message" id="message" placeholder="Введите Ваше сообщение" cols="30" rows="10">{{ old('message') }}</textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </form>
                <br>
            </div>
        </div>
    </div>
@endsection
