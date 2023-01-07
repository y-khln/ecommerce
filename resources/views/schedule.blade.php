<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style_form.css">
</head>
<body>
<div class="head">
    <!-- шапка верхняя -->
    <div class="head__menu menu">
        <a class="menu__about head" href="/about">О нас</a>
        <a class="menu__command head" href="/command">Наша команда</a>
        <a class="menu__price head" href="/price">Цены</a>
        <a class="menu__contacts head" href="/contacts">Контакты</a>
        <a class="menu__schedule head" href="#">Записаться</a>
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


<div class="main">
    <p class="main__title">Здесь вы можете записаться к мастерам студии Saxar</p>
</div>

<div class="schedule">
    <span id="span_service">Выберите услугу, которую хотели бы получить</span>
    <p></p>
    <form class="service__mini" action="{{route('afterschedule')}}" method="post">
        @csrf
        @foreach($services as $service)
            <div class="ser">
                <input type="radio" name="id_service" value="{{$service->id_service}}">
                <span>{{$service->title}}</span>
                <p></p>
            </div>
        @endforeach
        <input type="text" value="{{$date}}" hidden name="date">
        <input type="submit" value="Отправить" class="param">
    </form>
</div>


<footer>
    <div class="footer__contact">
        <p class="footer__phone footer__text">+7 (495) 724 38 51
            <br class="footer__text">Заказать звонок</br>
        </p>
        <p class="footer__center footer__text">Cалон в центре Москве
            <br class="footer__text">Работаем без выходных с 10:00 до 19:00</br>
        </p>
    </div>
</footer>

<script src="/js/jquery-3.6.2.min.js"></script>

</body>
</html>
