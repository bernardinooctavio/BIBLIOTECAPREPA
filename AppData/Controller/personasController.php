<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 06/04/2019
 * Time: 09:34 AM
 */

namespace AppData\Controller;


class personasController
{
    private $personas,$tipo_persona;
    public function __construct()
    {
        $this->personas= new \AppData\Model\personas();
        $this->tipo_persona=new \AppData\Model\tipo_persona();

    }

    public function index()
    {
        $datos1=$this->personas->getAll();
        $datos2=$this->tipo_persona->getAll();
        $datos[0]=$datos1;
        $datos[1]=$datos2;
        return $datos;


    }
    public function crear()
    {
        if ($_POST)
        {
            $this->personas->set('id_tipopersona',$_POST["id_tipopersona"]);
            $this->personas->set('nombre',$_POST["nombre"]);
            $this->personas->set('ap_paterno',$_POST["ap_paterno"]);
            $this->personas->set('ap_materno',$_POST["ap_materno"]);


            $this->personas->add();
            $datos1=$this->personas->getAll();
            $datos[0]=$datos1;
            return $datos;

        }

    }
    public function eliminar($id)
    {
        $this->personas->delete($id[0]);
        $datos1=$this->personas->getAll();
        $datos[0]=$datos1;
        return $datos;

    }
    public function modificar($id)
    {
        $datos=$this->personas->getOne($id[0]);
        return $datos;

    }
    public function actualizar($id)
    {
        if ($_POST)
        {
            $this->personas->set("id_persona",$id[0]);
            $this->personas->set('id_tipopersona',$_POST["id_tipopersona"]);
            $this->personas->set('nombre',$_POST["nombre"]);
            $this->personas->set('ap_paterno',$_POST["ap_paterno"]);
            $this->personas->set('ap_materno',$_POST["ap_materno"]);
            $this->personas->update();
            $datos1=$this->personas->getAll();
            $datos[0]=$datos1;
            return $datos;

        }
    }
    public function print_pdf()
    {
        $datos=$this->personas->getAll();
        return $datos;

    }
    public function graficar()
    {
        $datos=$this->personas->graficar();
        return $datos;

    }



}