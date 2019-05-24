<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 29/04/2019
 * Time: 04:45 PM
 */

namespace AppData\Model;


class autores
{
    private $tabla="autores";
    private  $id_autor;
    private  $nombre;
    private  $a_paterno;
    private  $a_materno;

    function __construct()
    {
        $this->conexion = new conexion();

    }
    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }
    public function get($atributo)
    {
        return $this->$atributo;
    }
    function add()
    {
        $sql = "insert into {$this->tabla} values('0','{$this->id_autor}',
         '{$this->nombre}','{$this->a_paterno}','{$this->a_materno}')";
        $this->conexion->QuerySimple($sql);

    }
    function getAll()
    {
        $sql = "SELECT autores.id_autor,autores.nombre, autores.a_paterno, autores.a_materno 
        FROM autores 
        ORDER BY id_autor ASC ";
        $datos = $this->conexion->QueryResultado($sql);
        return $datos;

    }
    function delete($id)
    {
        $sql = "delete from {$this->tabla} where id_autor='{$id}'";
        $this->conexion->QuerySimple($sql);

    }
    function getOne($id)
    {
        $sql = "select * from  {$this->tabla} where id_autor='{$id}'";
        $datos = $this->conexion->QueryResultado($sql);
        return $datos;

    }
    function update()
    {
        $sql = "update {$this->tabla} set nombre='{$this->nombre}', a_paterno='{$this->a_paterno}',
               a_materno='{$this->a_materno}' where id_autor='{$this->id_autor}'";
        $this->conexion->QuerySimple($sql);

    }
    function verify()
    {

    }
    function graficar()
    {

    }

}