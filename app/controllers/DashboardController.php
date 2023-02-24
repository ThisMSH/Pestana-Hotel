<?php
class DashboardController extends DashboardModel {
    public $id;

    public function my_profile() {
        $this->fetch_reservations_count($this->id);
        Controller::load("d_profile");
    }
    
    public function my_booking() {
        $this->fetch_reservations($this->id);
        $this->fetch_bookers($this->id);
        Controller::load("d_booking");
    }

    public function update_bookers() {
        if(isset($_POST["submit"])) {
            $data = array(
                "first-name" => $_POST["first-name"],
                "family-name" => $_POST["family-name"],
                "bday" => $_POST["bday"],
                "id" => $_POST["reservation-id"]
            );
        }
        $cnt = count($_POST["bday"]);

        $this->update_data($data, $cnt);
    }
    
    public function rooms_manage() {
        Controller::load("d_profile");
    }
    
    public function actived() {
        Controller::load("d_profile");
    }
    
    public function canceled() {
        Controller::load("d_profile");
    }
}