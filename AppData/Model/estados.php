<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 12/04/2019
 * Time: 07:15 PM
 */

namespace AppData\Model;


class estados
{
    private $tabla="estados";
    private  $id_estado;
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
        $sql = "update estados set descripcion='{$this->descripcion}'
                where id_estado='{$this->id_estado}'";
        $this->conexion->QuerySimple($sql);

    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_estado='{$id}'";
        $this->conexion->QuerySimple($sql);

    }
    function getOne($id)
    {
        $sql="select * from  {$this->tabla} where id_estado='{$id}'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }

}