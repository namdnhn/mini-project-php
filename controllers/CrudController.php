<?php
require_once '/opt/lampp/htdocs/mini_project/models/Item.php';
require_once '/opt/lampp/htdocs/mini_project/helpers/Session.php';
require_once '/opt/lampp/htdocs/mini_project/helpers/Validation.php';

class CrudController {
    private $item;

    public function __construct($pdo) {
        $this->item = new Item($pdo);
        Session::start();
    }

    public function create($name, $description) {
        if (Validation::notEmpty($name) && Validation::notEmpty($description)) {
            $this->item->create($name, $description);
            header('Location: /mini_project/views/dashboard.php');
        } else {
            header('Location: /mini_project/views/add_item.php?error=Invalid input');
        }
    }

    public function read() {
        return $this->item->read();
    }

    public function readOne($id) {
        return $this->item->readOne($id);
    }
    
    public function update($id, $name, $description) {
        if (Validation::notEmpty($name) && Validation::notEmpty($description)) {
            $this->item->update($id, $name, $description);
            header('Location: /mini_project/views/dashboard.php');
        } else {
            header('Location: /mini_project/views/edit_item.php?error=Invalid input&id='.$id);
        }
    }

    public function delete($id) {
        $this->item->delete($id);
        header('Location: /mini_project/views/dashboard.php');
    }
}
