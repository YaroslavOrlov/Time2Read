<?php include(ROOT . '/views/layouts/header.php'); ?>

<!-- Слайдер -->
<div class="container margintop marginbottom">
    <div class="carousel slide" id="carousel" data-interval="4000">
        <!-- Индикаторы -->
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="acitive"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
        </ol>
        <!-- Слайды -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="http://placehold.it/1400x700" alt="">
                <?php if(!User::Logged()): ?>
                <div class="carousel-caption">
                    <a href="/user/registration"><button class="btn btn-success btn-block">Зарегестрироваться</button></a>
                    <br/>
                    <a href="/user/login"><button class="btn btn-success btn-block">Войти</button></a>
                </div>
                <?php endif; ?>
            </div>
            <div class="item">
                <img src="http://placehold.it/1400x700" alt="">
                <div class="carousel-caption">
                    <h3>Второй слайд</h3>
                    <p>Описание второго слайда</p>
                </div>
            </div>
            <div class="item">
                <img src="http://placehold.it/1400x700" alt="">
                <div class="carousel-caption">
                    <h3>Третий слайд</h3>
                    <p>Описание третьего слайда</p>
                </div>
            </div>
        </div>
        <!-- Переключатели слайдов -->
        <a href="#carousel" class="left carousel-control" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a href="#carousel" class="right carousel-control" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>
</div>

<?php include(ROOT . '/views/layouts/footer.php'); ?>
