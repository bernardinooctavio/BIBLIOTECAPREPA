<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 29/04/2019
 * Time: 05:40 PM
 */

namespace AppData\Model;


class tipo_libro
{
    private $tabla="tipo_libro";
    private  $id_tipolibro;
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
        $sql = "update tipo_libro set descripcion='{$this->descripcion}'
                where id_tipolibro='{$this->id_tipolibro}'";
        $this->conexion->QuerySimple($sql);

    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_tipolibro='{$id}'";
        $this->conexion->QuerySimple($sql);

    }
    function getOne($id)
    {
        $sql="select * from  {$this->tabla} where id_tipolibro='{$id}'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }

}