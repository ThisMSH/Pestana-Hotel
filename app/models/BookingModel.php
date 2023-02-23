<?php
class BookingModel extends Db {
    protected function search_for_room($name, $type) {
        $stmt = $this->conn()->prepare("SELECT * FROM pestana.rooms WHERE Room_Name = ? AND Room_Type = ?;");

        if(!$stmt->execute(array($name, $type))) {
            $stmt = null;
            header("location: " . URLROOT . "home/index?error=search_for_room");
            exit();
        }
        return $stmt->fetch();
        $stmt = null;
    }

    protected function booking_check($in, $out, $name, $type) {
        $stmt = $this->conn()->prepare("
            SELECT * FROM pestana.rooms LEFT JOIN pestana.reservations
            ON rooms.ID = reservations.RoomID AND (
                ? BETWEEN reservations.Check_In AND reservations.Check_Out
                OR ? BETWEEN reservations.Check_In AND reservations.Check_Out
                OR (
                    ? <= reservations.Check_In AND ? >= reservations.Check_Out
                )
            )
            WHERE reservations.RoomID IS NULL AND rooms.Room_Name = ? AND rooms.Room_Type = ?;
        ");

        if(!$stmt->execute(array($in, $out, $in, $out, $name, $type))) {
            $stmt = null;
            header("location: " . URLROOT . "home/index?error=booking_check");
            exit();
        }

        if($stmt->rowCount() > 0) {
            return true;
        }else {
            return false;
        }
        $stmt = null;
    }

    protected function insert_data($data, $n) {
        $stmt = $this->conn()->prepare("INSERT INTO pestana.reservations (Room_Name, Room_Type, Bookers_Number, Reservation_for, Check_In, Check_Out, UserID, RoomID, Price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);");
        $values = array($data["room-name"], $data["room-type"], $data["guests-num"], $data["full-name"], $data["check-in"], $data["check-out"], $data["user-ID"], $data["room-ID"], $data["price"]);

        if(!$stmt->execute($values)) {
            $stmt = null;
            header("location: " . URLROOT . "home/index?error=insert-data-stmt1");
            exit();
        }

        $last_id = $this->conn()->lastInsertId();
        $stmt = $this->conn()->prepare("INSERT INTO pestana.bookers (First_Name, Family_Name, Birthday, BookerID, ReservationID) VALUES (?, ?, ?, ?, ?);");

        for($i = 0; $i < $n; $i++) {
            $guests = array($data["first-name"][$i], $data["family-name"][$i], $data["bday"][$i], $data["user-ID"], $last_id);

            if(!$stmt->execute($guests)) {
                $stmt = null;
                header("location: " . URLROOT . "home/index?error=insert-data-stmt2");
                exit();
            }
        }

        $stmt = $this->conn()->prepare("UPDATE pestana.users SET Discount = LEAST(Discount + 1, 10) WHERE ID = ?;");

        if(!$stmt->execute(array($data["user-ID"]))) {
            $stmt = null;
            header("location: " . URLROOT . "home/index?error=insert-data-stmt3");
            exit();
        }

        header("location: " . URLROOT . "home/index?booking=success");
        $stmt = null;
    }
}