@extends('auth.layouts.layout')

@section('body')
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach

    <form action="{{ route('login') }}" method="post">
        @csrf
        <input type="text" placeholder="Имя" name="name">
        <input type="password" placeholder="Пароль" name="password">
        <button type="submit">Войти</button>
    </form>

    <hr>
    <a href="{{ route('home') }}">Главная <</a>
@endsection
