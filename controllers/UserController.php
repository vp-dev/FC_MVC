<?php


class UserController
{
    public function actionLogin()
    {
        $email = '';
        $password = '';
        $result = false;

        if(isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;

            if(!User::checkEmail($email)){
                $errors[] = 'Неправильный E-mail';
            }

            if(!User::checkPassword($password)){
                $errors[] = 'Пароль не короче 6 символов';
            }

            $userId = User::checkUserData($email, $password);
            if($userId == false) {
                $errors[] = 'Неправильные данные для входа на сайт';
            }else{
                 User::auth($userId);
                 header("Location: /cabinet/");
            }

        }

        include_once(ROOT . '/views/user/login.php');
    }

    public function actionLogout()
    {
        unset($_SESSION['user']);
        header("Location: /");
    }

    public function actionRegister()
    {
        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if(isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

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

            if(User::checkEmailExists($email)){
                $errors[] = 'Такой Email уже используется!';
            }

            if($errors == false){
                $result = User::register($name, $email, $password);
            }
        }
        include_once(ROOT . '/views/user/register.php');
    }
}