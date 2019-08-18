<?php


class CabinetController
{
    public function actionIndex()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $isAdmin = User::checkAdminRole($userId);

        if($isAdmin == true){
            include_once (ROOT . '/views/admin/index.php');
        }else {
            include_once(ROOT . '/views/cabinet/index.php');
        }
    }
}