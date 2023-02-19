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
}