<?php include(ROOT . '/views/layouts/header.php'); ?>

<link href="../../template/css/search.css" rel="stylesheet">


<?php include(ROOT . '/views/layouts/navigation.php'); ?>


<div class="container marginfromnavigation">
    <form action="/book/search" method="post">
        <div class="row littlemargin">
            <div class="col-md-3 col-sm-6 formelementmargin">
                <input type="text" placeholder="Введите данные" class="form-control" name="searchresult" autofocus/>
            </div>
            <div class="col-md-2 col-sm-6 formelementmargin">
                <input type="text" placeholder="Поиск по тэгу" class="form-control" name="tagresult"/>
            </div>

            <div class="col-md-2 col-sm-6 formelementmargin">
                <select name="genre" class="form-control">
                    <option value="all" selected>Выберите жанр</option>
                    <option value="fantastic">Фантастика</option>
                    <option value="history">Исторические</option>
                    <option value="biography">Биография</option>
                </select>
            </div>
            <div class="col-md-3 col-sm-6 formelementmargin bigletter inputmargin centertext">
                <label class="radio-inline">
                    <input type="radio" name="bookorauthor" value="book" checked/> Книга
                </label>
                <label class="radio-inline">
                    <input type="radio" name="bookorauthor" value="author"/> Автор
                </label>
            </div>
            <div class="col-md-2 col-sm-6 formelementmargin">
                <button name="submit" type="submit" class="btn btn-success btn-block"><i class="fa fa-search fa-fw"></i>Поиск
                </button>
            </div>
        </div>
    </form>
    <hr/>
    <?php if (isset($books)): ?>
        <?php foreach ($books as $book): ?>
            <?php if (!(BookController::isSelf($book[1]))): ?>
                <div class="row">
                    <div class="col-md-1 hidden-sm hidden-xs"></div>
                    <div class="col-md-3 col-sm-3 col-xs-12 formelementmargin">
                        <img src="../../template/images/books/<?php echo $book[4]; ?>" class="img-responsive"/>
                    </div>
                    <div class="col-md-5 col-sm-6 col-xs-12">
                        <a href="/book/book/<?php echo $book[1]; ?>"><h2
                                class="textelementmargin"><?php echo $book[3]; ?></h2></a>

                        <a href="/author/author/<?php echo $book[2]; ?>"><h3
                                class="textelementmargin"><?php echo $book[0]; ?></h3></a>

                        <?php if ($book[6] > 0): ?>
                            <h4 class="textelementmargin"><span>Средняя оценка</span>
                            <span data-avg="<?php echo $book[1] ?>" id="avg-mark">
                                <?php echo round(($book[6] / $book[5]), 2); ?></span></h4>
                            <h4 class="textelementmargin"><span>Оценили</span>
                            <span data-allmark="<?php echo $book[1] ?>" id="mark">
                                <?php echo $book[5]; ?></span></h4>
                        <?php else: ?>
                            <h4 class="textelementmargin"><span>Средняя оценка</span>
                                <span data-avg="<?php echo $book[1] ?>">0</span></h4>
                            <h4 class="textelementmargin"><span>Оценили</span>
                                <span data-allmark="<?php echo $book[1] ?>">0</span></h4>
                        <?php endif; ?>
                        <div class="textelementmargin markable" data-idbook="<?php echo $book[1] ?>">
                            <?php $bookmark = Book::getUserMark($book[1], $book[7]); ?>
                            <?php if (isset($bookmark)): ?>
                                <?php for ($i = 0; $i < $bookmark[2]; $i++): ?>
                                    <i class="fa fa-star fa-2x"
                                       data-mark="<?php echo $i + 1; ?>"
                                       data-id-book="<?php echo $book[1]; ?>"></i>
                                <?php endfor; ?>
                                <?php for ($i = $bookmark[2]; $i < 5; $i++): ?>
                                    <i class="fa fa-star-o fa-2x"
                                       data-mark="<?php echo $i + 1; ?>"
                                       data-id-book="<?php echo $book[1]; ?>"></i>
                                <?php endfor; ?>
                            <?php else: ?>
                                <i class="fa fa-star-o fa-2x" data-id-book="<?php echo $book[1]; ?>" data-mark="1"></i>
                                <i class="fa fa-star-o fa-2x" data-id-book="<?php echo $book[1]; ?>" data-mark="2"></i>
                                <i class="fa fa-star-o fa-2x" data-id-book="<?php echo $book[1]; ?>" data-mark="3"></i>
                                <i class="fa fa-star-o fa-2x" data-id-book="<?php echo $book[1]; ?>" data-mark="4"></i>
                                <i class="fa fa-star-o fa-2x" data-id-book="<?php echo $book[1]; ?>" data-mark="5"></i>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-3 col-xs-12" data-book-id="<?php echo $book[1]; ?>">
                        <button name="this" class="btn btn-success btn-block
                        <?php if (User::Logged()): ?>
                            already-read
                        <?php endif; ?>"
                            <?php if (Book::isInList($book[1], 1)): ?>
                                disabled
                            <?php endif; ?>>Прочитал
                        </button>
                        <button class="btn btn-success btn-block
                        <?php if (User::Logged()): ?>
                            reading
                        <?php endif; ?>"
                            <?php if (Book::isInList($book[1], 2)): ?>
                                disabled
                            <?php endif; ?>>Читаю
                        </button>
                        <button class="btn btn-success btn-block
                        <?php if (User::Logged()): ?>
                            want-read
                        <?php endif; ?>"
                            <?php if (Book::isInList($book[1], 3)): ?>
                                disabled
                            <?php endif; ?>>Хочу прочитать
                        </button>
                        <button class="btn btn-success btn-block
                        <?php if (User::Logged()): ?>
                            remove-user-books
                        <?php endif; ?>">По умолчанию
                        </button>
                        <button class="btn btn-primary btn-block"
                                data-book-i="<?php echo $book[1]; ?>">Похожее
                        </button>
                    </div>
                    <div class="col-md-1 hidden-sm hidden-xs"></div>
                </div>
                <hr/>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<script src="../../template/js/JCarousel/jquery.js"></script>
<script src="../../template/js/addToUserBookFromSearch.js"></script>
<script src="../../template/js/addSimilar.js"></script>

<?php include(ROOT . '/views/layouts/footer.php'); ?>
