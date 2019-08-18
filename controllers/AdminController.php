<?php


class AdminController
{
    public function actionIndex()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $isAdmin = User::checkAdminRole($userId);

        if(!$isAdmin){
            header("Location: /");
        }
        include_once (ROOT . '/views/admin/index.php');

    }

    public function actionUsers()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $isAdmin = User::checkAdminRole($userId);

        if(!$isAdmin){
            header("Location: /");
        }
        $usersList = Admin::getUsersList();

        include_once (ROOT . '/views/admin/users.php');
    }

    public function actionProducts()
    {

    }

    public function actionCategory()
    {

    }

    public function actionEdituser($id)
    {
        $result = false;
        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            if($_POST['checkbox'] == 'on'){
                $role = 'admin';
            }else{
                $role = 'user';
            }

            $errors = false;

            if(!User::checkName($name)){
                $errors[] = 'Имя должно быть не короче 3х символов';
            }

            if(!User::checkEmail($email)){
                $errors[] = 'Неправильный E-mail';
            }

            if(!User::checkPassword($password)){
                $errors[] = 'Пароль не короче 6 символов';
            }

            if($errors == false){
               $result = Admin::editUser($name, $email, $password, $role, $id);
            }
        }
        //Проверяем, залогинен и админ ли юзер
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $isAdmin = User::checkAdminRole($userId);

        if(!$isAdmin){
            header("Location: /");
        }
        //
        $user = User::getUserById($id);

        include_once (ROOT . '/views/admin/edituser.php');
    }

    public function actionDeleteuser($id)
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $isAdmin = User::checkAdminRole($userId);

        if(!$isAdmin){
            header("Location: /");
        }else {
            $result = Admin::deleteUserById($id);

            header("Location: /admin/users");
        }
    }
}