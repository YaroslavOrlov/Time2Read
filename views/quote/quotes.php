<?php include(ROOT . '/views/layouts/header.php'); ?>

<link href="../../template/css/JCarousel/owl.carousel.css" rel="stylesheet">
<link href="../../template/css/JCarousel/owl.transitions.css" rel="stylesheet">

<?php include(ROOT . '/views/layouts/navigation.php'); ?>


<div class="container marginfromnavigation">


    <!-- Цитата и стрелки -->
    <div id="demo" class="adaptive quotetopmargin">
        <div id="left" class="col-md-2 col-sm-1">
            <!--            <span><i class="fa fa-angle-left fa-5x"></i></span>-->
        </div>

        <div class="span12 col-md-10 col-sm-12">
            <div id="owl-demo" class="owl-carousel present-quotes">
                <?php if (isset($result)): ?>
                    <?php foreach ($result as $quote): ?>
                        <div>
                            <h3><?php echo $quote[2]; ?> </h3>
                            <p><?php echo $quote[3]; ?></p>
                            <!-- Мне нравится -->
                            <?php if (User::Logged()): ?>
                                <div class="textalignright" data-fa-heart-i="<?php echo $quote[1]; ?>">
                                    <!-- MY STYLE -->
                                            <span><i class="fa
                                            <?php echo(Quote::existUserQuote($quote[1], $quote[0]) ? 'fa-heart' : 'fa-heart-o'); ?>
                                            fa-2x"></i></span>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-md-2 col-sm-1 textalignright"
             id="right">
            <!--             <span><i class="fa fa-angle-right fa-5x-->
            <!--                                          --><?php //if (User::Logged()): ?><!--ajax-next-->
            <?php //endif; ?><!--"></i></span>-->
        </div>
    </div>
</div>

<script type="text/javascript" src="../../template/js/JCarousel/jquery.js"></script>
<script type="text/javascript" src="../../template/js/JCarousel/owl.carousel.js"></script>
<script type="text/javascript" src="../../template/js/likeQuote.js"></script>

<?php include(ROOT . '/views/layouts/footer.php'); ?>
