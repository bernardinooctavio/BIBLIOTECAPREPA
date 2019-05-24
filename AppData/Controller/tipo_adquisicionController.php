<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 30/04/2019
 * Time: 09:09 AM
 */

namespace AppData\Controller;


class tipo_adquisicionController
{
    private $tipo_adquisicion;
    public function __construct()
    {

        $this->tipo_adquisicion=new \AppData\Model\tipo_adquisicion();

    }

    public function index()
    {

        $datos1=$this->tipo_adquisicion->getAll();
        $datos[0]=$datos1;

        return $datos;
    }
    public function crear()
    {
        if($_POST)
        {
            $this->tipo_adquisicion->set('descripcion',$_POST["descripcion"]);
            $this->tipo_adquisicion->add();
            $datos1=$this->tipo_adquisicion->getAll();
            $datos[0]=$datos1;
            return $datos;
        }

    }
    public function eliminar($id)
    {
        $this->tipo_adquisicion->delete($id[0]);
        $datos1=$this->tipo_adquisicion->getAll();
        $datos[0]=$datos1;
        return $datos;
    }
    public function modificar($id)
    {
        $datos=$this->tipo_adquisicion->getOne($id[0]);
        return $datos;
    }
    public function actualizar($id)
    {
        if($_POST)
        {
            $this->tipo_adquisicion->set("id_tipoadquisicion",$id[0]);
            $this->tipo_adquisicion->set('descripcion',$_POST["descripcion"]);
            $this->tipo_adquisicion->update();
            $datos1=$this->tipo_adquisicion->getAll();
            $datos[0]=$datos1;
            return $datos;
        }
    }

}