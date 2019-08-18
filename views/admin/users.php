<?php include (ROOT . '/views/layouts/header.php'); ?>




    <h2 align="center">Панель администратора</h2>
    <h4 align="center">Пользователи</h4>

    <table cellspacing="0">
        <tr>
            <th>Имя</th>
            <th>E-mail</th>
            <th>Пароль</th>
            <th>Права</th>
        </tr>
 <?php foreach ($usersList as $user): ?>
        <tr>
            <td><?php echo $user['name']; ?></td>
            <td><?php echo $user['email']; ?></td>
            <td><?php echo $user['password']; ?></td>
            <td><?php echo $user['role']; ?></td>
            <th><a href="/admin/edituser/<?php echo $user['id']; ?>">Изменить</a></th>
            <th><a href="/admin/deleteuser/<?php echo $user['id']; ?>">Удалить</a></th>
        </tr>
<?php endforeach; ?>
    </table>
<br>
<br>



<?php include (ROOT . '/views/layouts/footer.php'); ?>