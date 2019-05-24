<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 18/04/2019
 * Time: 04:20 PM
 */

namespace AppData\Model;


class editoriales
{
    private $tabla="editoriales";
    private  $id_editorial;
    private  $nom_editorial;

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

        $sql="insert into {$this->tabla} values('0','{$this->nom_editorial}')";
        $this->conexion->QuerySimple($sql);

    }
    function getAll(){
        $sql="select *from {$this->tabla}";
        $datos=$this->conexion->queryResultado($sql);
        return $datos;
    }
    function update()
    {
        $sql = "update editoriales set nom_editorial='{$this->nom_editorial}'
                where id_editorial='{$this->id_editorial}'";
        $this->conexion->QuerySimple($sql);

    }
    function delete($id)
    {
        $sql="delete from {$this->tabla} where id_editorial='{$id}'";
        $this->conexion->QuerySimple($sql);

    }
    function getOne($id)
    {
        $sql="select * from  {$this->tabla} where id_editorial='{$id}'";
        $datos=$this->conexion->QueryResultado($sql);
        return $datos;
    }


}