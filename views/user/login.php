<?php include(ROOT . '/views/layouts/header.php'); ?>

    <link href="../../template/css/authorization.css" rel="stylesheet">

<?php include(ROOT . '/views/layouts/navigation.php'); ?>

    <!-- Авторизация -->
    <div class="container marginfromnavigation">
        <div class="row">
            <div class="col-md-3 col-sm-2 col-xs-1">
            </div>
            <!-- Форма авторизации -->
            <div class="col-md-6 col-sm-8 col-xs-10">
                <div class="jumbotron">
                    <form action="" method="post">
                        <h2>Пожалуйста войдите</h2>

                        <?php if (isset($errors[2])): ?>
                            <p class="error"><?php echo $errors[2]; ?></p>
                        <?php endif; ?>

                        <!-- Электронный адрес -->
                        <div class="form-group">
                            <label for="email">E-mail</label>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="text" name="email" placeholder="e-mail"
                                       id="email" class="form-control"
                                       value="<?php echo $email ?>" required autofocus/>
                            </div>
                            <?php if (isset($errors[0])): ?>
                                <p class="error"><?php echo $errors[0]; ?></p>
                            <?php endif; ?>
                        </div>
                        <!-- Пароль -->
                        <div class="form-group">
                            <label for="password">Пароль</label>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="password" placeholder="password"
                                       id="password" class="form-control"
                                       value="<?php echo $password ?>" required/>
                            </div>
                            <?php if (isset($errors[1])): ?>
                                <p class="error"><?php echo $errors[1]; ?></p>
                            <?php endif; ?>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-block">
                            <i class="fa fa-check fa-fw"></i>Войти
                        </button>
                    </form>
                    <!-- Восстановление пароля -->
                    <div class="centertext">
                        <a href="#">Забыли пароль?</a>
                        <br/>
                        <br/>
                        <a href="/user/registration">Зарегестрироваться</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-2 col-xs-1">
            </div>
        </div>
    </div>

<?php include(ROOT . '/views/layouts/footer.php'); ?>