<?php include(ROOT . '/views/layouts/header.php'); ?>

    <link href="../../template/css/popular.css" rel="stylesheet">

<?php include(ROOT . '/views/layouts/navigation.php'); ?>

    <div class="container-fluid marginfromnavigation">
        <div class="row centertext popmarginbottom">
            <h1> Популярные книги </h1>

            <div class="popmargins">
                <?php foreach ($books as $book): ?>
                    <div class="col-md-2 col-sm-4 col-xs-6 imgmarginbot">
                        <img src="../../template/images/books/<?php echo $book[2]; ?>" class="img-responsive"/>
                        <h4><a href="/book/book/<?php echo $book[0]; ?>"><?php echo $book[1]; ?></a></h4>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row centertext popmarginbottom">
            <h1> Популярные авторы </h1>

            <div class="popmargins">
                <?php foreach ($authors as $author): ?>
                    <div class="col-md-2 col-sm-4 col-xs-6 imgmarginbot">
                        <img src="../../template/images/authors/<?php echo $author[2]; ?>" class="img-responsive"/>
                        <h4><a href="/author/author/<?php echo $author[0]; ?>"><?php echo $author[1]; ?></a></h4>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

<?php include(ROOT . '/views/layouts/footer.php'); ?>