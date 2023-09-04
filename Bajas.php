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
            <h1>Datos Bajas</h1>
        </div>
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <select id="opcion" class="form-select text-center">
                    <option selected>Tipo de Baja</option>
                    <option value="opcion1">Baja por renuncia</option>
                    <option value="opcion2">Baja por jubilación</option>
                    <option value="opcion3">Baja por cambio de plantel</option>
                    <option value="opcion4">Baja por defunción</option>
                </select>
            </div>
        </div>
        <div class="row m-4">
            <div id="formulario-opcion1" style="display: none;">
                <form action="">  <!-- Agregar aqui el action para la conexion y la subida a la BD -->
                    <h2>Datos personales</h2>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">CURP</label>
                                <input type="text" class="form-control" id="curp">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Baja</label>
                                <select class="form-select">
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 offset-md-10 justify-content-end">
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                data-target="#confirmModal">Dar de Baja</button>
                        </div>
                    </div>
                </form>
                <!-- Ventana de confirmacion -->
            </div>

            <div id="formulario-opcion2" style="display: none;">
                <!-- Aquí puedes agregar los campos del formulario para la Opción 2 -->
                <form action="">  <!-- Agregar aqui el action para la conexion y la subida a la BD -->
                    <h2>Datos personales</h2>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">CURP</label>
                                <input type="text" class="form-control" id="curp">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Baja</label>
                                <select class="form-select">
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 offset-md-10 justify-content-end">
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                data-target="#confirmModal">Dar de Baja</button>
                        </div>
                    </div>
                </form>
                <!-- Ventana de confirmacion -->
            </div>

            <div id="formulario-opcion3" style="display: none;">
                <!-- Aquí puedes agregar los campos del formulario para la Opción 2 -->
                <form action="">  <!-- Agregar aqui el action para la conexion y la subida a la BD -->
                    <h2>Datos personales</h2>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">CURP</label>
                                <input type="text" class="form-control" id="curp">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Baja</label>
                                <select class="form-select">
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <div class="mb-3">
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 offset-md-10 justify-content-end">
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                data-target="#confirmModal">Dar de Baja</button>
                        </div>
                    </div>
                </form>
                <!-- Ventana de confirmacion -->
            </div>

            <div id="formulario-opcion4" style="display: none;">
                <!-- Aquí puedes agregar los campos del formulario para la Opción 2 -->
                <form action="">  <!-- Agregar aqui el action para la conexion y la subida a la BD -->
                    <h2>Datos personales</h2>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">CURP</label>
                                <input type="text" class="form-control" id="curp">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Baja</label>
                                <select class="form-select">
                                    <option value="1">Si</option>
                                    <option value="2">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-3">
                                <div class="mb-3">
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 offset-md-10 justify-content-end">
                            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal"
                                data-target="#confirmModal">Dar de Baja</button>
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

    </div>

    <?php include_once './partials/footer_ipn.php'; ?>

</body>

</html>