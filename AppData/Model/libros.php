<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 30/04/2019
 * Time: 08:29 AM
 */

namespace AppData\Model;


class libros
{
    private $tabla = "libros";
    private $id_libro;
    private $codigo;
    private $titulo;
    private $id_autor;
    private $id_editorial;
    private $id_tipolibro;
    private $cantidad;
    private $id_tipoadquisicion;

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
        $sql = "insert into {$this->tabla} values('0','{$this->codigo}',
         '{$this->titulo}','{$this->id_autor}','{$this->id_editorial}'
         ,'{$this->id_tipolibro}','{$this->cantidad}','{$this->id_tipoadquisicion}')";
        $this->conexion->QuerySimple($sql);
    }

    function getAll()
    {
        $sql = "SELECT libros.id_libro, libros.codigo, libros.titulo, autores.nombre, autores.a_paterno, autores.a_materno, editoriales.nom_editorial,tipo_libro.descripcion, libros.cantidad, tipo_adquisicion.descripcion 
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
        $sql = "delete from {$this->tabla} where id_libro='{$id}'";
        $this->conexion->QuerySimple($sql);
    }

    function getOne($id)
    {
        $sql = "select * from  {$this->tabla} where id_libro='{$id}'";
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