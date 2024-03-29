<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Conference Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php

    //  DATABASE INCLUDED  
    include("dbconnect.php");

    session_start();

    if (isset($_POST['email'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "SELECT * FROM `members_tbl` WHERE `email`='$email' AND `password`='$password'";

        $result = mysqli_query($con, $query);
        $count = mysqli_affected_rows($con);

        if ($count > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $_SESSION['name'] = $row['name'];
            }
            header("location:Home.php");
        } else {
            echo '
            <script>
                alert("Alert! Invalid Username Or Password... ");
            </script>
            ';
        }
    }

    ?>
    <div class="container-fluid">
        <h1 class="text-center my-5">Members Login</h1>
        <div class="container px-5 d-flex justify-content-center">
            <form class="p-5 border border-3 rounded mb-5 w-50" action="" method="post">

                <div class="mb-3">
                    <label for="email" class="form-label">Email As Username</label><span class="text-danger">*</span>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label><span class="text-danger">*</span>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3 d-flex justify-content-between">
                    <a href="#" class="text-center">Forgot Password?</a>
                    <a href="Index.php" class="text-center">Don't have account?</a>
                </div>

                <div class="container d-flex justify-content-center">
                    <button type="submit" name="submitBTN" class="btn btn-success mx-3">Login</button>
                    <button type="reset" name="submitBTN" class="btn btn-danger mx-3">Reset</button>
                </div>

            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>