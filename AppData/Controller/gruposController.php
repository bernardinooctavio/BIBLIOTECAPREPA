<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 06/04/2019
 * Time: 05:06 PM
 */

namespace AppData\Controller;


class gruposController
{
    private $grupos;
    public function __construct()
    {

        $this->grupos=new \AppData\Model\grupos();

    }

    public function index()
    {

        $datos1=$this->grupos->getAll();
        $datos[0]=$datos1;

        return $datos;
    }
    public function crear()
    {
        if($_POST)
        {
            $this->grupos->set('grupos',$_POST["grupos"]);
            $this->grupos->add();
            $datos1=$this->grupos->getAll();
            $datos[0]=$datos1;
            return $datos;
        }

    }
    public function eliminar($id)
    {
        $this->grupos->delete($id[0]);
        $datos1=$this->grupos->getAll();
        $datos[0]=$datos1;
        return $datos;
    }
    public function modificar($id)
    {
        $datos=$this->grupos->getOne($id[0]);
        return $datos;
    }
    public function actualizar($id)
    {
        if($_POST)
        {
            $this->grupos->set("id_grado",$id[0]);
            $this->grupos->set('grupos',$_POST["grupos"]);
            $this->grupos->update();
            $datos1=$this->grupos->getAll();
            $datos[0]=$datos1;
            return $datos;
        }
    }


}