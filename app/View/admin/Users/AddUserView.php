<div>
  <h2>Agregar nuevo usuario</h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form action="http://localhost/php3b/?C=UserController&M=Add" method="post">
    <p>
      <label for="nombre">Nombre : </label><br />
      <input type="text" name="nombre" id="nombre" placeholder="Nombre" />
    </p>
    <p>
      <label for="apaterno">Apellido Paterno : </label><br />
      <input
        type="text"
        name="apaterno"
        id="apaterno"
        placeholder="Apellido Paterno"
      />
    </p>
    <p>
      <label for="amaterno">Apellido Materno : </label><br />
      <input
        type="text"
        name="amaterno"
        id="amaterno"
        placeholder="Apellido Materno"
      />
    </p>
    <p>
        <label for="user">Usuario : </label><br />
        <input type="text" name="user" id="user" placeholder="Usuario"/>
    </p>
    <p>
        <label for="password">Password : </label><br>
        <input type="password" name="password" id="password" placeholder="Password"/>
    </p>
    <p>
        <label for="sexo">Sexo : </label><br>
        <select name="sexo" id="sexo">
            <option value="1">Hombre</option>
            <option value="0">Mujer</option>
        </select>
    </p>
    <p>
        <label for="fchnac">Fecha de Nacimiento : </label><br>
        <input type="date" name="fchnac" id="fchnac"  placeholder="dd-mm-aaaa"/>
    </p>
    <p><input type="submit" value="Add User"></p>
  </form>
</div>
