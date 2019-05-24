<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 06/04/2019
 * Time: 04:15 PM
 */

namespace AppData\Controller;


class gradosController
{
    private $grados;
    public function __construct()
    {

        $this->grados=new \AppData\Model\grados();

    }

    public function index()
    {

        $datos1=$this->grados->getAll();
        $datos[0]=$datos1;

        return $datos;
    }
    public function crear()
    {
        if($_POST)
        {
            $this->grados->set('grado',$_POST["grado"]);
            $this->grados->add();
            $datos1=$this->grados->getAll();
            $datos[0]=$datos1;
            return $datos;
        }

    }
    public function eliminar($id)
    {
        $this->grados->delete($id[0]);
        $datos1=$this->grados->getAll();
        $datos[0]=$datos1;
        return $datos;
    }
    public function modificar($id)
    {
        $datos=$this->grados->getOne($id[0]);
        return $datos;
    }
    public function actualizar($id)
    {
        if($_POST)
        {
            $this->grados->set("id_grado",$id[0]);
            $this->grados->set('grado',$_POST["grado"]);
            $this->grados->update();
            $datos1=$this->grados->getAll();
            $datos[0]=$datos1;
            return $datos;
        }
    }

}