<?php include(ROOT . '/views/layouts/header.php'); ?>

<link href="../../template/css/book.css" rel="stylesheet">
<link href="../../template/css/salvattore.css" rel="stylesheet">

<?php include(ROOT . '/views/layouts/navigation.php'); ?>

<!-- Страница книги -->
<div class="container marginfromnavigation">
    <?php if (isset($book)): ?>
        <div class="row">
            <div class="col-md-12">
                <br/>
                <?php foreach ($book as $data): ?>
                    <!-- Вкладки -->
                    <div class="tabs" data-id="<?php echo $data[1]; ?>">
                        <ul class="nav nav-pills nav-justified">
                            <li class="active"><a href="#main" data-toggle="tab">Основное</a></li>
                            <li><a href="#reviews" data-toggle="tab">Рецензии</a></li>
                            <li><a href="#similar" data-toggle="tab">Похожие</a></li>
                        </ul>
                        <br/>
                        <!-- Контент -->
                        <div class="tab-content">
                            <!-- Основное -->
                            <div class="tab-pane fade in active" id="main">
                                <div class="row">
                                    <div class="col-md-4 col-sm-6 littlemargin">
                                        <img src="../../template/images/books/<?php echo $data[7]; ?>"
                                             class="img-responsive"/>
                                        <br/>
                                        <?php if (isset($marks[0][1])): ?>
                                            <?php foreach ($marks as $mark): ?>
                                                <h4><span>Средняя оценка</span>
                                                <span
                                                    id="avg-mark"><?php echo round(($mark[1] / $mark[0]), 2); ?></span>
                                                    <span>Оценили</span>
                                                    <span id="mark"><?php echo $mark[0]; ?></span></h4>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <h4><span>Средняя оценка</span>
                                                <span>0</span>
                                                <span>Оценили</span>
                                                <span>0</span></h4>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-5 col-sm-6">
                                        <h1><?php echo $data[3]; ?></h1>

                                        <h2><a href="/author/author/<?php echo $data[2]; ?>"><?php echo $data[0]; ?></a>
                                        </h2>

                                        <h3>Заказать</h3>
                                        <a href="<?php echo $data[5]; ?>" target="_blank">litres.com/triupharka</a>

                                        <h3>Аудиокнига</h3>
                                        <a href="<?php echo $data[6]; ?>" target="_blank">litres.com/triupharka</a>

                                        <p>
                                            <?php echo $data[4]; ?>
                                        </p>
                                    </div>
                                    <!-- Допустимые действия -->
                                    <div class="col-md-3">
                                        <!-- Состояния -->
                                        <button class="btn btn-success btn-block
                                        <?php if (User::Logged()): ?>
                                            already-read
                                        <?php endif; ?>"
                                            <?php if (Book::isInList($data[1], 1)): ?>
                                                disabled
                                            <?php endif; ?>>Прочитал
                                        </button>
                                        <button class="btn btn-success btn-block
                                        <?php if (User::Logged()): ?>
                                            reading
                                        <?php endif; ?>"
                                            <?php if (Book::isInList($data[1], 2)): ?>
                                                disabled
                                            <?php endif; ?>>Читаю
                                        </button>
                                        <button class="btn btn-success btn-block
                                         <?php if (User::Logged()): ?>
                                            want-read
                                        <?php endif; ?>"
                                            <?php if (Book::isInList($data[1], 3)): ?>
                                                disabled
                                            <?php endif; ?>>Хочу прочитать
                                        </button>
                                        <button class="btn btn-success btn-block
                                        <?php if (User::Logged()): ?>
                                            remove-user-books
                                        <?php endif; ?>">По умолчанию
                                        </button>
                                        <div class="marginformtop">
                                            <form method="post" action="/book/similar">
                                                <input type="hidden" name="idBook" value="<?php echo $data[1]; ?>">
                                                <button class="btn btn-primary btn-block">Рекомендовать похожее</button>
                                            </form>
                                        </div>
                                        <!-- Выставление оценки -->
                                        <br/>
                                        <br/>

                                        <div class="centertext markable">
                                            <?php if (isset($bookmark)): ?>
                                                <?php for ($i = 0; $i < $bookmark[2]; $i++): ?>
                                                    <i class="fa fa-star fa-2x"
                                                       data-mark="<?php echo $i + 1; ?>"></i>
                                                <?php endfor; ?>
                                                <?php for ($i = $bookmark[2]; $i < 5; $i++): ?>
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
                                </div>
                            </div>
                            <!-- Рецензии -->
                            <div class="tab-pane fade" id="reviews">
                                <form method="post" action="/book/AddReview">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-1 hidden-xs"></div>
                                        <div class="col-md-6 col-sm-10 col-xs-12">
                                            <div class="row">
                                                <input name="bookId" value="<?php echo $data[1]; ?>" type="hidden"/>

                                                <div class="col-md-8 col-sm-6 col-xs-6">
                                                    <input name="header" type="text" class="littlemargin form-control"
                                                           id="headercom"
                                                           placeholder="Заголовок"/>
                                                </div>
                                                <div class="col-md-2 col-sm-3 col-xs-3 textalignright">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="rating" value="2"/>
                                                        <i class="fa fa-thumbs-o-down fa-2x"></i>
                                                    </label>
                                                </div>
                                                <div class="col-md-2 col-sm-3 col-xs-3">
                                                    <label class="radio-inline">
                                                        <input type="radio" name="rating" value="1" checked/>
                                                        <i class="fa fa-thumbs-o-up fa-2x"></i>
                                                    </label>
                                                </div>
                                            </div>
                                            <textarea class="form-control littlemargin" rows="12" id="comment"
                                                      name="userreviews"
                                                      placeholder="Напишите свои впечатления о книге"></textarea>

                                            <p class="reviewnote">Количество введенных символов
                                                должно быть от 500 до 1000</p>

                                            <button name="submit" type="submit" class="btn btn-success btn-block">
                                                Добавить
                                            </button>
                                        </div>
                                        <div class="col-md-3 col-sm-1 hidden-xs"></div>
                                    </div>
                                </form>
                                <hr/>
                                <div class="littlemargin">
                                    <?php if (isset($bookreviews)): ?>
                                        <?php foreach ($bookreviews as $review): ?>
                                            <div class="row">
                                                <div class="col-md-2 hidden-sm hidden-xs"></div>
                                                <div class="col-md-8 col-sm-12 col-xs-12 backgorundclass">
                                                    <div class="tinybookmargin">
                                                        <h4><?php echo $review[0]; ?></h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-8 col-sm-8 col-xs-10 tinybookmargin">
                                                            <h3><?php echo $review[1]; ?></h3>
                                                        </div>
                                                        <?php if ($review[3] == 1): ?>
                                                            <div
                                                                class="col-md-4 col-sm-4 col-xs-2 tinybookmargin textalignright">
                                                                <i class="fa fa-thumbs-o-up fa-2x"></i>
                                                            </div>
                                                        <?php else: ?>
                                                            <div
                                                                class="col-md-4 col-sm-4 col-xs-2 tinybookmargin textalignright">
                                                                <i class="fa fa-thumbs-o-down fa-2x"></i>
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>

                                                    <p>
                                                        <?php echo $review[2]; ?>
                                                    </p>
                                                </div>
                                                <div class="col-md-2 hidden-sm hidden-xs"></div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- Похожие -->
                            <div class="tab-pane fade" id="similar">
                                <div class="row masonry" data-columns>
                                    <?php if (isset($similarbooks)): ?>
                                        <?php foreach ($similarbooks as $similar): ?>
                                            <div class="item">
                                                <div class="thumbnail">
                                                    <img alt="Обложка книги"
                                                         src="../../template/images/books/<?php echo $similar[2]; ?>"
                                                         class="img-responsive"/>

                                                    <div class="caption">
                                                        <h4><a href="/book/book/<?php echo $similar[0]; ?>">
                                                                <?php echo $similar[1]; ?></a></h4>
                                                        <h5><a href="/author/author/<?php echo $similar[4]; ?>">
                                                                <?php echo $similar[3]; ?></a></h5>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</div>
<script src="../../template/js/JCarousel/jquery.js"></script>
<script src="../../template/js/addToUserBooks.js"></script>
<script src="../../template/js/salvattore.min.js"></script>


<?php include(ROOT . '/views/layouts/footer.php'); ?>

