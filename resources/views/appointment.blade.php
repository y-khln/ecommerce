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
        <a class="menu__schedule head" href="/#">Записаться</a>
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

<h1>Запись на процедуру</h1>
<div class="form__wrap">
    <form action="filling" method="post">
        @csrf
        <input class="form__input" placeholder="Имя" type="text" name="name">
        <input class="form__input" placeholder="Телефон" type="text" name="phone_number">
        <span>Выберите раздел услуг</span>
        <select name="category" class="main__select">
            <option value="1">маникюр и педикюр</option>
            <option value="2">прически и стрижки</option>
            <option value="3">окрашивания</option>
            <option value="4">косметолог</option>
            <option value="5">массаж</option>
            <option value="6">брови</option>
            <option value="7">ресницы</option>
        </select>
        <p></p>
        <span id="span_service">Выберите услугу, которую хотели бы получить</span>
        <select name="service" class="main__select">
            @foreach($services as $service)
                <option>{{$service}}</option>
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
        <button type="submit" class="form__btn">Записаться</button>
    </form>
    <p class="form__after">После отправки формы с Вами свяжется оператор для подтверждения записи. Спасибо, что выбрали нас!</p>
</div>

<div class="schedule">
    @if($result!='')
        @foreach($result as $res)
            <p class="schedule__master">Мастер: {{$res->name}} {{$res->surname}}</p>
            @if($res->time_10_00==1)
                <button>10.00</button>
            @endif
            @if($res->time_11_00==1)
                <button>11.00</button>
            @endif
            @if($res->time_12_00==1)
                <button>12.00</button>
            @endif
            @if($res->time_13_00==1)
                <button>13.00</button>
            @endif
            @if($res->time_14_00==1)
                <button>14.00</button>
            @endif
            @if($res->time_15_00==1)
                <button>15.00</button>
            @endif
            @if($res->time_16_00==1)
                <button>16.00</button>
            @endif
            @if($res->time_17_00==1)
                <button>17.00</button>
            @endif
            @if($res->time_18_00==1)
                <button>18.00</button>
            @endif
        @endforeach
    @endif
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
