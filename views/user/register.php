<?php include(ROOT . '/views/layouts/header.php'); ?>
<?php if ($result): ?>
    <p style="font-size: 50px; color: red;">Вы зарегистрировались!</p>
<?php else: ?>
    <?php if (isset($errors) && is_array($errors)): ?>
        <ul>
        <?php foreach ($errors as $err): ?>
            <li>
                <?php echo $err; ?>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
    </ul>
    <h1> Регистрация </h1>
    <form action="#" method="post">

        <input type="text" name="email" value="<?php echo $email; ?>" placeholder="e-mail"/> <br/>
        <input type="text" name="login" value="<?php echo $login; ?>" placeholder="Логин"/> <br/>

        <input type="password" name="password_text" value="<?php echo $password; ?>" placeholder="Пароль"/> <br/>
        <input type="password" name="password_text_repeat" placeholder="Повторите пароль"/> <br/>

        <input type="submit" name="submit" value="Зарегистрироваться">
    </form>

<?php endif; ?>
<?php include(ROOT . '/views/layouts/footer.php'); ?>