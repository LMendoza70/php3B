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
                echo "<td><button onclick='editar(".$dato['IdUser'].")'>Editar</button><br>
                <button onclick='eliminar(".$dato['IdUser'].")'>Eliminar</button> </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
  </p>
</div>
<script>
  //creamos la funcion para llmar al formulario de editar un usuario
  function editar(id){
    window.location.href = "http://localhost/php3b/?C=UserController&M=CallFormEdit&id="+id
  }
  //creamos la funcion para eliminar un usuario por medio de su id despues de confirmar con un confirm
  function eliminar(id){
    if(confirm("¿Desea eliminar el usuario?")){
      window.location.href = "http://localhost/php3b/?C=UserController&M=Delete&id="+id
    }
  }
</script>
