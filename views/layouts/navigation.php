<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<script src="http://code.jquery.com/jquery-2.1.4.min.js">
<![endif]-->
</head>
<body class="bigletter">
<!-- Навигация -->
<div class="navbar navbar-fixed-top">
    <div class="container-fluid">
        <!-- Кнопка отображения меню для маленьких экранов -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                <i class="fa fa-bars fa-2x"></i>
            </button>
            <a class="navbar-brand hidden-sm" href="#" id="brand">Time| |Read</a>
        </div>
        <!-- Пункты меню -->
        <div class="collapse navbar-collapse" id="responsive-menu">
            <ul class="nav navbar-nav">
                <li><a href="/home/home" class="effect">Домашняя</a></li>
                <li><a href="/quote/quotes" class="effect">Цитаты</a></li>
                <li><a href="#" class="effect">Поиск</a></li>
                <li><a href="#" class="effect">Подборки</a></li>
                <li><a href="/book/book/<?php echo rand(1,Book::getCountBooks()); ?>" class="effect">Мне повезет</a></li>
                <li><a href="#" class="effect">Обновления</a></li>
                <li><a href="#" class="effect">Популярное</a></li>
                <!-- Вызов модального окна -->
                <li><a href="#support" data-toggle="modal" class="effect">Поддержка</a></li>
                <li class="leftmargin"><a href="/user/profile"><i class="fa fa-bookmark-o fa-2x"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Модальное окно -->
<div class="modal fade" id="support">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <!-- Заголовок модального окна -->
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal"><i class="fa fa-close"></i></button>
                <h4>Поддержка</h4>
            </div>
            <!-- Поле ввода и кнопка отправить -->
            <div class="modal-body">
                <form action="/support" method="post">
                    <textarea rows="10" name="support_text" placeholder="Оставать пожелания"></textarea>
                    <br/>
                    <input type="submit" name="submit" value="Отправить" class="btn btn-success"/>
                </form>
            </div>
            <!-- Ссылки на социальные медиа -->
            <div class="modal-footer centertext">
                <span><a href="#" target="_blank">
                        <i class="fa fa-facebook-official fa-2x"></i></a></span>
                <span><a href="http://twitter.com/Time_2_Read" target="_blank">
                        <i class="fa fa-twitter fa-2x"></i></a></span>
                <span><a href="http://vk.com/time_2_read" target="_blank">
                        <i class="fa fa-vk fa-2x"></i></a></span>
                <span><a href="http://instagram.com/time2read" target="_blank">
                        <i class="fa fa-camera-retro fa-2x"></i></a></span>
                <span><a href="#" target="_blank">
                        <i class="fa fa-google-plus fa-2x"></i></a></span>
                <span><a href="skype:time_2_read">
                        <i class="fa fa-skype fa-2x"></i></a></span>
            </div>
        </div>
    </div>
</div>