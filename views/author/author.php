<?php include(ROOT . '/views/layouts/header.php'); ?>

<!-- Блок информации об авторе -->
<div class="container">
    <!-- Фотография автора и биография -->
    <?php if (isset($author)): ?>
        <div class="row topmargin">
            <div class="col-md-2">
            </div>
            <div class="col-md-3 col-sm-6">
                <img src="http://placehold.it/300x420" alt="Эрих Мария Ремарк" class="img-responsive"/>
            </div>
            <div class="col-md-5 col-sm-6">
                <h1><?php echo $author[1]; ?></h1>

                <h3><?php echo $author[3]; ?></h3>

                <p>
                    <?php echo $author[2]; ?>
                </p>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <br/>
        <br/>
        <?php foreach ($books as $book): ?>
            <!--Список книг автора-->
            <div class="row">
                <div class="col-md-8 centered">
                    <div class="table-responsive">
                        <table class="table ">
                            <tr>
                                <td>
                                    <a href="/book/book/<?php echo $book[0]; ?>" class="info">
                                        <?php echo $book[1]; ?></a>
                                </td>
                                <td>
                                    <?php if ($book[2] != 0): ?>
                                        Оценка <span><?php echo round(($book[3] / $book[2]), 2); ?></span>
                                    <?php else: ?>
                                        Оценка <span><?php echo 0; ?></span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    Оценили <span><?php echo $book[2]; ?></span>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<?php include(ROOT . '/views/layouts/footer.php'); ?>
