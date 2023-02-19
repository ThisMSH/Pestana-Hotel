<?php

class SignupModel extends Db {
    protected function set_user($name, $fname, $bday, $phone, $username, $email, $password) {
        $stmt = $this->conn()->prepare("INSERT INTO pestana.users (First_Name, Family_Name, Phone_Number, Birthday, Username, Email, Password) VALUES (?, ?, ?, ?, ?, ?, ?);");

        $hashingPassword = password_hash($password, PASSWORD_DEFAULT);

        if(!$stmt->execute(array($name, $fname, $phone, $bday, $username, $email, $hashingPassword))) {
            $stmt = null;
            header("location: " . URLROOT . "signup/register?error=signup_stmt_failed");
            exit();
        }

        $stmt = null;
    }

    protected function check_user($username) {
        $stmt = $this->conn()->prepare("SELECT ID FROM pestana.users WHERE Username = :username;");
        $stmt->bindParam(":username", $username);

        if(!$stmt->execute()) {
            $stmt = null;
            header("location: " . URLROOT . "signup/register?error=usercheck_stmt_failed");
            exit();
        }

        $resultCheck;

        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        }else {
            $resultCheck = true;
        }
        return $resultCheck;
    }

    protected function check_email($email) {
        $stmt = $this->conn()->prepare("SELECT ID FROM pestana.users WHERE Email = ?;");

        if(!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: " . URLROOT . "signup/register?error=emailcheck_stmt_failed");
            exit();
        }

        $resultCheck;

        if($stmt->rowCount() > 0) {
            $resultCheck = false;
        }else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
}