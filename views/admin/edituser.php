<?php include (ROOT . '/views/layouts/header.php'); ?>




    <h2 align="center">Панель администратора</h2>
    <h4 align="center">Изменение пользователя <?php echo $user['name']; ?></h4>

    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 padding-right">


<?php if($result): ?>
    <h4 align="center">Пользователь сохранён</h4>
<br>
    <br>
    <h5 align="center"><a href="/admin/users">Назад к пользователям</a></h5>
<?php else: ?>
    <?php if(isset($errors) && is_array($errors)): ?>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li>- <?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

                        <div class="signup-form"><!--sign up form-->
                            <h2 align="center">Редактирование <?php echo $user['name']; ?></h2>
                            <form action="#" method="post" name="reg">
                                <input type="text" name="name" value="<?php echo $user['name']; ?>"/>
                                <input type="email" name="email" value="<?php echo $user['email']; ?>"/>
                                <input type="text" name="password" value="<?php echo $user['password']; ?>"/>
                                <label><input type="checkbox" name="checkbox" <?php if($user['role'] == 'admin') echo 'checked'; ?>>Администратор</label>
                                <input type="submit" name="submit"  value="Сохранить"/>
                            </form>
                        </div><!--/sign up form-->
<?php endif; ?>
                </div>
            </div>
        </div>
    </section><!--/form-->





<?php include (ROOT . '/views/layouts/footer.php'); ?>