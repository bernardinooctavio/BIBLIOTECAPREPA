<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 30/04/2019
 * Time: 09:09 AM
 */

namespace AppData\Model;


class tipo_adquisicion
{
    private $tabla="tipo_adquisicion";
    private  $id_tipoadquisicion;
    private  $descripcion;

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

        $sql="insert into {$this->tabla} values('0','{$this->descripcion}')";
        $this->conexion->QuerySimple($sql);

    }
    function getAll(){
        $sql="select *from {$this->tabla}";
        $datos=$this->conexion->queryResultado($sql);
        return $datos;
    }
    function update()
    {
        $sql = "update tipo_adquisicion set descripcion='{$this->descripcion}'
                where id_tipoadquisicion='{$this->id_tipoadquisicion}'";
        $this->conexion->QuerySimple($sql);

    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_tipoadquisicion='{$id}'";
        $this->conexion->QuerySimple($sql);

    }
    function getOne($id)
    {
        $sql="select * from  {$this->tabla} where id_tipoadquisicion='{$id}'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }
}