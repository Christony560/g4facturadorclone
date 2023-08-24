<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url('assets/Usuarios/css/style.css'); ?>">
    <title>Formulario de Registro</title>
</head>
<body>
<div class="container mt-4">
    <h1>Modificacion / Eliminación de Usuarios</h1>
<!-- Segundo modal de edición -->
<div class="modal fade" id="editModal2" tabindex="-1" aria-labelledby="editModal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo site_url('usuario/guardarEdicion'); ?>" method="post">   
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal2Label">Editar Registro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Inicio de Campos de edición Usuarios -->
                    <div class="form-group">
                            <label for="ed_nombre">Nombre</label>
                            <input type="text" class="form-control" name="ed_nombre" id="ed_nombre" required>
                        </div>
                        <div class="form-group">
                            <label for="ed_apellido">Apellido</label>
                            <input type="text" class="form-control" name="ed_apellido" id="ed_apellido" required>
                        </div>
                        <div class="form-group">
                            <label for="ed_email">email</label>
                            <input type="email" class="form-control" name="ed_email" id="ed_email" required autocomplete="email">
                        </div>
                        <div class="form-group">
                            <label for="ed_password">pass</label>
                            <input type="password" class="form-control" onfocusout="cifrarpass();" name="ed_pasword" id="ed_pasword" required>
                        </div>
                        <div class="form-group">
                            <label for="rol">estado</label>
                            <select class="form-select" name="ed_estado" id="ed_estado" required>
                                <option value="">seleccione estado</option>
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="rol">Rol</label>
                            <select class="form-select" name="ed_rol" id="ed_rol" required>
                            <option value="0">seleccion un rol</option>
                                <option value="1">Administrador</option>
                                <option value="2">Normal</option>
                                <option value="3">Editor</option>
                                <option value="4">Invitado</option>
                                <option value="5">Moderador</option>
                            </select>
                        </div>
                </div>

                    <!-- Fin de Campos de Edición Usuario-->
                    
                    <div class ="from -group">
                        <input type="hidden" id="Edi" name ="usuario_id">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" id="btnGuardarCambios" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- Inicio modal de Eliminacion Usuarios (Inactivacion) -->
<div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="editModal2Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo site_url('usuario/eliminarUsuario'); ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModal2Label">Eliminar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    
                <!-- Campos de edición para el segundo modal -->
                    <div class="form-group">
                        <label id="mensaje">¿desea eliminar el usuario?</label>
                        <input type="hidden" name ="mEliminar" id="mensaje_id">

                    </div>
                
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                 </div>
            </form>
        </div>
    </div>
