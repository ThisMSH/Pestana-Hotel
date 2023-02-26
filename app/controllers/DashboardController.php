<?php
class DashboardController extends DashboardModel {
    public $id;

    public function my_profile() {
        $this->fetch_reservations_count($this->id);
        Controller::load("d_profile");
    }
    
    public function my_booking() {
        Controller::load("d_booking");
    }

    public function update_bookers() {
        if(isset($_POST["submit"])) {
            $data = array(
                "first-name" => $_POST["first-name"],
                "family-name" => $_POST["family-name"],
                "bday" => $_POST["bday"],
                "id" => $_POST["booker-id"]
            );
        }

        $cnt = count($_POST["bday"]);

        $this->update_data($data, $cnt);
    }

    public function cancel_booking($id) {
        $this->cancel_reservation($id, $_SESSION['id']);
    }
    
    public function rooms_manage() {
        $data = $this->fetch_rooms();
        Controller::load("d_manage", $data);
    }

    public function add_room() {
        if(isset($_POST["submit"]) && !empty($_POST["room-name"]) && !empty($_POST["room-capacity"]) && !empty($_POST["room-price"]) && !empty($_FILES["room-image"])) {
            $data = array(
                "name" => $_POST["room-name"],
                "type" => $_POST["room-type"],
                "capacity" => $_POST["room-capacity"],
                "price" => $_POST["room-price"],
                "img" => $_FILES["room-image"]
            );

            $this->add_new_room($data);
        }
    }

    public function update_room() {
        if(isset($_POST["submit"]) && !empty($_POST["id"])) {
            $data = array(
                "name" => $_POST["room-name"],
                "type" => $_POST["room-type"],
                "capacity" => $_POST["room-capacity"],
                "price" => $_POST["room-price"],
                "img" => $_FILES["room-image"],
                "id" => $_POST["id"]
            );

            $this->updating_room($data);
        }
    }

    public function delete_room($id) {
        $this->deleting_room($id);
    }
    
    public function actived() {
        $data = $this->fetch_all_reservations_users_count();
        Controller::load("d_reservations", $data);
    }
}