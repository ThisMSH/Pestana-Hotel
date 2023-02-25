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
        $stmt = $this->conn()->prepare("UPDATE pestana.bookers SET First_Name = :name, Family_Name = :fname, Birthday = :bday WHERE ID = :id;");
        
        for($i = 0; $i < $n; $i++) {
            $stmt->bindParam(":name", $data["first-name"][$i]);
            $stmt->bindParam(":fname", $data["family-name"][$i]);
            $stmt->bindParam(":bday", $data["bday"][$i]);
            $stmt->bindValue(":id", $data["id"][$i]);
            
            if(!$stmt->execute()) {
                $stmt = null;
                header("location: " . URLROOT . "dashboard/my_booking?error=update_failed");
                exit();
            }
        }

        header("location: " . URLROOT . "dashboard/my_booking?update=success");
        $stmt = null;
    }

    protected function cancel_reservation($id, $user_id) {
        $stmt = $this->conn()->prepare("UPDATE pestana.reservations SET Check_In = '', Check_Out = '' WHERE ID = ?;");

        if(!$stmt->execute(array($id))) {
            $stmt = null;
            header("location: " . URLROOT . "dashboard/my_booking?error=cancel_failed");
            exit();
        }

        $stmt = $this->conn()->prepare("UPDATE pestana.users SET Discount = GREATEST((Discount - 1), 0) WHERE ID = $user_id;");

        if(!$stmt->execute()) {
            $stmt = null;
            header("location: " . URLROOT . "dashboard/my_booking?error=discount_stmt_failed");
            exit();
        }

        $_SESSION['discount'] = $_SESSION['discount'] > 0 ? $_SESSION['discount'] - 1 : 0;

        header("location: " . URLROOT . "dashboard/my_booking?cancel=success");
        $stmt = null;
    }

    protected function fetch_rooms() {
        $stmt = $this->conn()->prepare("SELECT * FROM pestana.rooms;");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
