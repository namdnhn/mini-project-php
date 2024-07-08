<?php
class Item {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create($name, $description) {
        $stmt = $this->pdo->prepare("INSERT INTO items (name, description) VALUES (?, ?)");
        return $stmt->execute([$name, $description]);
    }

    public function read() {
        $stmt = $this->pdo->query("SELECT * FROM items");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function readOne($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM items WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $name, $description) {
        $stmt = $this->pdo->prepare("UPDATE items SET name = ?, description = ? WHERE id = ?");
        return $stmt->execute([$name, $description, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM items WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
