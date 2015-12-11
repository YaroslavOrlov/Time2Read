<?php include(ROOT . '/views/layouts/header.php'); ?>

    <link href="../../template/css/edit.css" rel="stylesheet">

<?php include(ROOT . '/views/layouts/navigation.php'); ?>


    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-6">
                <!-- Форма регистрации -->
                <div class="jumbotron">
                    <form action="" method="post" enctype="multipart/form-data">
                        <h2 class="form-signin-heading">Пожалуйста введите данные</h2>

                        <div class="centertext">
                            <p><img alt="Ваш аватар" src="../../template/images/<?php echo $user[2]; ?>"
                                    class="avatar"/></p>
                        </div>
                        <div class="form-group ">
                            <label for="login">Аватар</label>

                            <div class="input-group ">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="file" name="avatar" accept="image/*" class="form-control">
                            </div>
                        </div>

                        <!-- Электронный адрес -->
                        <div class="form-group">
                            <label for="email">E-mail</label>

                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input type="text" name="email" placeholder="e-mail" id="email" class="form-control"
                                       value="<?php echo $user[3]; ?>" required autofocus/>
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
                                <input type="text" name="login" placeholder="псевдоним" id="login" class="form-control"
                                       value="<?php echo $user[0]; ?>" required/>
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
                                <input type="password" name="password" placeholder="пароль" id="password"
                                       class="form-control" required/>
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
                                <input type="password" name="repeat_password" placeholder="повторите пароль" id="repeat_pass"
                                       class="form-control" required/>
                            </div>
                            <?php if (isset($errors[3])): ?>
                                <p class="error"><?php echo $errors[3]; ?></p>
                            <?php endif; ?>
                        </div>
                        <button name="submit" type="submit" class="btn btn-success btn-block"><i
                                class="fa fa-check fa-fw"></i>Внести
                            изменения
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
            </div>
        </div>
    </div>

<?php include(ROOT . '/views/layouts/footer.php'); ?>