<?php
class BookingController extends BookingModel {
    private $room_info = [];

    public function search() {
        if(isset($_POST["room-type"])) {
            $this->room_info = $this->search_for_room($_POST["room-name"], $_POST["room-type"]);
            if($this->booking_check($_POST["check-in"], $_POST["check-out"], $_POST["room-name"], $_POST["room-type"])) {
                $this->room_info["availability"] = true;
            }else {
                $this->room_info["availability"] = false;
            }
        }else {
            $this->room_info = $this->search_for_room($_POST["room-name"], "");
            if($this->booking_check($_POST["check-in"], $_POST["check-out"], $_POST["room-name"], "")) {
                $this->room_info["availability"] = true;
            }else {
                $this->room_info["availability"] = false;
            }
        }
        Controller::load("search", $this->room_info);
    }
}

// SELECT rooms.* FROM rooms LEFT JOIN reservations
// ON rooms.ID = reservations.RoomID AND (
//     "2023-02-15" BETWEEN reservations.Check_In AND reservations.Check_Out
//     OR "2023-02-16" BETWEEN reservations.Check_In AND reservations.Check_Out
//     OR (
//         "2023-02-15" <= reservations.Check_In AND "2023-02-16" >= reservations.Check_Out
//     )
// )
// WHERE reservations.RoomID IS NULL AND rooms.Room_Name = "Double" AND rooms.Room_Type = "";