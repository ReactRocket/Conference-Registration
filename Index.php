<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Online Conference Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <?php

    //  DATABASE INCLUDED  
    include("dbconnect.php");

    if (isset($_POST['submitBTN'])) {

        $name = $_POST['name'];
        $address = $_POST['address'];
        $mobile = $_POST['mobile'];
        $gender = $_POST['gender'];
        $designation = $_POST['designation'];
        $iaddress = $_POST['iaddress'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if ($password === $cpassword) {

            $query = "INSERT INTO `members_tbl` (`name`, `address`, `mobile`, `gender`, `designation`, `iaddress`, `email`, `password`, `cpassword`) VALUES ('$name', '$address', '$mobile', '$gender', '$designation', '$iaddress', '$email', '$password', '$cpassword');";

            $result = mysqli_query($con, $query);

            if ($result) {
                print('
                    <script>
                        alert("New Member ' . $name . '  Added To Conference.");
                    </script>
                ');

                if ($password === $cpassword) {
                    header("location:Login.php");
                }
            } else {
                echo '
            <script>
                alert("Alert! Something went Wrong... ");
            </script>
            ';
            }
        } else {
            echo '
            <script>
                alert("Warning! Password Miss match... ");
            </script>
            ';
        }
    }

    ?>
    <div class="container-fluid">
        <h1 class="text-center my-5">Online Conference Registration</h1>
        <div class="container px-5  d-flex justify-content-center">
            <form class="p-5 border border-3 rounded mb-5 w-100" action="" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" id="name" name="name" required>

                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label><span class="text-danger">*</span>
                    <textarea class="form-control" id="address" rows="3" name="address" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="mobile" class="form-label">Mobile No.</label>
                    <input type="number" class="form-control" id="mobile" name="mobile">
                </div>
                <div class="mb-3 d-flex">
                    <label class="form-check-label" for="gender">
                        Gender
                    </label>

                    <input class="form-check-input mx-2" type="radio" value="Male" name="gender" id="gender">
                    <span>Male</span>
                    <input class="form-check-input mx-2" type="radio" value="Female" name="gender" id="gender">
                    <span>Female</span>
                </div>

                <div class="mb-3">
                    <label for="designation" class="form-label">Designation</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" id="designation" name="designation" required>
                    <div id="designation" class="form-text">In case of student : Final And Pre-final year of PG only
                    </div>
                </div>

                <div class="mb-3">
                    <label for="iaddress" class="form-label">Institutional Address</label><span class="text-danger">*</span>
                    <textarea class="form-control" id="iaddress" rows="3" name="iaddress" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email As Username</label><span class="text-danger">*</span>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label><span class="text-danger">*</span>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <div class="mb-3">
                    <label for="cpassword" class="form-label">Confirm Password</label><span class="text-danger">*</span>
                    <input type="password" class="form-control" id="cpassword" name="cpassword" required>
                </div>
                <div class="mb-3 d-flex justify-content-between">
                    <span class="text-danger">* Required Fields</span>
                    <a href="Login.php" class="text-center">Already have account?</a>
                </div>
                <div class="container d-flex justify-content-center">
                    <button type="submit" name="submitBTN" class="btn btn-success mx-3">Submit</button>
                    <button type="reset" name="resetBTN" class="btn btn-danger mx-3">Reset</button>
                </div>

            </form>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>