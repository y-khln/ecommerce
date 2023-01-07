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
    <form class="appointment" action="{{route('schedule.get')}}" method="post">
        @csrf
        <span>Выберите раздел услуг</span>
        <select name="category" class="main__select">
            @foreach($services as $service)
                <option value="{{$service->id_group}}">{{$service->title}}</option>
            @endforeach
        </select>
        <p></p>
        <span>Выберите подходящую для записи дату</span>
        <select name="date" class="main__select">
            <option value="2022-12-05">5.12</option>
            <option value="2022-12-06">6.12</option>
            <option value="2022-12-07">7.12</option>
            <option value="2022-12-08">8.12</option>
        </select>
        <p></p>
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
