<?php include(ROOT . '/views/layouts/header.php'); ?>

    <link href="../../template/css/user.css" rel="stylesheet">
    <link href="../../template/css/salvattore.css" rel="stylesheet">

<?php include(ROOT . '/views/layouts/navigation.php'); ?>

    <div class="marginfromnavigation">
        <br/>
        <!-- Меню для больших экранов -->
        <div class="container hidden-sm hidden-xs visible-md visible-lg">
            <div class="row">
                <div class="col-md-2 col-lg-2"><img alt="Ваш аватар" src="../../template/images/<?php echo $login[2]; ?>"
                                                    class="avatar"/>
                </div>
                <div class="col-md-10 col-lg-10 margininfotop">
                    <div class="row">
                        <div class="col-md-2 col-lg-2 margininfobottom">
                            <h2><?php echo $login[0]; ?></h2>
                        </div>
                        <div class="col-md-7 col-lg-6 textalignright">
                            <h4>
                                <span>Прочитал
                                    <?php if (isset($countRead)): ?>
                                        <?php echo $countRead[0]; ?>
                                    <? endif; ?>
                                    |</span> <span>Уровень Джедай |</span>
                                <span> Написал рецензий
                                    <?php if (isset($countReview)): ?>
                                        <?php echo $countReview[0]; ?>
                                    <? endif; ?>
                                </span>
                            </h4>
                        </div>
                        <div class="col-md-3 col-lg-4">
                            <a href="/user/edit" class="btn btn-success buttonmargin">Редактировать</a>
                            <a href="/user/logout" class="btn btn-success buttonmargin buttonwidth">Выйти</a>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <ul class="nav nav-pills">
                                <li class="active"><a href="#user_marks" data-toggle="tab">Оценки и рецензии</a></li>
                                <li><a href="#user_citatum" data-toggle="tab">Цитаты</a></li>
                                <li><a href="#user_reccomendation" data-toggle="tab">Рекомендации</a></li>
                                <li><a href="#user_achivments" data-toggle="tab">Достижения</a></li>
                                <li><a href="#user_read" data-toggle="tab">Читаю</a></li>
                                <li><a href="#user_readed" data-toggle="tab">Прочитал</a></li>
                                <li><a href="#user_wantRead" data-toggle="tab">Хочу прочитать</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Меню для средних экранов -->
        <div class="container-fluid hidden-xs visible-sm hidden-md hidden-lg">
            <div class="row margininfobottom">
                <div class="col-sm-2">
                    <img alt="Ваш аватар" src="../../template/images/avatar.jpg" class="avatar"/>
                </div>
                <div class="col-sm-10 paddinginfotop">
                    <div class="row">
                        <div class="col-sm-3 textalignright">
                            <h2><?php echo $login[0]; ?></h2>
                        </div>
                        <div class="col-sm-9 textalignright">
                            <h4>
                                <span>Прочитал
                                    <?php if (isset($countRead)): ?>
                                        <?php echo $countRead[0]; ?>
                                    <? endif; ?>
                                    |</span>
                                <span>Уровень Джедай |</span>
                                <span> Написал рецензий
                                    <?php if (isset($countReview)): ?>
                                        <?php echo $countReview[0]; ?>
                                    <? endif; ?></span>
                            </h4>
                        </div>
                        <div class="col-sm-12 paddingbutton textalignright">
                            <a href="/user/edit"  class="btn btn-success buttonmargin">Редактировать</a>
                            <a href="/user/logout"
                               class="btn btn-success buttonmargin buttonwidth buttonheigth">Выйти</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Меню для маленьких экранов -->
        <div class="container hidden-sm visible-xs hidden-md hidden-lg">
            <div class="row  margininfobottom centertext">
                <div class="col-xs-12">
                    <p><img alt="Ваш аватар" src="../../template/images/avatar.jpg" class="avatar"/></p>
                </div>
                <div class="col-xs-12 ">
                    <h2><?php echo $login[0]; ?></h2></div>
                <div class="col-xs-12 ">
                    <h4>Прочитал
                        <?php if (isset($countRead)): ?>
                            <?php echo $countRead[0]; ?>
                        <? endif; ?>
                    </h4>
                </div>
                <div class="col-xs-12">
                    <h4>Уровень Джедай</h4></div>
                <div class="col-xs-12">
                    <h4> Написал рецензий
                        <?php if (isset($countReview)): ?>
                            <?php echo $countReview[0]; ?>
                        <? endif; ?>
                    </h4></div>
                <div class="col-xs-12">
                    <a href="/user/edit"  class="btn btn-success buttonmargin">Редактировать</a>
                    <a href="/user/logout" class="btn btn-success buttonmargin buttonwidth buttonheigth">Выйти</a>
                </div>
            </div>
        </div>
        <div class="container-fluid visible-sm visible-xs hidden-md hidden-lg">
            <div class="row">
                <div class="col-xs-12 col-sm-12">
                    <ul class="nav nav-pills nav-justified">
                        <li class="active"><a href="#user_marks" data-toggle="tab">Оценки и рецензии</a></li>
                        <li><a href="#user_citatum" data-toggle="tab">Цитаты</a></li>
                        <li><a href="#user_reccomendation" data-toggle="tab">Рекомендации</a></li>
                        <li><a href="#user_achivments" data-toggle="tab">Достижения</a></li>
                        <li><a href="#user_read" data-toggle="tab">Читаю</a></li>
                        <li><a href="#user_readed" data-toggle="tab">Прочитал</a></li>
                        <li><a href="#user_wantRead" data-toggle="tab">Хочу прочитать</a></li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- Содержание страницы -->
        <div class="container">
            <hr/>
            <div class="tab-content">
                <!-- Оценки и рецензии -->
                <div class="tab-pane fade in active" id="user_marks">

                    <?php if (isset($reviews)): ?>
                        <?php foreach ($reviews as $row): ?>
                            <div class="margininfotop">
                                <div class="row margininfobottom">
                                    <div class="col-md-6">
                                        <h3><?php echo $row[0]; ?></h3>
                                    </div>
                                    <div class="col-md-6 centertext">
                                        <?php if (isset($row[2])): ?>
                                            <?php for ($i = 0; $i < $row[2]; $i++): ?>
                                                <i class="fa fa-star fa-2x"
                                                   data-mark="<?php echo $i + 1; ?>"></i>
                                            <?php endfor; ?>
                                            <?php for ($i = $row[2]; $i < 5; $i++): ?>
                                                <i class="fa fa-star-o fa-2x"
                                                   data-mark="<?php echo $i + 1; ?>"></i>
                                            <?php endfor; ?>
                                        <?php else: ?>
                                            <i class="fa fa-star-o fa-2x" data-mark="1"></i>
                                            <i class="fa fa-star-o fa-2x" data-mark="2"></i>
                                            <i class="fa fa-star-o fa-2x" data-mark="3"></i>
                                            <i class="fa fa-star-o fa-2x" data-mark="4"></i>
                                            <i class="fa fa-star-o fa-2x" data-mark="5"></i>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 centered">
                                        <?php if (!empty($row[1])): ?>
                                            <p><?php echo $row[1]; ?></p>

                                            <div class="col-md-12 textalignright">
                                                <a href="#">
                                                    <button class="btn btn-success">Редактировать</button>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                </div>
                <!-- Цитаты -->
                <div class="tab-pane fade" id="user_citatum">
                    <?php if (isset($quotes)): ?>
                        <ul>
                            <?php foreach ($quotes as $quote): ?>
                                <li>
                                    <div class="row">
                                        <div class="col-md-10 col-xs-10">
                                            <h4><?php echo $quote[1]; ?></h4>
                                            <h5><?php echo $quote[2]; ?></h5>
                                        </div>
                                        <div
                                            class="col-md-1 col-xs-1 margininfotop textalignright">
                                            <a data-quote="<?php echo $quote[0]; ?>" href="#" class="fa fa-close"></a>
                                        </div>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <!-- Реккомендованые для пользователя -->
                <div class="tab-pane fade" id="user_reccomendation">
                    <div class="row masonry" data-columns>
                        <div class="item">
                            <div class="thumbnail">
                                <img alt="Обложка книги" src="http://placehold.it/320x450" class="img-responsive"/>

                                <div class="caption">
                                    <h4><a href="#">Название книги</a></h4>
                                    <h5><a href="#">Автор книги</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Достижения -->
                <div class="tab-pane fade" id="user_achivments"></div>
                <!-- Читает -->
                <div class="tab-pane fade" id="user_read">
                    <div class="row masonry" data-columns>
                        <?php if (isset($reading)): ?>
                            <?php foreach ($reading as $book): ?>
                                <div class="item">
                                    <div class="thumbnail">
                                        <img alt="Обложка книги"
                                             src="../../template/images/books/<?php echo $book[4]; ?>"
                                             class="img-responsive"/>

                                        <div class="caption">
                                            <h4><a href="/book/book/<?php echo $book[0]; ?>"><?php echo $book[1]; ?></a>
                                            </h4>
                                            <h5>
                                                <a href="/author/author/<?php echo $book[3]; ?>"><?php echo $book[2]; ?></a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Прочитал -->
                <div class="tab-pane fade" id="user_readed">
                    <div class="row masonry" data-columns>
                        <?php if (isset($alreadyread)): ?>
                            <?php foreach ($alreadyread as $book): ?>
                                <div class="item">
                                    <div class="thumbnail">
                                        <img alt="Обложка книги"
                                             src="../../template/images/books/<?php echo $book[4]; ?>"
                                             class="img-responsive"/>

                                        <div class="caption">
                                            <h4><a href="/book/book/<?php echo $book[0]; ?>"><?php echo $book[1]; ?></a>
                                            </h4>
                                            <h5>
                                                <a href="/author/author/<?php echo $book[3]; ?>"><?php echo $book[2]; ?></a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- Хочет прочитать -->
                <div class="tab-pane fade" id="user_wantRead">
                    <div class="row masonry" data-columns>
                        <?php if (isset($wantread)): ?>
                            <?php foreach ($wantread as $book): ?>
                                <div class="item">
                                    <div class="thumbnail">
                                        <img alt="Обложка книги"
                                             src="../../template/images/books/<?php echo $book[4]; ?>"
                                             class="img-responsive"/>

                                        <div class="caption">
                                            <h4><a href="/book/book/<?php echo $book[0]; ?>"><?php echo $book[1]; ?></a>
                                            </h4>
                                            <h5>
                                                <a href="/author/author/<?php echo $book[3]; ?>"><?php echo $book[2]; ?></a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../../template/js/salvattore.min.js"></script>
    <script src="../../template/js/deleteAjaxQuote.js"></script>

<?php include(ROOT . '/views/layouts/footer.php'); ?>