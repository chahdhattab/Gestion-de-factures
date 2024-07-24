<?php

class LoginCont extends Login {
    private $uid;
    private $pwd;

    public function __construct($uid, $pwd) {
        $this->uid = $uid;
        $this->pwd = $pwd;
    }

    public function loginUser() {
        if ($this->emptyInput() == false) {
            header("Location: ../login.php?error=emptyinput");
            exit();
        }
        $this->getUser($this->uid, $this->pwd);
    }

    private function emptyInput() {
        return !empty($this->uid) && !empty($this->pwd);
    }
}


