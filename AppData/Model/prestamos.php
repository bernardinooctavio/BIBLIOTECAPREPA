<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 16/05/2019
 * Time: 04:08 PM
 */

namespace AppData\Model;


class prestamos
{
	private $tabla = "prestamos";
	private $id_persona;
    private $grado;
    private $grupo;
    private $id_libro;
    private $id_autor;
    private $fecha_prestamo;
    private $fecha_devolucion;
    
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
        $sql = "insert into {$this->tabla} values('0','{$this->id_persona}',
         '{$this->id_grado}','{$this->id_grupo}','{$this->id_libro}'
         ,'{$this->id_editorial}','{$this->fecha_prestamo}','{$this->fecha_devolucion}')";
        $this->conexion->QuerySimple($sql);
    }

    function getAll()
    {
        $sql = "SELECT prestamos.id_prestamo, tipo_persona.descripcion, personas.nombre, personas.ap_paterno, personas.ap_materno, autores.nombre, editoriales.nom_editorial,tipo_libro.descripcion, libros.cantidad, tipo_adquisicion.descripcion 
        FROM libros,autores,editoriales,tipo_libro, tipo_adquisicion 
        WHERE libros.id_autor=autores.id_autor 
        AND libros.id_editorial=editoriales.id_editorial 
        AND libros.id_tipolibro=tipo_libro.id_tipolibro
         AND libros.id_tipoadquisicion=tipo_adquisicion.id_tipoadquisicion ORDER BY id_libro ASC ";
        $datos = $this->conexion->QueryResultado($sql);
        return $datos;
    }



    function delete($id)
    {
        $sql = "delete from {$this->tabla} where id_prestamo='{$id}'";
        $this->conexion->QuerySimple($sql);
    }

    function getOne($id)
    {
        $sql = "select * from  {$this->tabla} where id_prestamo='{$id}'";
        $datos = $this->conexion->QueryResultado($sql);
        return $datos;
    }

    function update()
    {
        $sql = "update {$this->tabla} set codigo='{$this->codigo}',
               titulo='{$this->titulo}', id_autor='{$this->id_autor}',
               id_editorial='{$this->id_editorial}', id_tipolibro='{$this->id_tipolibro}',
                cantida='{$this->cantidad}', id_tipoadquisicion='{$this->id_tipoadquisicion}' where id_libro='{$this->id_libro}'";
        $this->conexion->QuerySimple($sql);
    }

    function verify()
    {

    }

    function graficar()
    {

    }

}