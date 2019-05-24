<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 29/04/2019
 * Time: 05:33 PM
 */

namespace AppData\Controller;


class tipo_libroController
{
    private $tipo_libro;
    public function __construct()
    {

        $this->tipo_libro=new \AppData\Model\tipo_libro();

    }

    public function index()
    {

        $datos1=$this->tipo_libro->getAll();
        $datos[0]=$datos1;

        return $datos;
    }
    public function crear()
    {
        if($_POST)
        {
            $this->tipo_libro->set('descripcion',$_POST["descripcion"]);
            $this->tipo_libro->add();
            $datos1=$this->tipo_libro->getAll();
            $datos[0]=$datos1;
            return $datos;
        }

    }
    public function eliminar($id)
    {
        $this->tipo_libro->delete($id[0]);
        $datos1=$this->tipo_libro->getAll();
        $datos[0]=$datos1;
        return $datos;
    }
    public function modificar($id)
    {
        $datos=$this->tipo_libro->getOne($id[0]);
        return $datos;
    }
    public function actualizar($id)
    {
        if($_POST)
        {
            $this->tipo_libro->set("id_tipolibro",$id[0]);
            $this->tipo_libro->set('descripcion',$_POST["descripcion"]);
            $this->tipo_libro->update();
            $datos1=$this->tipo_libro->getAll();
            $datos[0]=$datos1;
            return $datos;
        }
    }

}