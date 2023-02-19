<?php

class SigninModel extends Db {

    protected function signin_user($user, $password) {
        $stmt = $this->conn()->prepare("SELECT Password FROM pestana.users WHERE Username = ? OR Email = ?;");

        if(!$stmt->execute(array($user, $user))) {
            $stmt = null;
            header("location: " . URLROOT . "signin/login?error=stmt1_failed");
            exit();
        }
        
        if($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: " . URLROOT . "signin/login?error=wrong1");
            exit();
        }

        $hashedPassword = $stmt->fetch(PDO::FETCH_ASSOC);
        $checkingPassword = password_verify($password, $hashedPassword["Password"]);

        if($checkingPassword == false) {
            $stmt = null;
            header("location: " . URLROOT . "signin/login?error=wrong2");
            exit();
        }elseif ($checkingPassword == true) {
            $stmt = $this->conn()->prepare("SELECT * FROM pestana.users WHERE UserName = ? OR Email = ?;");

            if(!$stmt->execute(array($user, $user))) {
                $stmt = null;
                header("location: " . URLROOT . "signin/login?error=stmt2_failed");
                exit();
            }

            if($stmt->rowCount() == 0) {
                $stmt = null;
                header("location: " . URLROOT . "signin/login?error=no_users");
                exit();
            }

            $userInfo = $stmt->fetch(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION['id'] = $userInfo["ID"];
            $_SESSION['username'] = $userInfo["Username"];
            $_SESSION['first-name'] = $userInfo["First_Name"];
            $_SESSION['family-name'] = $userInfo["Family_Name"];
            $_SESSION['email'] = $userInfo["Email"];
            $_SESSION['phone'] = $userInfo["Phone_Number"];
            $_SESSION['birthday'] = $userInfo["Birthday"];
            $_SESSION['discount'] = $userInfo["Discount"];
            $_SESSION['admin'] = $userInfo["Admin"];
        }
        $stmt = null;
    }
}