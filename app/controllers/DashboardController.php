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