<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style_price.css">
</head>
<body>
<div class="head">
    <!-- шапка верхняя -->
    <div class="head__menu menu">
        <a class="menu__about head" href="/about">О нас</a>
        <a class="menu__command head" href="/command">Наша команда</a>
        <a class="menu__price head" href="#">Цены</a>
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



<div class="price">
    <p class="price__title">Цены на наши услуги</p>
    <table class="price__elem">
        <tr>
{{--            <th>id услуги</th>--}}
{{--            <th>id группы услуг</th>--}}
            <th>наименование услуги</th>
            <th>длительность (ч)</th>
            <th>цена (руб)</th>
            @foreach($prices as $price)
                <tr>
{{--                    <th>--}}
{{--                        {{$price->id_service}}--}}
{{--                    </th>--}}
{{--                    <th>--}}
{{--                        {{$price->id_group}}--}}
{{--                    </th>--}}
                    <td>
                        {{$price->title}}
                    </td>
                    <th>
                        {{$price->duration}}
                    </th>
                    <th>
                        {{$price->price}}
                    </th>
                </tr>
            @endforeach
    </table>
</div>



</body>
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
