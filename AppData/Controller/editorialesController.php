<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 18/04/2019
 * Time: 04:17 PM
 */

namespace AppData\Controller;


class editorialesController
{
    private $editoriales;
    public function __construct()
    {

        $this->editoriales=new \AppData\Model\editoriales();

    }

    public function index()
    {

        $datos1=$this->editoriales->getAll();
        $datos[0]=$datos1;

        return $datos;
    }
    public function crear()
    {
        if($_POST)
        {
            $this->editoriales->set('nom_editorial',$_POST["nom_editorial"]);
            $this->editoriales->add();
            $datos1=$this->editoriales->getAll();
            $datos[0]=$datos1;
            return $datos;
        }

    }
    public function eliminar($id)
    {
        $this->editoriales->delete($id[0]);
        $datos1=$this->editoriales->getAll();
        $datos[0]=$datos1;
        return $datos;
    }
    public function modificar($id)
    {
        $datos=$this->editoriales->getOne($id[0]);
        return $datos;
    }
    public function actualizar($id)
    {
        if($_POST)
        {
            $this->editoriales->set("id_editorial",$id[0]);
            $this->editoriales->set('nom_editorial',$_POST["nom_editorial"]);
            $this->editoriales->update();
            $datos1=$this->editoriales->getAll();
            $datos[0]=$datos1;
            return $datos;
        }
    }


}