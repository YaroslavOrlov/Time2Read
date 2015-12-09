<?php include(ROOT . '/views/layouts/header.php'); ?>

    <link href="../../template/css/registration.css" rel="stylesheet">

<?php include(ROOT . '/views/layouts/navigation.php'); ?>

    <!-- Регистрации -->
    <div class="container marginfromnavigation">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <!-- Форма регистрации -->
                <div class="jumbotron">
                    <form action="" method="post">
                        <h2 class="form-signin-heading">Пожалуйста введите данные</h2>

                        <?php if (isset($errors[4])): ?>
                            <p class="error"><?php echo $errors[4]; ?></p>
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
                        <!-- Логин -->
                        <div class="form-group">
                            <label for="login">Псевдоним</label>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="login" placeholder="псевдоним"
                                       id="login" class="form-control"
                                       value="<?php echo $login ?>" required/>
                            </div>
                            <?php if (isset($errors[1])): ?>
                                <p class="error"><?php echo $errors[1]; ?></p>
                            <?php endif; ?>
                        </div>
                        <!-- Пароль -->
                        <div class="form-group">
                            <label for="password">Пароль</label>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="password" placeholder="пароль"
                                       id="password" class="form-control"
                                       value="<?php echo $password ?>" required/>
                            </div>
                            <?php if (isset($errors[2])): ?>
                                <p class="error"><?php echo $errors[2]; ?></p>
                            <?php endif; ?>
                        </div>
                        <!-- Повтор пароля -->
                        <div class="form-group">
                            <label for="repeat_pass">Повторите пароль</label>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="repeat_password" placeholder="повторите пароль"
                                       id="repeat_pass" class="form-control"
                                       value="<?php echo $repeatPassword ?>" required/>
                            </div>
                            <?php if (isset($errors[3])): ?>
                                <p class="error"><?php echo $errors[3]; ?></p>
                            <?php endif; ?>
                        </div>
                        <button type="submit" name="submit" class="btn btn-success btn-block">
                            <i class="fa fa-check fa-fw"></i>Зарегестрироваться
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>

<?php include(ROOT . '/views/layouts/footer.php'); ?>