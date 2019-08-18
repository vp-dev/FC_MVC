<?php


class User
{
    public static function register($name, $email, $password)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $db = Db::getConnection();

        $sql = 'INSERT INTO user (name, email, password) VALUES (:name, :email, :password)';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $hashed_password, PDO::PARAM_STR);

        return $result->execute();
    }

    public static function checkName($name)
    {
        if(strlen($name) >= 3){
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            return true;
        }
        return false;
    }

    public static function checkPassword($password)
    {
        if(strlen($password) >5){
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email)
    {
        $db = Db::getConnection();

        $sql = 'SELECT COUNT(*) FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if($result->fetchColumn()){
            return true;
        }
        return false;
    }

    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE email = :email';

        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if($user){
            if(password_verify($password, $user['password'])) {
                return $user['id'];
            }
        }

        return false;
    }

    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public static function getUserById($id)
    {
        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM user WHERE id = ' . $id);

        return $result->fetch();
    }

    public static function checkLogged()
    {
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        }

        header("Location: /login");
    }

    public static function checkAdminRole($id)
    {
        $role = 'admin';
        $db = Db::getConnection();

        $sql = 'SELECT * FROM user WHERE id = :id AND role = :role';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_STR);
        $result->bindParam(':role', $role, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch();
        if($user){
            return true;
        }
        return false;
    }
}