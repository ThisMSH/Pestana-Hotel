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
    
    public function actived() {
        Controller::load("d_active");
    }
}