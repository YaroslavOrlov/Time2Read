<?php include(ROOT. '/views/layouts/header.php'); ?>

<!-- Страница книги -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <br/>
            <!-- Вкладки -->
            <div class="tabs">
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
                                <span>Средняя оценка</span> <span>5,4</span> <span>Оценили</span> <span>123</span>
                            </div>
                            <div class="col-md-5 col-sm-6">
                                <h1>Триумфальная арка</h1>
                                <h2><a href="#">Эрих Мария Ремарк</a></h2>
                                <h3>Заказать</h3>
                                <a href="#">litres.com/triupharka</a>
                                <h3>Аудиокнига</h3>
                                <a href="#">litres.com/triupharka</a>
                                <p>
                                    "At vero eos et accusamus et iusto odio dignissimos ducimus
                                    qui blanditiis praesentium voluptatum deleniti atque corrupti
                                    quos dolores et quas molestias excepturi sint occaecati
                                    cupiditate non provident, similique sunt in culpa qui officia
                                    deserunt mollitia animi, id est laborum et dolorum fuga. Et
                                    harum quidem rerum facilis est et expedita distinctio. Nam
                                    libero tempore, cum soluta nobis est eligendi optio cumque
                                    nihil impedit quo minus id quod maxime placeat facere possimus,
                                    omnis voluptas assumenda est, omnis dolor repellendus.
                                </p>
                            </div>
                            <!-- Допустимые действия -->
                            <div class="col-md-3" >
                                <!-- Состояния -->
                                <button class="btn btn-success btn-block">Прочитал</button>
                                <button class="btn btn-success btn-block">Читаю</button>
                                <button class="btn btn-success btn-block">Хочу прочитать</button>
                                <button class="btn btn-success btn-block">По умолчанию</button>
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
        </div>
    </div>
</div>

<?php include(ROOT. '/views/layouts/footer.php'); ?>

