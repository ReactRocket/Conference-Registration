<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION["name"])) {
        header("location:Index.php");
    }
    ?>
    <h1 class="text-center">Home Page...</h1>

    <div style="min-height: 90vh;" class="container d-flex justify-content-center align-items-center">
        <div class="alert alert-warning " role="alert">
            <div class="card">
                <div class="card-header">
                    Welcome
                    <?php
                    echo $_SESSION['name'];
                    ?>
                </div>
                <div class="card-body">
                    <h5 class="card-title">You are on the home page..</h5>
                    <p class="card-text">First u login to our system. Then the system redirected here...</p>
                    <a href="Index.php" class="btn btn-danger" onclick="<?php session_destroy(); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>