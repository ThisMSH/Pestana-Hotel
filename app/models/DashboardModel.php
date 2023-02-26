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

    protected function add_new_room($data) {
        $image_name = $data['img']['name'];
        $image_path = $data['img']['tmp_name'];
        $upload_path = "C:/xampp/htdocs/Pestana-Hotel/public/img/uploads/" . $image_name;
        $stmt = $this->conn()->prepare("INSERT INTO pestana.rooms (Room_Name, Room_Type, Room_Capacity, Thumbnail, Price) VALUES (?, ?, ?, ?, ?);");

        $stmt->bindParam(1, $data['name']);
        $stmt->bindParam(2, $data['type']);
        $stmt->bindParam(3, $data['capacity']);
        $stmt->bindParam(4, $image_name);
        $stmt->bindParam(5, $data['price']);

        if(!$stmt->execute()) {
            $stmt = null;
            header("location: " . URLROOT . "dashboard/rooms_manage?error=add_failed");
            exit();
        }

        move_uploaded_file($image_path, $upload_path);

        header("location: " . URLROOT . "dashboard/rooms_manage?add=success");
        $stmt = null;
    }

    protected function updating_room($data) {
        $image_name = $data['img']['name'];
        $image_path = $data['img']['tmp_name'];
        $upload_path = "C:/xampp/htdocs/Pestana-Hotel/public/img/uploads/" . $image_name;

        if(!empty($data['name'])) {
            $update[] = "Room_Name = :name";
        }
        if(!empty($data['type'])) {
            $update[] = "Room_Type = :type";
        }
        if(!empty($data['capacity'])) {
            $update[] = "Room_Capacity = :capacity";
        }
        if(!empty($image_name)) {
            $update[] = "Thumbnail = :img";
        }
        if(!empty($data['price'])) {
            $update[] = "Price = :price";
        }

        $stmt = $this->conn()->prepare("UPDATE pestana.rooms SET " . implode(", ", $update) . " WHERE ID = :id");

        if(!empty($data['name'])) {
            $stmt->bindParam(":name", $data['name']);
        }
        if(!empty($data['type'])) {
            $stmt->bindParam(":type", $data['type']);
        }
        if(!empty($data['capacity'])) {
            $stmt->bindParam(":capacity", $data['capacity']);
        }
        if(!empty($image_name)) {
            $stmt->bindParam(":img", $image_name);
        }
        if(!empty($data['price'])) {
            $stmt->bindParam(":price", $data['price']);
        }

        $stmt->bindParam(":id", $data['id']);

        if(!$stmt->execute()) {
            $stmt = null;
            header("location: " . URLROOT . "dashboard/rooms_manage?error=update_failed");
            exit();
        }

        if(!empty($image_name)) {
            move_uploaded_file($image_path, $upload_path);
        }

        header("location: " . URLROOT . "dashboard/rooms_manage?update=success");
        $stmt = null;
    }

    protected function deleting_room($id) {
        $stmt = $this->conn()->prepare("DELETE FROM pestana.rooms WHERE ID = ?;");

        if(!$stmt->execute(array($id))) {
            $stmt = null;
            header("location: " . URLROOT . "dashboard/rooms_manage?error=delete_failed");
            exit();
        }

        header("location: " . URLROOT . "dashboard/rooms_manage?delete=success");
        $stmt = null;
    }

    protected function fetch_all_reservations_users_count() {
        $stmt = $this->conn()->prepare("SELECT COUNT(*) FROM pestana.users;");
        $stmt->execute();
        
        $data = $stmt->fetch();
        
        $stmt = $this->conn()->prepare("SELECT * FROM pestana.reservations;");
        $stmt->execute();
        
        $data = array_merge($data, $stmt->fetchAll());
        
        return $data;
    }
}
