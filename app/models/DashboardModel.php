<?php
class DashboardModel extends Db {
    public function fetch_reservations_count($id) {
        $stmt = $this->conn()->prepare("SELECT COUNT(UserID) FROM pestana.reservations WHERE UserID = ?");
        $stmt->execute(array($id));
        return $stmt->fetch();
    }

    public function fetch_reservations($id) {
        $stmt = $this->conn()->prepare("SELECT * FROM pestana.reservations WHERE UserID = ?");
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    }

    public function fetch_bookers($id) {
        $stmt = $this->conn()->prepare("SELECT * FROM pestana.bookers WHERE BookerID = ?");
        $stmt->execute(array($id));
        return $stmt->fetchAll();
    }

    protected function update_data($data, $n) {
        for($i = 0; $i < $n; $i++) {
            $stmt = $this->conn()->prepare("UPDATE pestana.bookers SET First_Name = ?, Family_Name = ?, ;");
        }
    }
}