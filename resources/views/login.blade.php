<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="../css/style_auth.css">
</head>
<body>
<div class="head">
    <!-- шапка верхняя -->
    <div class="head__menu menu">
        <a class="menu__about head" href="/about">О нас</a>
        <a class="menu__command head" href="/command">Наша команда</a>
        <a class="menu__price head" href="/price">Цены</a>
        <a class="menu__contacts head" href="/contacts">Контакты</a>
        <a class="menu__schedule head" href="/schedule">Записаться</a>
        <a class="menu__admin head" href="/admin">Панель администратора</a>
    </div>
    <!-- шапка нижняя -->
    <div class="head__mainInfo">
        <p class="head__logo"><a href="/">Saxap</a></p>
        <p class="head__schedule head__text">Салон в центре Москвы, работаем без выходных с 10:00 до 19:00</p>
        <p class="head__contacts head__text">+7 (495) 724 38 51
            <br class="head__call head__text">Заказать звонок</br>
        </p>
    </div>
</div>
<p class="enter">Войти в систему</p>
<form class="auth_form" method="POST" action="{{ route('user.login') }}">
    @csrf
    <div class="form_group">
        <label for="login" class="label__data">Логин</label>
        <input type="text" value="" id="login" name="login" placeholder="Введите ваш логин">
        @error('login')
        <div class="message">{{$message}}</div>
        @enderror
    </div>
    <div class="form_group">
        <label for="password" class="label__data">Пароль</label>
        <input type="password" value="" id="password" name="password" placeholder="Введите ваш пароль">
        @error('password')
        <div class="message">{{$message}}</div>
        @enderror
    </div>
    <div class="form_group">
        <button class="form__button" type="submit" value="1" name="sendAuth">Войти</button>
    </div>

</form>

<div class="new">
    <p class="new__title">Вы наш новый сотрудник?</p>
    <button class="new__registrate"><a href="/registration">Зарегистрироваться</a></button>
</div>


