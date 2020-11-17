<?php
session_start();
class Authoris_sess {
private $_lg = "user";
private $_pass = "php";
	public function maybe() {
        if (isset($_SESSION["login"])) {
            return $_SESSION["login"];
        }
        else return false;
        }


public function auth($lg, $pass) {
        if ($lg == $this->_lg && $pass == $this->_pass) {
            $_SESSION["login"] = true;
            $_SESSION["login"] = $lg;
            return true;
        }
        else {
            $_SESSION["login"] = false;
            return false;
        }
    }

public function give_login() {
        if ($this->maybe()) {
            return $_SESSION["login"];
        }
    }
public function vihod() {
        $_SESSION = array();
        session_destroy();
    }

}
$auth = new Authoris_sess();
if (isset($_POST["login"]) && isset($_POST["password"])) {
    if (!$auth->auth($_POST["login"], $_POST["password"])) {
        echo "<h2 style=\"color:red;margin:300px;\">Неправильный пароль или логин!</h2>";
    }
    else
    {
    	echo "<h2 style=\"color:blue;\margin:200px;\">Вы вошли.</h2>";
    }
if (isset($_GET["exit"])) {
    if ($_GET["exit"] == 1) {
        $auth->vihod();
        header("Location: ?exit=0");
    }
}
}
?>