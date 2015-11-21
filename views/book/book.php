<?php include(ROOT . '/views/layouts/header.php'); ?>

<!-- Страница книги -->
<div class="container bookmargintop">
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
                                        <img src="http://placehold.it/320x450" class="img-responsive"/>
                                        <br/>
                                        <?php if (isset($marks[0][1])): ?>
                                            <?php foreach ($marks as $mark): ?>
                                                <span>Средняя оценка</span>
                                                <span><?php echo round(($mark[1] / $mark[0]), 2); ?></span>
                                                <span>Оценили</span>
                                                <span><?php echo $mark[0]; ?></span>
                                            <?php endforeach; ?>
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
                                        <?php endif; ?>">По умолчанию</button>
                                        <!-- Выставление оценки -->
                                        <br/>
                                        <br/>

                                        <div class="centertext">
                                            <span><i class="fa fa-star-o fa-2x"></i></span>
                                            <span><i class="fa fa-star-o fa-2x"></i></span>
                                            <span><i class="fa fa-star-o fa-2x"></i></span>
                                            <span><i class="fa fa-star-o fa-2x"></i></span>
                                            <span><i class="fa fa-star-o fa-2x"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Рецензии -->
                            <div class="tab-pane fade" id="reviews">
                            </div>
                            <!-- Похожие -->
                            <div class="tab-pane fade" id="similar">
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

<?php include(ROOT . '/views/layouts/footer.php'); ?>

