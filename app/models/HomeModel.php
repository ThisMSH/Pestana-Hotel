<?php
class HomeModel extends Db {
    protected function fetch_room_names_capacities() {
        $stmt = $this->conn()->prepare("SELECT DISTINCT Room_Name, Room_Capacity FROM pestana.rooms ORDER BY Room_Capacity;");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }

    protected function fetch_room_types() {
        $stmt = $this->conn()->prepare("SELECT Room_Name, Room_Type FROM pestana.rooms;");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt = null;
    }
}