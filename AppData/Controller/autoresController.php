<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 29/04/2019
 * Time: 04:38 PM
 */

namespace AppData\Controller;


class autoresController
{
    private $autores;
    public function __construct()
    {

        $this->autores=new \AppData\Model\autores();

    }

    public function index()
    {

        $datos1=$this->autores->getAll();
        $datos[0]=$datos1;

        return $datos;
    }
    public function crear()
    {
        if($_POST)
        {
            $this->autores->set('nombre',$_POST["nombre"]);
            $this->autores->set('a_paterno',$_POST["a_paterno"]);
            $this->autores->set('a_materno',$_POST["a_materno"]);
            $this->autores->add();
            $datos1=$this->autores->getAll();
            $datos[0]=$datos1;
            return $datos;
        }

    }
    public function eliminar($id)
    {
        $this->autores->delete($id[0]);
        $datos1=$this->autores->getAll();
        $datos[0]=$datos1;
        return $datos;
    }
    public function modificar($id)
    {
        $datos=$this->autores->getOne($id[0]);
        return $datos;
    }
    public function actualizar($id)
    {
        if($_POST)
        {
            $this->autores->set("id_autor",$id[0]);
            $this->autores->set('nombre',$_POST["nombre"]);
            $this->autores->set('a_paterno',$_POST["a_paterno"]);
            $this->autores->set('a_materno',$_POST["a_materno"]);
            $this->autores->update();
            $datos1=$this->autores->getAll();
            $datos[0]=$datos1;
            return $datos;
        }
    }

}