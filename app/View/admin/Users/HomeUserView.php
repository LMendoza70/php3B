<div>
  <h2>Este es el apartado de administracion de usuarios</h2>

  <p>
    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Earum incidunt cum
    odit illum perferendis laudantium. Consectetur eligendi ullam molestias
    adipisci doloremque voluptatum a, aspernatur asperiores laborum. Obcaecati
    vel nihil aperiam? Lorem ipsum dolor sit amet consectetur adipisicing elit.
    Nihil ducimus eum minus tempore dolor. Vel nulla consequuntur iure fugit,
    neque consectetur quasi aliquam error qui eligendi quaerat, ut, quis illum!
  </p>
  <p><a href="http://localhost/php3b/?C=UserController&M=CallUserAdd">Agregar Nuevo Usuario</a></p>
  <p>
    <table border=1 >
        <thead>
            <td>Nombre</td>
            <td>Apellido Paterno</td>
            <td>Apellido Materno</td>
            <td>Usuario</td>
            <td>Acciones</td>
        </thead>
        <tbody>
            <?php
            foreach($datos as $dato){
                echo "<tr>";
                echo "<td>". $dato['Nombre'] ."</td>";
                echo "<td>". $dato['ApPaterno'] ."</td>";
                echo "<td>". $dato['ApMaterno'] ."</td>";
                echo "<td>". $dato['Usuario'] ."</td>";
                echo "<td><a href=''>Editar</a> <br> <a href=''>Eliminar</a> </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
  </p>
</div>
