<?php
class HomeModel extends Db {
    protected function fetch_room_types() {
        $stmt = $this->conn()->prepare("SELECT Room_Type FROM pestana.rooms;");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    protected function fetch_room_capacities() {
        $stmt = $this->conn()->prepare("SELECT DISTINCT Room_Capacity FROM pestana.rooms;");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
}