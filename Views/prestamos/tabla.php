<?php
$datos=$datos[0];
while($row=mysqli_fetch_array($datos))
    echo "<tr><td>{$row[0]}</td>
    <td>{$row['tipo_persona']}</td>
    <td>{$row['titulo']}</td>
    <td>{$row['nombre']}</td>
     <td>{$row['a_paterno']}</td>
      <td>{$row['a_materno']}</td>
    <td>{$row['grado']}</td>
    <td>{$row['grupo']}</td>
    <td>{$row['titulo']}</td>
    <td>{$row['autor']}</td>
    <td>{$row['fecha_prestamo']}</td>
    <td>{$row['fecha_devolucion']}</td>
    
    <td><a class='btn-flat icon-cross red-text btn_eliminar' href='#!' data-id='{$row['id_libro']}'></a></td>
    <td><a class='btn-flat icon-pencil blue-text btn_modificar ' data-id='{$row['id_libro']}' href='#!'></a></td></tr>";
?>