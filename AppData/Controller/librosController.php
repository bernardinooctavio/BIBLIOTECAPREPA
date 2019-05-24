<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 30/04/2019
 * Time: 08:29 AM
 */

namespace AppData\Controller;


class librosController
{
    private $libros,$autores,$editoriales,$tipo_libro,$tipo_adquisicion;
    public function __construct()
    {

        $this->libros=new \AppData\Model\libros();
        $this->autores=new \AppData\Model\autores();
        $this->editoriales=new \AppData\Model\editoriales();
        $this->tipo_libro=new \AppData\Model\tipo_libro();
        $this->tipo_adquisicion=new \AppData\Model\tipo_adquisicion();

    }

    public function index()
    {

        $datos1=$this->libros->getAll();
        $datos2=$this->autores->getAll();
        $datos3=$this->editoriales->getAll();
        $datos4=$this->tipo_libro->getAll();
        $datos5=$this->tipo_adquisicion->getAll();
        $datos[0]=$datos1;
        $datos[1]=$datos2;
        $datos[2]=$datos3;
        $datos[3]=$datos4;
        $datos[4]=$datos5;


        return $datos;
    }
    public function crear()
    {
        if($_POST)
        {
            $this->libros->set('codigo',$_POST["codigo"]);
            $this->libros->set('titulo',$_POST["titulo"]);
            $this->libros->set('id_autor',$_POST["id_autor"]);
            $this->libros->set('id_editorial',$_POST["id_editorial"]);
            $this->libros->set('id_tipolibro',$_POST["id_tipolibro"]);
            $this->libros->set('cantidad',$_POST["cantidad"]);
            $this->libros->set('id_tipoadquisicion',$_POST["id_tipoadquisicion"]);
            $this->libros->add();
            $datos1=$this->libros->getAll();
            $datos[0]=$datos1;
            return $datos;
        }

    }
    public function eliminar($id)
    {
        $this->libros->delete($id[0]);
        $datos1=$this->libros->getAll();
        $datos[0]=$datos1;
        return $datos;
    }
    public function modificar($id)
    {
        $datos=$this->libros->getOne($id[0]);
        return $datos;
    }
    public function actualizar($id)
    {
        if($_POST)
        {
            $this->libros->set("id_tipolibro",$id[0]);
            $this->libros->set('codigo',$_POST["codigo"]);
            $this->libros->set('titulo',$_POST["titulo"]);
            $this->libros->set('id_autor',$_POST["id_autor"]);
            $this->libros->set('id_editorial',$_POST["id_editorial"]);
            $this->libros->set('id_tipolibro',$_POST["id_tipolibro"]);
            $this->libros->set('cantidad',$_POST["cantidad"]);
            $this->libros->set('id_tipoadquisicion',$_POST["id_tipoadquisicion"]);
            $this->libros->update();
            $datos1=$this->libros->getAll();
            $datos[0]=$datos1;
            $datos[1]=$datos2;
            $datos[2]=$datos3;
            $datos[3]=$datos4;
            $datos[4]=$datos5;
            return $datos;
        }
    }

}