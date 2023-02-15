<?php

class SignupController extends SignupModel {
    private $name;
    private $fname;
    private $bday;
    private $phone;
    private $username;
    private $email;
    private $password;
    private $passwordRepeat;

    // public function __construct($name, $un, $email, $pass, $passR) {
    //     $this->name = trim($name);
    //     $this->username = trim($un);
    //     $this->password = $pass;
    //     $this->passwordRepeat = $passR;
    //     $this->email = trim($email);
    // }
    public function register() {
        Controller::load("signUp");
    }

    public function signing_up() {
        if(isset($_POST["submit"])) {
            $this->name = trim($_POST["firstname"]);
            $this->fname = trim($_POST["familyname"]);
            $this->bday = $_POST["bday"];
            $this->phone = $_POST["phone"];
            $this->username = $_POST["username"];
            $this->email = trim($_POST["email"]);
            $this->password = $_POST["password"];
            $this->passwordRepeat = $_POST["conpassword"];
            
            $this->sign_up_user();

            header("location: " . URLROOT . "signin/login?account=success");
            exit();
        }
    }

    public function sign_up_user() {

        if ($this->empty_inputs() == false) {
            header("location: " . URLROOT . "signup/register?error=empty");
            exit();
        }
        if ($this->invalid_first_name() == false) {
            header("location: " . URLROOT . "signup/register?error=firstname_invalid");
            exit();
        }
        if ($this->invalid_family_name() == false) {
            header("location: " . URLROOT . "signup/register?error=familyname_invalid");
            exit();
        }
        if ($this->invalid_birthday() == false) {
            header("location: " . URLROOT . "signup/register?error=bday_invalid");
            exit();
        }
        if ($this->invalid_phone() == false) {
            header("location: " . URLROOT . "signup/register?error=phone_invalid");
            exit();
        }
        if ($this->invalid_username() == false) {
            header("location: " . URLROOT . "signup/register?error=username_invalid");
            exit();
        }
        if ($this->invalid_email() == false) {
            header("location: " . URLROOT . "signup/register?error=email_invalid");
            exit();
        }
        if ($this->invalid_password() == false) {
            header("location: " . URLROOT . "signup/register?error=pwd_invalid");
            exit();
        }
        if ($this->password_match_check() == false) {
            header("location: " . URLROOT . "signup/register?error=Rpwd_invalid");
            exit();
        }
        if ($this->email_taken_check() == false) {
            header("location: " . URLROOT . "signup/register?error=email_taken");
            exit();
        }
        if ($this->username_taken_check() == false) {
            header("location: " . URLROOT . "signup/register?error=username_taken");
            exit();
        }
        
        $this->set_user($this->name, $this->fname, $this->bday, $this->phone, $this->username, $this->email, $this->password);
    }

    private function empty_inputs() {
        $result;
        if (empty($this->name) || empty($this->fname) || empty($this->bday) || empty($this->phone) || empty($this->username) || empty($this->email) || empty($this->password) || empty($this->passwordRepeat)) {
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

    private function invalid_first_name() {
        $result;
        if (!preg_match("/^(?=.{3,32}$)[a-z]+(?: [a-z]+)?$/i", $this->name)) {
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

    private function invalid_family_name() {
        $result;
        if (!preg_match("/^(?=.{3,32}$)[a-z]+(?: [a-z]+){0,2}$/i", $this->fname)) {
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

    private function invalid_birthday() {
        $result;
        if (!preg_match("/^(?:19|20)\d{2}-(?:0[1-9]|1[012])-(?:0[1-9]|[12]\d|3[01])$/", $this->bday)) {
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

    private function invalid_phone() {
        $result;
        if (!preg_match("/^(0|\+212|00212)\d{9}$/", $this->phone)) {
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

    private function invalid_username() {
        $result;
        if (!preg_match("/^[a-z\d]{5,16}$/i", $this->username)) {
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

    private function invalid_email() {
        $result;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

    private function invalid_password() {
        $result;
        if(!preg_match("/^(?=.*[\d])(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d!@#$%^&*]{8,36}$/", $this->password)) {
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

    private function password_match_check() {
        $result;
        if ($this->password !== $this->passwordRepeat) {
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

    private function email_taken_check() {
        $result;
        if (!$this->check_email($this->email)) {
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

    private function username_taken_check() {
        $result;
        if (!$this->check_user($this->username)) {
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }
}