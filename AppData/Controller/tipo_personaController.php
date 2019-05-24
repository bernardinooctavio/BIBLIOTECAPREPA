<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 06/04/2019
 * Time: 10:52 AM
 */

namespace AppData\Controller;


class tipo_personaController
{
    private $tipo_persona;
    public function __construct()
    {

        $this->tipo_persona=new \AppData\Model\tipo_persona();

    }

    public function index()
    {

        $datos1=$this->tipo_persona->getAll();
        $datos[0]=$datos1;

        return $datos;
    }
    public function crear()
    {
        if($_POST)
        {
            $this->tipo_persona->set('descripcion',$_POST["descripcion"]);
            $this->tipo_persona->add();
            $datos1=$this->tipo_persona->getAll();
            $datos[0]=$datos1;
            return $datos;
        }

    }
    public function eliminar($id)
    {
        $this->tipo_persona->delete($id[0]);
        $datos1=$this->tipo_persona->getAll();
        $datos[0]=$datos1;
        return $datos;
    }
    public function modificar($id)
    {
        $datos=$this->tipo_persona->getOne($id[0]);
        return $datos;
    }
    public function actualizar($id)
    {
        if($_POST)
        {
            $this->tipo_persona->set("id_tipopersona",$id[0]);
            $this->tipo_persona->set('descripcion',$_POST["descripcion"]);
            $this->tipo_persona->update();
            $datos1=$this->tipo_persona->getAll();
            $datos[0]=$datos1;
            return $datos;
        }
    }

}