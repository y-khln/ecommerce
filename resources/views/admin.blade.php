<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style_admin.css">
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
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
        <a class="menu__admin head" href="#">Панель администратора</a>
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

<div>
    <button class="admin__back"><a href="/logout">Выйти из учетной записи</a></button>
{{--    <form class="admin admin__add-master" method="POST" action="{{ route('employee.save') }}">--}}
        @csrf
        <p class="admin__function">Добавление нового сотрудника</p>
        <span>Имя сотрудника</span>
        <input type="text" value="" id="name" name="name" placeholder="Введите имя" required>
        <p></p>
        <span>Фамилия сотрудника</span>
        <input type="text" value="" id="surname" name="surname" placeholder="Введите фамилию" required>
        <p></p>
        <span>Дата рождения</span>
        <input type="date" value="" id="date" name="date" required>
        <p></p>
        <span>Телефон</span>
        <input type="text" value="" id="phone" name="phone" placeholder="Введите телефон" required>
        <p></p>
        <span>Введите должность</span>
        <input type="text" value="" id="post" name="post" placeholder="Введите должность" required>
        <p></p>
        <span>Выберите категорию сотрудника</span>
        <select name="category" class="main__select" required>
            <option value="1">маникюр и педикюр</option>
            <option value="2">прически и стрижки</option>
            <option value="3">окрашивания</option>
            <option value="4">косметолог</option>
            <option value="5">массаж</option>
            <option value="6">брови</option>
            <option value="7">ресницы</option>
            <option value="8">администрация</option>
        </select>
        <p></p>
        <button class="add-master__button" type="submit" value="1" name="sendMaster">Подтвердить</button>
    </form>

    <div class="admin admin__delete-master">
        <p class="admin__function">Удаление сотрудника</p>
        <table class="admin__delete-master">
            <tr>
                <th>id мастера</th>
                <th>имя</th>
                <th>фамилия</th>
                <th>телефон</th>
                <th>должность</th>
                <th>действия</th>
            @foreach($employees as $emp)
                <tr>
                    <td>
                        {{$emp->id_employee}}
                    </td>
                    <td>
                        {{$emp->name}}
                    </td>
                    <td>
                        {{$emp->surname}}
                    </td>
                    <td>
                        {{$emp->phone}}
                    </td>
                    <td>
                        {{$emp->post}}
                    </td>
                    <td>
                        @csrf
                        <a href="{{route('employee.delete',$emp->id_employee)}}">
                            <button>Удалить</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>



    <form class="admin admin__add-service" method="POST" action="{{route('price.save')}}">
        @csrf
        <p class="admin__function">Добавление новой услуги</p>
        <span>Название услуги</span>
        <input type="text" value="" id="title_service" name="title_service" placeholder="Введите название" required>
        <p></p>
        <span>Стоимость услуги</span>
        <input type="text" value="" id="price_service" name="price_service" placeholder="Введите стоимость" required>
        <p></p>
        <span>Выберите категорию услуги</span>
        <select name="category_service" class="main__select" required>
            <option value="1">маникюр и педикюр</option>
            <option value="2">прически и стрижки</option>
            <option value="3">окрашивания</option>
            <option value="4">косметолог</option>
            <option value="5">массаж</option>
            <option value="6">брови</option>
            <option value="7">ресницы</option>
            <option value="8">администрация</option>
        </select>
        <p></p>
        <span>Выберите длительность услуги</span>
        <select name="duration_service" class="main__select" required>
            <option value="1">1 час</option>
            <option value="2">2 часа</option>
            <option value="3">3 часа</option>
            <option value="4">4 часа</option>
            <option value="5">5 часа</option>
            <option value="6">6 часов</option>
            <option value="7">7 часов</option>
        </select>
        <p></p>
        <button class="add-master__button" type="submit" value="1" name="sendService">Подтвердить</button>
    </form>

    <div class="admin admin__delete-service">
        <p class="admin__function">Удаление услуги</p>
        <table class="admin__delete-service">
            <tr>
                <th>id услуги</th>
                <th>id категории</th>
                <th>название</th>
                <th>длительность</th>
                <th>стоимость</th>
            @foreach($services as $s)
                <tr>
                    <td>
                        {{$s->id_service}}
                    </td>
                    <td>
                        {{$s->id_group}}
                    </td>
                    <td>
                        {{$s->title}}
                    </td>
                    <td>
                        {{$s->duration}}
                    </td>
                    <td>
                        {{$s->price}}
                    </td>
                    <td>
                        @csrf
                        <a href="{{route('price.delete',$s->id_service)}}">
                            <button>Удалить</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>


    <form class="admin admin__add-schedule" method="POST" action="{{route('schedule.save')}}">
        @csrf
        <p class="admin__function">Добавление расписания для мастера</p>
        <span>ID мастера</span>
        <input type="text" value="" id="id_employee_sch" name="id_employee_sch" placeholder="Введите id мастера" required>
        <p></p>
        <span>Расписание мастера</span>
        <input type="text" value="" id="time_sch" name="time_sch" placeholder="Введите расписание в формате JSON" required>
        <p></p>
        <span>Выберите дату для указанного расписания</span>
        <select name="date_sch" class="main__select">
            <option value="2023-01-10">10.01</option>
            <option value="2023-01-11">11.01</option>
            <option value="2023-01-12">12.01</option>
            <option value="2023-01-13">13.01</option>
            <option value="2023-01-14">14.01</option>
            <option value="2023-01-15">15.01</option>
            <option value="2023-01-16">16.01</option>
        </select>
        <p></p>
        <button class="add-master__button" type="submit" value="1" name="sendService">Подтвердить</button>
    </form>

    <div class="admin admin__delete-schedule">
        <p class="admin__function">Удаление расписания</p>
        <table class="admin__delete-schedule">
            <tr>
                <th>id расписания</th>
                <th>id мастера</th>
                <th>расписание</th>
                <th>дата</th>
            @foreach($schedules as $sch)
                <tr>
                    <td>
                        {{$sch->id_schedule}}
                    </td>
                    <td>
                        {{$sch->id_employee}}
                    </td>
                    <td>
                        @foreach(json_decode($sch->time,true) as $element)
                            @if($element["free"]===true)
                                {{$element["time"]}}
                            @endif
                        @endforeach

                    </td>
                    <td>
                        {{$sch->date}}
                    </td>
                    <td>
                        @csrf
                        <a href="{{route('schedule.delete',$sch->id_schedule)}}">
                            <button>Удалить</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>



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
