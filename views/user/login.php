<?php include(ROOT . '/views/layouts/header.php'); ?>



    <section id="form"><!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4 padding-right">

                    <?php if($result): ?>
                        <p>Вы зарегистрированы!</p>
                    <?php else: ?>
                        <?php if(isset($errors) && is_array($errors)): ?>
                            <ul>
                                <?php foreach ($errors as $error): ?>
                                    <li>- <?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>


                        <div class="signup-form"><!--sign up form-->
                            <h2>Вход на сайт</h2>
                            <form action="#" method="post" name="reg">
                                <input type="email" placeholder="Email адрес" name="email" value="<?php echo $email; ?>"/>
                                <input type="password" placeholder="Пароль" name="password" value="<?php echo $password; ?>"/>
                                <input type="submit" name="submit" name="Вход" value="Вход"/>
                            </form>
                        </div><!--/sign up form-->
                    <?php endif; ?>
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </section><!--/form-->

    </div>
<?php include(ROOT . '/views/layouts/footer.php'); ?>