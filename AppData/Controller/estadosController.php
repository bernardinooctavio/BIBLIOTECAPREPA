<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 12/04/2019
 * Time: 07:09 PM
 */

namespace AppData\Controller;


class estadosController
{
    private $estados;
    public function __construct()
    {

        $this->estados=new \AppData\Model\estados();

    }

    public function index()
    {

        $datos1=$this->estados->getAll();
        $datos[0]=$datos1;

        return $datos;
    }
    public function crear()
    {
        if($_POST)
        {
            $this->estados->set('descripcion',$_POST["descripcion"]);
            $this->estados->add();
            $datos1=$this->estados->getAll();
            $datos[0]=$datos1;
            return $datos;
        }

    }
    public function eliminar($id)
    {
        $this->estados->delete($id[0]);
        $datos1=$this->estados->getAll();
        $datos[0]=$datos1;
        return $datos;
    }
    public function modificar($id)
    {
        $datos=$this->estados->getOne($id[0]);
        return $datos;
    }
    public function actualizar($id)
    {
        if($_POST)
        {
            $this->estados->set("id_estado",$id[0]);
            $this->estados->set('descripcion',$_POST["descripcion"]);
            $this->estados->update();
            $datos1=$this->estados->getAll();
            $datos[0]=$datos1;
            return $datos;
        }
    }

}