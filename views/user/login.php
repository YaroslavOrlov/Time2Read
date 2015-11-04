<?php include(ROOT . '/views/layouts/header.php'); ?>
<?php if (isset($errors) && is_array($errors)): ?>
    <ul>
    <?php foreach ($errors as $err): ?>
        <li>
            <?php echo $err; ?>
        </li>
    <?php endforeach; ?>
<?php endif; ?>
    </ul>
    <form action="#" method="post">
        <input type="text" name="email" placeholder="e-mail"/> <br/>
        <input type="password" name="password_text" placeholder="password"/> <br/>
        <input type="submit" name="submit" value="Войти">
    </form>

<?php include(ROOT . '/views/layouts/footer.php'); ?>