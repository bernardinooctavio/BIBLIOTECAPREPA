<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 06/04/2019
 * Time: 09:42 AM
 */

namespace AppData\Model;


class personas
{
    private $tabla = "personas";
    private $id_persona;
    private $id_tipopersona;
    private $nombre;
    private $ap_paterno;
    private $ap_materno;

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
        $sql = "insert into {$this->tabla} values('0','{$this->id_tipopersona}',
         '{$this->nombre}','{$this->ap_paterno}','{$this->ap_materno}')";
        $this->conexion->QuerySimple($sql);

    }
    function getAll()
    {
        $sql = "SELECT personas.id_persona,tipo_persona.descripcion, personas.nombre, personas.ap_paterno, personas.ap_materno 
        FROM personas,tipo_persona 
        WHERE personas.id_tipopersona=tipo_persona.id_tipopersona 
        ORDER BY id_persona ASC ";
        $datos = $this->conexion->QueryResultado($sql);
        return $datos;

    }
    function delete($id)
    {
        $sql = "delete from {$this->tabla} where id_persona='{$id}'";
        $this->conexion->QuerySimple($sql);

    }
    function getOne($id)
    {
        $sql = "select * from  {$this->tabla} where id_persona='{$id}'";
        $datos = $this->conexion->QueryResultado($sql);
        return $datos;

    }
    function update()
    {
        $sql = "update {$this->tabla} set id_tipopersona='{$this->id_tipopersona}',
               nombre='{$this->nombre}', ap_paterno='{$this->ap_paterno}',
               ap_materno='{$this->ap_materno}' where id_persona='{$this->id_persona}'";
        $this->conexion->QuerySimple($sql);

    }
    function verify()
    {

    }
    function graficar()
    {

    }

}