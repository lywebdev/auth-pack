@extends('auth.layouts.layout')

@section('body')

    <h1>Подтвердите email</h1>

    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            <p>Ссылка отправлена ещё раз.</p>
        </div>
    @endif

    <form action="{{ route('verification.resend') }}" method="post">
        @csrf
        <button>Отправить повторно</button>
    </form>

    <hr>
    <a href="{{ route('home') }}">Главная <</a>
@endsection
