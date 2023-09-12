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

    <div class="container vh-">
        <div class="col-md-auto text-center m-4">
            <h1>Altas y Bajas</h1>
        </div>

        <div class="row justify-content-between mb-5">

            <div class="col-md-auto text-center m-4">
                <div class="card ms-5" style="width: 18rem;">
                    <img class="card-img-top" src="img\Logo Sicah.png" alt="Card image cap">
                    <div class="card-body ps-5">
                        <h5 class="card-title">Realiza una alta</h5>
                        <p class="card-text ">Realizar un alta de personal.</p>
                        <a href="alta.php" class="btn btn-primary ">Acceder</a>
                    </div>
                </div>
            </div>


            <div class="col-md-auto text-center m-4">
                <div class="card ms-5" style="width: 18rem;">
                    <img class="card-img-top" src="img\Logo Sicah.png" alt="Card image cap">
                    <div class="card-body ps-5">
                        <h5 class="card-title">Realiza una baja.</h5>
                        <p class="card-text">Dar de baja a personal</p>
                        <a href="Bajas.php" class="btn btn-primary">Acceder</a>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <?php include_once './partials/footer_ipn.php'; ?>

</body>

</html>