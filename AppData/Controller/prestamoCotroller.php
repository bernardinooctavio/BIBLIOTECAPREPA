<?php
/**
 * Created by PhpStorm.
 * User: octavio
 * Date: 16/05/2019
 * Time: 04:07 PM
 */

namespace AppData\Controller;


class prestamoCotroller
{
	private $prestamos,$libros,$autores,$tipo_persona,$tipo_libro,$libro,$grado,$grupo;
    public function __construct()
    {

    	$this->prestamos=new \AppData\Model\prestamos();
        $this->prestamos=new \AppData\Model\tipo_persona();
        $this->prestamos=new \AppData\Model\personas();
        $this->prestamos=new \AppData\Model\grado();
        $this->prestamos=new \AppData\Model\grupo();
        $this->prestamos=new \AppData\Model\libros();
        $this->pretamos=new \AppData\Model\autores();
    }

    public function index()
    {

        $datos1=$this->prestamos->getAll();
        $datos2=$this->personas->getAll();
        $datos3=$this->autores->getAll();
        $datos4=$this->grado->getAll();
        $datos5=$this->grupo->getAll();
        $datos6=$this->libros->getAll();
        $datos7=$this->fecha_prestamo->getAll();
        $datos8=$this->fecha_devolucion->getAll();
        $datos[0]=$datos1;
        $datos[1]=$datos2;
        $datos[2]=$datos3;
        $datos[3]=$datos4;
        $datos[4]=$datos5;
        $datos[5]=$datos6;
        $datos[6]=$datos7;
        $datos[7]=$datos8;


        return $datos;
    }
    public function crear()
    {
        if($_POST)
        {
            $this->prestamos->set('nombre',$_POST["nombre"]);
            $this->prestamos->set('titulo',$_POST["titulo"]);
            $this->prestamos->set('id_grado',$_POST["id_grado"]);
            $this->prestamos->set('id_grupo',$_POST["id_grupo"]);
            $this->prestamos->set('id_libro',$_POST["id_libro"]);
            $this->prestamos->set('fecha_prestamo',$_POST["fecha_prestamo"]);
            $this->prestamos->set('fecha_devolucion',$_POST["fecha_devolucion"]);
            $this->prestamos->add();
            $datos1=$this->prestamos->getAll();
            $datos[0]=$datos1;
            return $datos;
        }

    }
    public function eliminar($id)
    {
        $this->prestamos->delete($id[0]);
        $datos1=$this->prestamos->getAll();
        $datos[0]=$datos1;
        return $datos;
    }
    public function modificar($id)
    {
        $datos=$this->prestamos->getOne($id[0]);
        return $datos;
    }
    public function actualizar($id)
    {
        if($_POST)
        {
            $this->prestamos->set('nombre',$_POST["nombre"]);
            $this->prestamos->set('titulo',$_POST["titulo"]);
            $this->prestamos->set('id_grado',$_POST["id_grado"]);
            $this->prestamos->set('id_grupo',$_POST["id_grupo"]);
            $this->prestamos->set('id_libro',$_POST["id_libro"]);
            $this->prestamos->set('fecha_prestamo',$_POST["fecha_prestamo"]);
            $this->prestamos->set('fecha_devolucion',$_POST["fecha_devolucion"]);
         
            $this->prestamos->update();
            $datos1=$this->prestamos->getAll();
            $datos[0]=$datos1;
	        $datos[1]=$datos2;
	        $datos[2]=$datos3;
	        $datos[3]=$datos4;
	        $datos[4]=$datos5;
	        $datos[5]=$datos6;
	        $datos[6]=$datos7;
	        $datos[7]=$datos8;

            return $datos;
        }
    }

}