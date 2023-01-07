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

<div class="schedule">
    @foreach($schedules as $res)
        @if($res->time!=null)
            <p class="schedule__master">Мастер: {{$res->employee->name}} {{$res->employee->surname}}</p>
            <div class="times">
                @foreach($res->time as $time)
                    <button onclick="
                        document.querySelector('#employee_id_input').value = {{$res->id_employee}};
                        document.querySelector('#time_input').value = '{{$time["time"]}}';
                        " class="time" id="button_time">{{$time["time"]}}</button>
                @endforeach
            </div>
        @endif
    @endforeach
</div>


{{--<div class="schedule">--}}
{{--    --}}{{--    {{$new=array()}}--}}
{{--    @foreach($schedules as $res)--}}
{{--        @if($res->time!=null)--}}
{{--            <p class="schedule__master">Мастер: {{$res->employee->name}} {{$res->employee->surname}}</p>--}}
{{--            <div class="times">--}}
{{--                @foreach(json_decode($res->time) as $time)--}}
{{--                    --}}{{--                в ифе указывать просчет--}}
{{--                    @if($time->free==true)--}}
{{--                        <button onclick="--}}
{{--                        document.querySelector('#employee_id_input').value = {{$res->id_employee}};--}}
{{--                        document.querySelector('#time_input').value = '{{$time->time}}';--}}
{{--                        " class="time" id="button_time">{{$time->time}}</button>--}}
{{--                        --}}{{--                    {{array_push($new,$time->time)}}--}}
{{--                        --}}{{--                    {{print_r($new)}}--}}
{{--                    @endif--}}
{{--                @endforeach--}}

{{--            </div>--}}
{{--        @endif--}}
{{--    @endforeach--}}
{{--</div>--}}


<div class="finish">

    <form action="filling" method="post">
        @csrf
        <input class="form__input" placeholder="Имя" type="text" name="user_name">
        <input class="form__input" placeholder="Телефон" type="text" name="phone_number">
        <input id="employee_id_input" type="hidden" name="id_employee">
        <input id="time_input" type="hidden" name="time">
        <input id="time_input" type="hidden" name="date" value="{{$date}}">
        <button type="submit" class="form__btn">Записаться</button>
    </form>
    <p class="form__after">После отправки формы с Вами свяжется оператор для подтверждения записи. Спасибо, что выбрали
        нас!</p>
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
