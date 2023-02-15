<?php
class HomeController extends HomeModel {
    public function index() {
        Controller::load("index");
    }

    public function get_room_types() {
        return $this->fetch_room_types();
    }
    
    public function get_room_capacities() {
        return $this->fetch_room_capacities();
    }
}