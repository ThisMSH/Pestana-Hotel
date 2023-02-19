<?php

class SigninController extends SigninModel {
    private $user;
    private $password;

    public function login() {
        Controller::load("signIn");
    }

    public function signing() {
        if(isset($_POST["submit"])) {
            $this->user = $_POST["user"];
            $this->password = $_POST["password"];

            $this->get_user();

            header("location: " . URLROOT . "home/index");
            exit();
        }
    }
    
    public function get_user() {
        if($this->empty_input() == false) {
            header("location: " . URLROOT . "signin/login?error=empty");
            exit();
        }
        $this->signin_user($this->user, $this->password);
    }

    private function empty_input() {
        $result;
        if(empty($this->user) || empty($this->password)) {
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }
}