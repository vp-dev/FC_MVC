<?php include (ROOT . '/views/layouts/header.php'); ?>




    <h2 align="center">Панель администратора</h2>
    <h4 align="center">Здравствуйте, <?php echo $user['name']; ?></h4>
<ul>
    <a href="/admin/users"><li>Пользователи</li></a>
    <a href="/admin/category"><li>Категории</li></a>
    <a href="/admin/products"><li>Товары</li></a>
</ul>



<?php include (ROOT . '/views/layouts/footer.php'); ?>