</div>

    <div id="tabla-container">
    <table class="table table-hover table-bordered table-striped" id="tabla">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Estado</th>
                <th>Rol</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach  ($resultados as $row): ?>
            <tr>
                <td><?php echo $row->usuario_id; ?></td>
                <td><?php echo $row->usuario_nombre; ?></td>
                <td><?php echo $row->usuario_apellido ?></td>
                <td><?php echo $row->usuario_email; ?></td>  
                <td>
                    <button class="btn btn-secondary btn-sm btn-mostrar" data-toggle="button" aria-pressed="false">Mostrar</button>
                    
                    <span class="contrasena-oculta"><?php echo $row->usuario_password;?></span>
                </td>
                <td><?php echo $row->usuario_estado; ?></td>
                <td><?php echo $row->usuario_rol_id; ?></td>
                <td><button class="btn btn-primary btn-sm btn-editar"   data-bs-toggle="modal" data-bs-target="#editModal2"  data-id="<?php echo $row->usuario_id; ?>">Modificar Usuario</button></td>
                <td><button class="btn btn-danger btn-sm btn-eliminar"   data-bs-toggle="modal" data-bs-target="#eliminarModal"  data-id="<?php echo $row->usuario_id; ?>"   >Eliminar</button></td>
      </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
            $(".btn-editar").click(function() {

                console.log("Botón Editar clickeado");
                var id_usuario = $(this).data("id");
                var nombre = $(this).closest("tr").find("td:eq(0)").text();
                var apellido = $(this).closest("tr").find("td:eq(1)").text();
                var email = $(this).closest("tr").find("td:eq(2)").text();
                var password = $(this).closest("tr").find("td:eq(3)").text();
                var estado = $(this).closest("tr").find("td:eq(4)").text();
                var rol = $(this).closest("tr").find("td:eq(5)").text();

                $("#ed_nombre").val(nombre);
                $("#ed_apellido").val(apellido);
                $("#ed_email").val(email);
                $("#ed_password").val(password);
                $("#ed_estado").val(estado);
                $("#ed_rol").val(rol);
                $("#Edi").val(id_usuario);
                
            });

            $("#btnGuardarCambios").click(function(e) {
    e.preventDefault(); // Prevenir el comportamiento predeterminado del botón
    
    // Obtener los valores de los campos del formulario
    var id_usuario = $("#Edi").val();
    var nombre = $("#ed_nombre").val();
    var apellido = $("#ed_apellido").val();
    var correo = $("#ed_email").val();
    var contrasena = $("#ed_pasword").val();
    var estado = $("#ed_estado").val();
    var rol = $("#ed_rol2").val();
    
    // Enviar una solicitud AJAX al controlador para actualizar los datos
    $.ajax({
        url: "<?php echo site_url('usuario/guardarEdicion'); ?>",
        method: "POST",
        data: {
            usuario_id: id_usuario,
            ed_nombre: nombre,
            ed_apellido: apellido,
            ed_correo: correo,
            ed_pasword: contrasena,
            ed_estado: estado,
            ed_rol: rol
        },
        success: function(response) {
            // Si la actualización fue exitosa, puedes realizar alguna acción aquí
            console.log("Datos actualizados correctamente");
            // Por ejemplo, puedes cerrar el modal
            $("#editModal2").modal("hide");
            // Luego, puedes recargar la página para ver los cambios reflejados
            location.reload();
        },
        error: function(error) {
            console.error("Error al actualizar datos:", error);
            // Puedes mostrar un mensaje de error en el modal si es necesario
        }
    });
});



                    //eliminado logico
                    $(".btn-eliminar").click(function() {
            var c = $(this).data("id");
            $("#mensaje_id").val(c);
             });   
        //cifrar la contraseña

		function cifrarpass(){
			var pasword = $("#pasword").val();
			var codificada = btoa(pasword);
			console.log(codificada);
			$("#pasword").val(codificada);
			console.log("Finalice");
		} 
    });



</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" 
crossorigin="anonymous"></script>

<!--/ocultar o mostrar la contraseña-->
<script>
    // Obtén todos los botones "Mostrar Contraseña"
    const mostrarButtons = document.querySelectorAll('.btn-mostrar');

    // Oculta las contraseñas al inicio
    const contrasenasOcultas = document.querySelectorAll('.contrasena-oculta');
    contrasenasOcultas.forEach(contrasena => {
        contrasena.style.display = 'none';
    });

    // Agrega un evento clic a cada botón
    mostrarButtons.forEach(button => {
        button.addEventListener('click', () => {
            const row = button.closest('tr'); // Obtén la fila actual
            const contrasenaOculta = row.querySelector('.contrasena-oculta'); // Obtén el elemento de contraseña oculta
            if (contrasenaOculta.style.display === 'none') {
                contrasenaOculta.style.display = 'inline'; // Muestra la contraseña
                button.setAttribute('aria-pressed', 'true');
                button.classList.remove('btn-secondary');
                button.classList.add('btn-success');
            } else {
                contrasenaOculta.style.display = 'none'; // Oculta la contraseña
                button.setAttribute('aria-pressed', 'false');
                button.classList.remove('btn-success');
                button.classList.add('btn-secondary');
            }
        });
    });
</script>

</body>
</html>
