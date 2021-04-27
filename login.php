<?php session_start(); ?>
<html>
<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Order Pizza</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">

    <link rel="stylesheet" href="main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <!---<a href="index.php">Home</a> <br />--->
    <?php
    include("connection.php");

    if(isset($_POST['submit'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];


        if($user == "" || $pass == "") {
            echo "Either username or password field is empty.";
            echo "<br/>";
            echo "<a href='login.php'>Go back</a>";
        } else {
            $result = $conn->query("SELECT * FROM login WHERE username='$user'");

            $row = $result->fetch();


            if(is_array($row) && !empty($row)) {
                $validuser = $row['username'];
                $_SESSION['valid'] = $validuser;
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];
            } else {
                echo "Invalid username or password.";
                echo "<br/>";
                echo "<a href='index.php'>Go back</a>";
            }

            if(isset($_SESSION['valid'])) {
                header('Location:view.php');            
            }
        }
    } else {
        ?>

        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 admin-panel-content card ">

                    <form class="text-center p-5" name="form1" method="post" action="">
                        <img id="profile-img" class="profile-img-card" src="user-account.png" />
                        <p id="profile-name" class="profile-name-card"></p>
                        <h4 class="h4 mb-4"> Admin Panel </h4>

                        <!-- Username-->
                        <input type="text" name="username" class="form-control mb-4" placeholder="Username">

                        <!-- Password-->
                        <input type="password" name="password" class="form-control mb-4" placeholder="Password">

                        <!-- Sign in button -->
                        <input type="submit" name="submit" value="Login" class="main-btn text-uppercase mt-20 text-center">

                    </form>

                    <p><b>Username:</b> admin</p>
                    <p><b>Password:</b>admin123</p>

                </div>
                <div class="col-md-3"></div>

            </div><!--- row --->

        </div>
        <?php
    }
    ?>

</body>
</html>