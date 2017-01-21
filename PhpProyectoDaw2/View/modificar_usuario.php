
<form id="formulario" method="post">
  <input type="hidden" id="idmodificar">
  Password:<input type="password" id="passwordmodificar" name="passwordmodificar"><br>
  Nombre:<input type="text" id="nombremodificar" name="nombremodificar"><br>
  Apellidos:<input id="apellidosmodificar" name="apellidosmodificar"><br>
  Correo:<input id="correomodificar" name="correomodificar"><br>
  Direccion:<input id="direccionmodificar" name="direccionmodificar"><br>
  Telefono:<input id="telefonomodificar" name="telefonomodificar"><br>
  <br>
        
        <p class="mid"><input type="submit" name="Guardar" value="ENVIAR"></p>
       
</form>

<script>
  $("#formulario").validate({
    rules: {
            passwordmodificar: {
              required: true,
              minlength: 5
            },
            nombremodificar: "required",
            apellidosmodificar: "required",
            correomodificar: {
              required: true,
              email: true
            }
          },
          messages: {
            passwordmodificar: {
              required: "<br>Por favor, introduce una contraseña",
              minlength: "<br>Tu contraseña tiene que tener al menos 5 caracteres"
            },
            nombremodificar: "<br>Introduce su nombre",
            apellidosmodificar: "<br>Introduce sus apellidos",
            correomodificar: {
              required: "<br>Por favor, introduce un email",
              email: "<br>Por favor, introduce un email válido"
            }
          }
        });

</script>