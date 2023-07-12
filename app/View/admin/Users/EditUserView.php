<div>
  <h2>Actualizacion de datos de usuario</h2>
  <!--en el metodo action de este formulario llamaremos al metodo Add de nuestro controlador -->
  <form action="http://localhost/php3b/?C=UserController&M=Edit" method="post" enctype="multipart/form-data">

    <p>
      <label for="nombre">Nombre : </label><br />
      <input type="text" name="nombre" id="nombre" placeholder="Nombre" value="<?= $datos['Nombre'] ?>" />
    </p>
    <p>
      <label for="apaterno">Apellido Paterno : </label><br />
      <input type="text" name="apaterno" id="apaterno" placeholder="Apellido Paterno" value="<?= $datos['ApPaterno'] ?>" />
    </p>
    <p>
      <label for="amaterno">Apellido Materno : </label><br />
      <input type="text" name="amaterno" id="amaterno" placeholder="Apellido Materno" value="<?= $datos['ApMaterno'] ?>" />
    </p>
    <p>
      <label for="user">Usuario : </label><br />
      <input type="text" name="user" id="user" placeholder="Usuario" value="<?= $datos['Usuario'] ?>" />
    </p>
    <p>
      <label for="password">Password : </label><br />
      <input type="password" name="password" id="password" placeholder="Password" value="<?= $datos['Password'] ?>" />
    </p>
    <p>
      <label for="sexo">Sexo : </label><br />
      <select name="sexo" id="sexo">
        <option value="1">Hombre</option>
        <option value="0">Mujer</option>
      </select>
    </p>
    <p>
      <label for="fchnac">Fecha de Nacimiento : </label><br />
      <input type="date" name="fchnac" id="fchnac" placeholder="dd-mm-aaaa" value="<?= $datos['FchNacimiento'] ?>" />
    </p>
    <p>
      <label for="avatar">Foto de perfil : </label>
      <input type="file" name="avatar" id="avatar" accept="image/*">
    </p>
    <p>
      <input type="hidden" name="ava" id="ava" value="<?= $datos['Avatar'] ?>">
      <input type="hidden" name="id" value="<?= $datos['IdUser'] ?>" readonly id="id" />
    </p>
    <p><input type="submit" value="Edit" /></p>
  </form>
</div>