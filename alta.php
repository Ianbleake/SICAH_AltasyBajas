<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>SICAH consultas</title>
        <link rel="icon" href="img/logoSICAH.ico" type="image/x-icon">
        <link href="./css/bootstrap.min.css" rel="stylesheet" />
        <link href="./css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <!-- JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"
                defer></script>
        <script defer src="./js/autocomplete.js"></script>
      </head>
<body>
  <?php include_once './partials/header_ipn.php'; ?>

  <div class="container vh-">
    <div class="col-md-auto text-center m-4">
      <h1>Altas</h1>
    </div>
    <div class="col-md-auto text-center m-4">
      <h3>Tipo de alta</h3>
    </div>
    <div class="row">
      <div class="col-md-4">
      </div>
      <div class="col-md-4">
        <select id="opcion" class="form-select text-center">
          <option selected></option>
          <option value="opcion1">Personal</option>
          <option value="opcion2">Plaza</option>
        </select>
      </div>
    </div>


    <div class="row m-4">
      <form id="formulario-opcion1" style="display: none;"  action="insertar_alta.php" method="POST" class="needs-validation" novalidate>
        <h2>Datos personales</h2>
        <hr> 
        <div class="row mb-3">
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">CURP</label>
              <input type="text" class="form-control" name="curp" id="curp" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">RFC</label>
              <input type="text" class="form-control" name="rfc" id="RFC" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label" >Homoclave</label>
              <input type="text" class="form-control" name="homoClave" id="homoClave" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label" >Correo Electronico</label>
              <input type="email" class="form-control" name="correo" id="e-mail" required>
            </div>
          </div>
        </div> 


        <div class="row mb-4">
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nombre(s)</label>
              <input type="text" class="form-control" name="nombre" id="Nombres" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Apellido Paterno</label>
              <input type="text" class="form-control" name="apellidoPaterno" id="apellidoPaterno" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label" >Apellido Materno</label>
              <input type="text" class="form-control" name="apellidoMaterno" id="apellidoMaterno" required>
            </div>
          </div>
          <div class="col-md-3 ">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Sexo</label>
              <select class="form-select" name="sexo">
                <option value="1">Masculino</option>
                <option value="2">Femenino</option>
              </select>
            </div>
          </div>
        </div>  


        <div class="row mb-3">
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nombre Padre</label>
              <input type="text" class="form-control" name="nombrePadre" id="nombrePadre" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label" >Nombre Madre</label>
              <input type="text" class="form-control" name="nombreMadre" id="nombreMadre" required>
            </div>
          </div>
          <div class="col-md-3 ">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Estado Civil</label>
              <select class="form-select" name="estadoCivil">
                <option value="1">Soltero</option>
                <option value="2">Casado</option>
                <option value="3">Divorciado</option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nombre conyuge</label>
              <input type="text" class="form-control" name="nombreCon" id="nombreConyuge" required>
            </div>
          </div>
        </div> 


        <div class="row mb-3">
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Edad</label>
              <input type="text" class="form-control" name="edad" id="edad" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Fecha de nacimiento</label>
              <input type="date" class="form-control" name="fechaNa" id="fNacimiento" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Nacionalidad</label>
              <input type="text" class="form-control" name="nacionalidad" id="nacionalidad" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Lugar de Nacimiento</label>
              <input type="text" class="form-control" name="lugarNa" id="luNacimiento" required>
            </div>
          </div>
        </div>
        
        
        <div class="row mb-3">
          <div class="col-md-3">
            <div>
              <label for="exampleFormControlInput1" class="form-label">Numero de empleado</label>
              <input type="text" class="form-control" name="numEmpleado" id="numEmpleado" required>
            </div>
          </div>
          <div class="col-md-3">
            <div>
              <label for="exampleFormControlInput1" class="form-label">Numero de interno</label>
              <input type="text" class="form-control" name="numint" id="numint" required>
            </div>
          </div>
          <div class="col-md-3">
            <div>
              <label for="exampleFormControlInput1" class="form-label">Hablante de lengua nativa</label>
              <select class="form-select" name="hablanteLengua">
                <option value="1">Si</option>
                <option value="2">No</option>
              </select>
            </div>
          </div>
          <div class="col-md-3">
            <div>
              <label for="exampleFormControlInput1" class="form-label">Tiene alguna discapacidad</label>
              <select class="form-select" name="discapacidad">
                <option value="1">Si</option>
                <option value="2">No</option>
              </select>
            </div>
          </div>
        </div>



        <h2>Domicilio</h2>
        <hr>
        <div class="row mb-3">
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Calle y Num</label>
              <input type="text" class="form-control" name="calle" id="calle#" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Colonia</label>
              <input type="text" class="form-control" name="colonia" id="col" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Alcaldía</label>
              <input type="text" class="form-control" name="alcal" id="alcal" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Estado</label>
              <input type="text" class="form-control" name="estado" id="estado" required>
            </div>
          </div>
        </div> 



        <h2>Contacto</h2>
        <hr>
        <div class="row mb-3">
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Telefono Oficina</label>
              <input type="text" class="form-control" name="telOf"id="telof" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Telefono Casa</label>
              <input type="text" class="form-control" name="telCasa" id="telca" required>
            </div>
          </div>
        </div> 

        <h2>Datos laborales</h2>
        <hr>
        <div class="row mb-3">
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Numero de Contrato</label>
              <input type="text" class="form-control" name="numContrato"id="numCon" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Turno</label>
              <input type="text" class="form-control" name="turno" id="turno" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Funcion</label>
              <input type="text" class="form-control" name="funcion" id="fun" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Ubicación</label>
              <input type="text" class="form-control" name="ubicacion" id="ubicacion" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Adscripcion</label>
              <input type="text" class="form-control" name="ads" id="ads" required>
            </div>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Tipo</label>
              <input type="text" class="form-control" name="tipo" id="tipo" required>
            </div>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Area de checado</label>
              <input type="text" class="form-control" name="acheca" id="acheca" required>
            </div>
          </div>

          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">ID de Funcion</label>
              <input type="text" class="form-control" name="idfun" id="idfun" required>
            </div>
          </div>

        </div>


        <div class="row mb-3">
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Modalidad</label>
              <input type="text" class="form-control" name="modalidad" id="modalidad" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Checador</label>
              <input type="text" class="form-control" name="checador" id="checador" required>
            </div>
          </div>
        </div>
        

        <h2>Datos adicionales</h2>
        <hr>
        <div class="row mb-3">
          <div class="col-md-6">
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Observaciones</label>
              <textarea name="OBSER" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
          </div>
          
        </div> 
          
        <div class="row mb-3">
          <div class="col-md-3 offset-md-10 justify-content-end">
            <button id="mostrarBoton" type="submit" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#confirmModal">Dar de Alta</button>
          </div>
        </div>
      </form>
    </div>
  
    

    <div id="formulario-opcion2" style="display: none;">
    <form  action="insertar_plaza.php" method="POST" class="needs-validation" novalidate>
      <h3>Datos de la  plaza</h3>
      <HR>
      <div class="row mb-3">
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">CURP</label>
              <input type="text" class="form-control" name="CURPP" id="CURPP" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">SUB</label>
              <input type="text" class="form-control" name="SUB" id="SUB" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label" >CLAV</label>
              <input type="text" class="form-control" name="CLAV" id="CLAV" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label" >NP</label>
              <input type="text" class="form-control" name="NP" id="NP" required>
            </div>
          </div>
        </div> 

        <div class="row mb-3">
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">CLAVE</label>
              <input type="text" class="form-control" name="CLAVE" id="CLAVE" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">MOV</label>
              <input type="text" class="form-control" name="MOV" id="MOV" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label" >FIN</label>
              <input type="text" class="form-control" name="FIN" id="FIN" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label" >FTE</label>
              <input type="text" class="form-control" name="FTE" id="FTE" required>
            </div>
          </div>
        </div> 

        <div class="row mb-3">
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">FAC</label>
              <input type="text" class="form-control" name="FAC" id="FAC" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">HIS</label>
              <input type="text" class="form-control" name="HIS" id="HIS" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label" >TP</label>
              <input type="text" class="form-control" name="TP" id="TP" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label" >PAS</label>
              <input type="text" class="form-control" name="PAS" id="PAS" required>
            </div>
          </div>
        </div> 

        <div class="row mb-3">
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">NIVEL</label>
              <input type="text" class="form-control" name="NIVEL" id="NIVEL" required>
            </div>
          </div>
          <div class="col-md-3">
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">DICTAMEN</label>
              <input type="text" class="form-control" name="DICTAMEN" id="DICTAMEN" required>
            </div>
          </div>
          
        </div> 

        <div class="row mb-3">
          <div class="col-md-3 offset-md-10 justify-content-end">
            <button id="mostrarBoton" type="submit" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#confirmModal">Dar de Alta</button>
          </div>
        </div>

    </form>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#opcion').on('change', function() {
        var opcionSeleccionada = $(this).val();
        
        // Oculta todos los formularios
        $('[id^=formulario-]').hide();
        
        // Muestra el formulario correspondiente a la opción seleccionada
        $('#formulario-' + opcionSeleccionada).show();
      });
    });
  </script>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
      'use strict'
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })()
  </script>
  <script>
        // Obtén el botón por su ID
        const botonMostrar = document.getElementById('mostrarBoton');

        // Agrega un controlador de eventos al botón
        botonMostrar.addEventListener('click', function() {
            // Muestra una alerta al hacer clic en el botón
            alert('Alta dada con exito.');
        });
    </script>

</div>

<?php include_once './partials/footer_ipn.php'; ?>

</body>
</html>