<?php
    class Model {
        public static function addHumanRows() {
            $database = new database();
            $response = $database -> getAll('SELECT * from people ORDER BY id ASC');
            return $response;
        }
        public static function InsertHumanRow() {
            $action = false;
            $database = new database();
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $age = $_POST['age'];
            $height = $_POST['height'];
            $weight = $_POST['weight'];
            $sql = "INSERT INTO `people` (`name`, `surname`, `age`, `height`, `weight`) VALUES ('$name','$surname','$age', '$height','$weight')";
            $response = $database -> executeRun($sql);
            if($response){
            $action = $database->getOne('SELECT id FROM people ORDER BY id DESC LIMIT 1');
            }
            return $action;
        }
        public static function UpdateTableRow($id) {
            $element = false;
            $database = new database();
            $element = $database->getOne('SELECT * FROM people WHERE id = "'.$id.'"');
            return $element;
        }
        public static function UpdateInTableRow($id) {
            $action = false;
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $age = $_POST['age'];
            $height = $_POST['height'];
            $weight = $_POST['weight'];
            $database = new database();
            $sql = "UPDATE people SET `name` = '$name', `surname` = '$surname', `age` = '$age', `height` = '$height', `weight` = '$weight' WHERE id = '".$id."'";
            $response = $database -> executeRun($sql);
            if($response){
            $action = $database->getOne('SELECT id FROM people ORDER BY id DESC LIMIT 1');
            }
            return $action;
        }
        public static function DeleteInTableRow($id) {
            $action = false;
            $database = new database();
            $sql = "DELETE FROM people WHERE id = '".$id."'";
            $response = $database -> executeRun($sql);
            if($response){
                $action = $id;
            }
            return $action;
        }
    }
?>