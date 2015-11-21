<?php include(ROOT . '/views/layouts/header.php'); ?>

<script type="text/javascript" src="../../template/js/JCarousel/jquery.js"></script>
<script type="text/javascript" src="../../template/js/JCarousel/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="../../template/js/JCarousel/jcarousel.data-attributes.js"></script>

<div class="container">
    <!-- Тема цитаты -->
    <div class="row topmargin">
        <div class="col-md-10">
            <h3>Тематика</h3>
        </div>
    </div>
    <!-- Цитата и стрелки -->
    <div class="row topmargin">
        <div class="col-md-2 col-sm-1">
            <span><i data-jcarousel-control="true" data-target="-=1"
                     class="fa fa-angle-left fa-5x"></i></span>
        </div>
        <div data-jcarousel="true" data-wrap="circular" class="jcarousel col-md-8 col-sm-10">
            <ul class="present-quotes">
                <?php if (isset($result)): ?>
                    <?php foreach ($result as $quote): ?>
                        <li>
                            <?php echo $quote[0]; ?>
                            <p><h3><?php echo $quote[1]; ?></h3></p>
                            <!-- Мне нравится -->
                            <?php if(User::Logged()): ?>
                            <div class="textalignright">
                                <!-- MY STYLE -->
                                <span><i class="fa fa-heart-o fa-2x"></i></span>
                            </div>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
        <div class="col-md-2 col-sm-1 textalignright">
            <!-- MY STYLE -->
            <span><i data-jcarousel-control="true" data-target="+=1"
                     class="fa fa-angle-right fa-5x
                     <?php if(User::Logged()): ?>ajax-next<?php endif; ?>"></i></span>
        </div>
    </div>
</div>

<?php include(ROOT . '/views/layouts/footer.php'); ?>
