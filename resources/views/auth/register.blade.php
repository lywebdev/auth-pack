@extends('auth.layouts.layout')

@section('body')
    @foreach ($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach

    <form action="{{ route('register') }}" method="post">
        @csrf
        <input type="text" placeholder="Имя" name="name">
        <input type="text" placeholder="Email" name="email">
        <input type="password" placeholder="Пароль" name="password">
        <input type="password" placeholder="Подтвердите пароль" name="password_confirmation">
        <br><br>
        <label for="agreement">
            <input type="checkbox" name="agreement" id="agreement">
            Я согласен с политикой обработки персональных данных
        </label>
        <br><br>
        <button type="submit">Зарегистрироваться</button>
    </form>

    <hr>
    <a href="{{ route('home') }}">Главная <</a>
@endsection
