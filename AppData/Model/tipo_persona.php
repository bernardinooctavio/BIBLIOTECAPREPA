<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 06/04/2019
 * Time: 10:51 AM
 */

namespace AppData\Model;


class tipo_persona
{
    private $tabla="tipo_persona";
    private  $id_tipopersona;
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
        $sql = "update tipo_persona set descripcion='{$this->descripcion}'
                where id_tipopersona='{$this->id_tipopersona}'";
        $this->conexion->QuerySimple($sql);

    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_tipopersona='{$id}'";
        $this->conexion->QuerySimple($sql);

    }
    function getOne($id)
    {
        $sql="select * from  {$this->tabla} where id_tipopersona='{$id}'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }

}