<?php
class HomeController extends HomeModel {
    public function index() {
        Controller::load("index");
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("location: " . URLROOT . "home/index");
    }

    public function get_room_names_capacities() {
        return $this->fetch_room_names_capacities();
    }

    public function get_room_types() {
        return $this->fetch_room_types();
    }
    
    public function booking() {
        $id = array(4);
        Controller::load("booking", $id);
    }
}