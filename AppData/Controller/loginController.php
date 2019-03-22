<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 22/03/2019
 * Time: 12:11 PM
 */

namespace AppData\Controller;


class loginController
{
    private $login;

    public function __construct()
    {
        $this->login= new \AppData\Model\Login();
    }

    public function index()
    {
        //session_destroy();
    }
    public function verify()
    {
        $_SESSION["error_login"]="";

        if(isset($_POST)) {
            $this->login->set("email", $_POST["email"]);
            $this->login->set("pass", $_POST["password"]);
            $datos = $this->login->verify();
            if (mysqli_num_rows($datos) > 0) {
                $datos=mysqli_fetch_assoc($datos);
                $_SESSION["username"]=$datos["email"];
                header("Location:" . URL . "Empleado_bienvenido");

            }
            else {
                $_SESSION["error_login"] = "los datos no coinciden con nuestros registros";
                header("Location:" . URL . "login");
            }
        }
    }
    public function logout()
    {
        session_destroy();
        // header("Location:".URL);
    }

}