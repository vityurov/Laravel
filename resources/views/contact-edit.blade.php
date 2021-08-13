@extends('layouts.app')

@section('title')Изменение контакта@endsection

@section('content')
    <h1>Изменение контакта</h1>

    <form action="{{ route('contact-form-edit', $data->id) }}" method="post">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Введите имя</label>
            <input type="text" name="name" value="{{ $data->name }}" placeholder="Введите имя" id="name" class="form-control">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" value="{{ $data->email }}" placeholder="Введите email" id="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Тема сообщения</label>
            <input type="text" name="subject" value="{{ $data->subject }}" placeholder="Тема сообщения" id="subject" class="form-control">
        </div>

        <div class="mb-3">
            <label for="message" class="form-label">Сообщение</label>
            <textarea name="message" id="message" class="form-control" placeholder="Введите сообщение">{{ $data->message }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Редактировать</button>
    </form>
@endsection
