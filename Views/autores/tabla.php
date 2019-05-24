<?php
$datos=$datos[0];
while($row=mysqli_fetch_array($datos))
    echo "<tr><td>{$row[0]}</td>
    <td>{$row['nombre']}</td>
    <td>{$row['a_paterno']}</td>
    <td>{$row['a_materno']}</td>
    
    <td><a class='btn-flat icon-cross red-text btn_eliminar' href='#!' data-id='{$row['id_autor']}'></a></td>
    <td><a class='btn-flat icon-pencil blue-text btn_modificar ' data-id='{$row['id_autor']}' href='#!'></a></td></tr>";
?>