<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 22/03/2019
 * Time: 11:51 AM
 */

namespace AppData\Model;
class Empleado_Bienvenido
{
    function __construct()
    {
        $this->conexion=new conexion();
    }

    public function set($atributo,$valor)
    {
        $this->$atributo=$valor;
    }

    public function get($atributo)
    {
        return $this->$atributo;
    }

    function add(){

    }

    function delete($id)
    {

    }

    function getAll()
    {
    }

    function getOne($id)
    {
    }
    function update()
    {
    }
    function verify(){

    }

}