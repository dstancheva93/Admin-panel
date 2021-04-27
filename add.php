<?php session_start(); ?>

<?php

?>

<html>
<head>
    <title>Add Data</title>
</head>

<body>

    <?php
//including the database connection file
    include_once("connection.php");

    if(isset($_POST['Submit'])) {    
        $comments = $_POST['comments'];
        $loginId = $_SESSION['id'];
        $select = $_POST['selectPizza'];


//insert data to database    
        $conn->query("INSERT INTO pizza (comments,NamePizza, login_id) VALUES ('$comments','$select',  '$loginId')");

//display success message

        header("Location:orderSuccess.php");

    }
    ?>
</body>
</html>