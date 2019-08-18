<?php

class Admin
{
    public static function getUsersList()
    {
        $db = Db::getConnection();

        $usersList = array();

        $i=0;
        foreach($db->query('SELECT * FROM user ORDER BY role ASC') as $row) {
            $usersList[$i]['id'] = $row['id'];
            $usersList[$i]['email'] = $row['email'];
            $usersList[$i]['name'] = $row['name'];
            $usersList[$i]['password'] = $row['password'];
            $usersList[$i]['role'] = $row['role'];
            $i++;
        }
        return $usersList;
    }

    public static function editUser($name, $email, $password, $role, $id)
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $db = Db::getConnection();

        $sql = 'UPDATE user SET name = :name, email = :email, password = :password, role = :role WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $hashed_password, PDO::PARAM_STR);
        $result->bindParam(':role', $role, PDO::PARAM_STR);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        return $result->execute();
    }

    public static function deleteUserById($id)
    {
        intval($id);

        $db = Db::getConnection();

        $sql = 'DELETE FROM user WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);


        return $result->execute();
    }

}