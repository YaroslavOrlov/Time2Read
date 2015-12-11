<?php include(ROOT . '/views/layouts/header.php'); ?>

<link href="../../template/css/home.css" rel="stylesheet">

<?php include(ROOT . '/views/layouts/navigation.php'); ?>
<div class="marginfromnavigation">
    <div class="container centertext">

        <h3>Добро пожаловать на</h3>
        <img src="../../template/images/font.png" class="img-responsive welkome"/>
        <h4>Познай исскуство читать</h4>
        <?php if (!User::Logged()): ?>
            <a href="/user/login" class="btn btn-success mainbutton">Войти</a>
            <br/>
            <a href="/user/registration" class="btn btn-success mainbutton">Зарегестрироваться</a>
        <?php endif; ?>
    </div>
</div>
<div class="container margininstruction">
    <div class="row">
        <div class="col-md-12">
            <div id="accordion" class="panel-group">
                <div class="panel panel-defalt">
                    <div class="panel-heading">
                        <h4>
                            <a href="#collapse-1" data-parent="#accordion" data-toggle="collapse">С чего начать</a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-1">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="../../template/images/registration.png" class="img-responsive"/>
                                </div>
                                <div class="col-md-6">
                                    <p>Для того что бы почуствовать все преимущества сревиса Time2Read лучше всего
                                        зарегестрироваться, и тогда вам будут доступны такие возможности как Добавление
                                        книг в категории Читаю, Хочу прочитать, Читал, Ставить лайк цитатам, которые вам
                                        понравились, Ставить оценки и конечно Писать рецензии. Просто заполните
                                        несколько полей для ввода, и нажмите на кнопку Зарегестрироваться. Попасть на
                                        форму регистрации можно с Домашней страницы, и нажав на иконку закладки.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-defalt">
                    <div class="panel-heading">
                        <h4>
                            <a href="#collapse-2" data-parent="#accordion" data-toggle="collapse">Цитаты</a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-2">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="../../template/images/citat.png" class="img-responsive"/>
                                </div>
                                <div class="col-md-6">
                                    <p>Для того что бы добавить цитату к себе в колекцию, достаточно всего раз нажать на
                                        сердце в провом нижнем углу. Нажав на сердце еще раз, цитата будет удалена из
                                        вашей колекции, так же это можно сделать непосредственно со своей страницы.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-defalt">
                    <div class="panel-heading">
                        <h4>
                            <a href="#collapse-3" data-parent="#accordion" data-toggle="collapse">Книги</a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-3">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="../../template/images./books.png" class="img-responsive"/>
                                </div>
                                <div class="col-md-6">
                                    <p>Ставьте книгам оценки, смотрите общий рейтинг книги, на сколь оценивают эту книгу
                                        другие пользователи. Добавляйте книгу в один из списков к себе на страницу.
                                        Наипиши о своих впечатлениях от прочитаного, иу знай что думают об этой книге
                                        другие. Подбери себе еще пару книг из списка похожих.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-defalt">
                    <div class="panel-heading">
                        <h4>
                            <a href="#collapse-4" data-parent="#accordion" data-toggle="collapse">Поиск</a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-4">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="../../template/images/search.png" class="img-responsive"/>
                                </div>
                                <div class="col-md-6">
                                    <p>Найдите все книги автора, или же просто книгу которую вам посоветовали знакомые,
                                        для этого введите название книги или имя автора, и вы получите резуьльтат,
                                        удовлетворяющий ваши запросы. Не переходя на другие страницы во можете постаить
                                        оценки и добавить книгу в соответствующий список.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-defalt">
                    <div class="panel-heading">
                        <h4>
                            <a href="#collapse-5" data-parent="#accordion" data-toggle="collapse">Поддержка</a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-5">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="../../template/images/support.png" class="img-responsive"/>
                                </div>
                                <div class="col-md-6">
                                    <p>Если у вас есть жалобы или предложения, напишите в поддержку, и администрация
                                        свяжеться с вами. Так же вы можете посетить наши группы в различных социальных
                                        сетях, или связаться с агентом поддержки средствами скайпа.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-defalt">
                    <div class="panel-heading">
                        <h4>
                            <a href="#collapse-6" data-parent="#accordion" data-toggle="collapse">Восстановление
                                пароля</a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-6">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="../../template/images/wrongparol.png" class="img-responsive"/>
                                </div>
                                <div class="col-md-6">
                                    <p>Если вы забыли пароль, на форме автоизации перейдите по ссылке Забыли пароль, и в
                                        скором времени эта проблема будет решена.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-defalt">
                    <div class="panel-heading">
                        <h4>
                            <a href="#collapse-7" data-parent="#accordion" data-toggle="collapse">Персональная
                                страница</a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-7">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="../../template/images/delcitat.png" class="img-responsive"/>
                                </div>
                                <div class="col-md-6">
                                    <p>У каждого пользователя есть своя персональная страница на которой он может
                                        посмотреть результат своего взаимодейтсвия с сервисом. Это оценки и рецензии
                                        которые пользователь поставил и написал соответственно, книги которые
                                        пользователь Прочитал, Читает и Хочет прочитать. Цитаты, которым пользовател
                                        поставил лайк, отображаються в специальной клдаке у него на странице, где их так
                                        же можно удалить нажав на крестик.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-defalt">
                    <div class="panel-heading">
                        <h4>
                            <a href="#collapse-8" data-parent="#accordion" data-toggle="collapse">Списки</a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-8">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="../../template/images/books.png" class="img-responsive"/>
                                </div>
                                <div class="col-md-6">
                                    <p>В списках храяться книги которые автор Читает, Читал или Хочет прочитать.
                                        Добавить в эти списки книги можно со страници поиска или непосредственно со
                                        страницы книги. Убрать книгу из списка можно нажав на кнопку По умолчанию. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-defalt">
                    <div class="panel-heading">
                        <h4>
                            <a href="#collapse-9" data-parent="#accordion" data-toggle="collapse">Оценки и рецензи</a>
                        </h4>
                    </div>
                    <div class="panel-collapse collapse" id="collapse-9">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="../../template/images/marks.png" class="img-responsive"/>
                                </div>
                                <div class="col-md-6">
                                    <p>Каждый зарегестрированый пользователь может ставить оценки и писать к книгам
                                        рецензии, рецензия должна состоять не менее чем изи 500 символов. Каждый
                                        пользователь может писать всего одну рецензию к книге. По ходу работы с
                                        сервисом, пользователь достигает определенного статуса, всего статусов 5.
                                        Зависит этот статус от Достижений.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include(ROOT . '/views/layouts/footer.php'); ?>
