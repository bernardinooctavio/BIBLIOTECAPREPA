<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 06/04/2019
 * Time: 04:16 PM
 */

namespace AppData\Model;


class grados
{
    private $tabla="grados";
    private  $id_grado;
    private  $grado;

    function __construct()
    {
        $this->conexion=new conexion();
    }
    public function set($atributo, $valor)
    {
        $this->$atributo=$valor;
    }

    public function get($atributo)
    {
        return $this->$atributo;
    }

    function add()
    {

        $sql="insert into {$this->tabla} values('0','{$this->grado}')";
        $this->conexion->QuerySimple($sql);

    }
    function getAll(){
        $sql="select *from {$this->tabla}";
        $datos=$this->conexion->queryResultado($sql);
        return $datos;
    }
    function update()
    {
        $sql = "update grados set grado='{$this->grado}'
                where id_grado='{$this->id_grado}'";
        $this->conexion->QuerySimple($sql);

    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_grado='{$id}'";
        $this->conexion->QuerySimple($sql);

    }
    function getOne($id)
    {
        $sql="select * from  {$this->tabla} where id_grado='{$id}'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }

}