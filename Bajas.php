<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SICAH bajas</title>
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
    <?php include_once './partials/header.php'; ?>

    <div class="container vh-">
      <div class="col-md-auto text-center m-4">
        <h1> Bajas</h1>
      </div>

        <div class="row m-4">
            <form id="formulario-opcion1" action="insertar_baja.php" method="POST" class="needs-validation" novalidate>   <!-- Agregar aqui el action para la conexion y la subida a la BD -->
                <h2>Datos de baja</h2>
                <hr>
                <div class="row mb-3">
                    <div class="col-md-4">
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">CURP</label>
                            <input type="text" class="form-control" id="curp" name='curp'>
                            </div>
                        </div>

                <div class="col-md-4">
                    <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Tipo de Baja</label>
                                <select class="form-select" name="tbaja">
                                    <option selected>Seleccione tipo de baja</option>
                                    <option value="1">Baja por renuncia</option>
                                    <option value="2">Baja por jubilación</option>
                                    <option value="3">Baja por cambio de plantel</option>
                                    <option value="4">Baja por defunción</option>
                                </select>
                                </div>
                            </div>
                    <div class="col-md-4">
                        <div class="mb-4">
                            <label for="exampleFormControlInput1" class="form-label">Fecha de Baja</label>
                            <input type="date" class="form-control" name="fechabaja">
                            </div>
                        </div>
                    </div>

                <div class="row mb-4">
                    <div class="col-md-5">
                        <div class="mb-5">
                            <label for="exampleFormControlTextarea1" class="form-label">Motivo de Baja</label>
                            <textarea name="MOTIV" class="form-control" id="exampleFormControlTextarea1" rows="5" style="resize: none;"></textarea>
                    </div>
                    </div>

                    <div class="col-md-5">
                        <div class="mb-5">
                            <label for="exampleFormControlTextarea1" class="form-label">Observaciones</label>
                            <textarea name="OBSER" class="form-control" id="exampleFormControlTextarea2" rows="5" style="resize: none;"></textarea>
                    </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 offset-md-10 justify-content-end">
                            <button id="mostrarBoton1" type="submit" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#confirmModal">Dar de Baja</button>
                        </div>
                    </div>
                </form>
                <!-- Ventana de confirmacion -->
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
        const botonMostrar = document.getElementById('mostrarBoton1');

        // Agrega un controlador de eventos al botón
        botonMostrar.addEventListener('click', function() {
            // Muestra una alerta al hacer clic en el botón
            alert('Baja dada con exito.');
        });
    </script>

    </div>

    <?php include_once './partials/footer_ipn.php'; ?>

</body>

</html>