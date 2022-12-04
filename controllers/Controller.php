<?php
class Controller
{
    public static function Start()
    {
        include_once 'view/login.php';
    }
    public static function Login()
    {
        $test = ModelAdmin::checkUser();
        if ($test) {
            header('Location:table');
        } else {
            $_SESSION['error'] = 'Ошибка ввода данных';
        }
    }
    public static function Table()
    {
        $response = Model::addHumanRows();
        include_once './view/table.php';
    }
    public static function Logout()
    {
        ModelAdmin::UserLogout();
        include_once 'view/login.php';
    }
    public static function InsertTable()
    {
        include_once 'view/insertTable.php';
    }
    public static function InsertToTable()
    {
        $action = Model::InsertHumanRow();
        if ($action != false) {
            $_SESSION['error'] = 'Пользователь - '.$action['id'].' - Добавлен';
            header('Location:table');
        } else {
            $_SESSION['error'] = 'Ошибка ввода данных';
            include_once 'view/insertTable.php';
        }
    }
    public static function UpdateTable($id)
    {
        $element = Model::UpdateTableRow($id);
        if($element != false){
            include_once 'view/updateTable.php';
        }
        else{
            $_SESSION['error'] = 'Пользователь - '.$id.' - Ошибка изменения';
            header('Location:table');
        }
    }
    public static function UpdateInTable($id)
    {
        $test = Model::UpdateInTableRow($id);
        if ($test != false) {
            $_SESSION['error'] = 'Пользователь - '.$id.' - Изменен';
            header('Location:table');
        } else {
            $element = Model::UpdateTableRow($id);
            $_SESSION['error'] = 'Измените данные!';
            include_once 'view/updateTable.php';
        }
    }
    public static function DeleteTable($id)
    {
        $element = Model::UpdateTableRow($id);
        if($element != false){
            include_once 'view/deleteTable.php';
        }
        else{
            $_SESSION['error'] = 'Пользователь - '.$id.' - Ошибка удаления';
            header('Location:table');
        }
    }
    public static function DeleteInTable($id)
    {
        $test = Model::DeleteInTableRow($id);
        if ($test != false) {
            $_SESSION['error'] = 'Пользователь - '.$test.' - Удален';
            header('Location:table');
        } else {
            $element = Model::UpdateTableRow($id);
            $_SESSION['error'] = 'Ошибка удаления!';
            include_once 'view/deleteTable.php';
        }
    }
}
?>