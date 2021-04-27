<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
  header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");


$result = $conn->query("SELECT * FROM pizza WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>


<html>
<head>
  <!-- Mobile Specific Meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta charset="UTF-8">
  <!-- Site Title -->
  <title>Order List</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">

  <link rel="stylesheet" href="main.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet"> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
      <h5 class="my-0 mr-md-auto font-weight-normal">Admin Panel</h5>
      <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="index.html"> <img src="user-avatar.jpg" class="rounded-circle z-depth-0"
          alt="avatar image" height="35"> Logout</a>
        </nav>
      </div>
    </header>

    <div class="container">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Number</th>
            <th scope="col">Selected Pizza </th>
            <th scope="col">Comment</th>
            <th scope="col">Date of order</th>
            <th scope="col">Ordered</th>
            <th scope="col">Delete order</th>
          </tr>
        </thead>
        <?php
        while($res = $result->fetch()) {  ?>
          <tbody>
            <tr>
              <th scope="row"><?php echo $res['id']; ?></th>
              <td><?php echo $res['NamePizza']; ?></td>
              <td><?php echo $res['comments']; ?></td>
              <td><?php echo $res['created_date']; ?></td>
              <td class="text-center"><input type="checkbox" name="ordered" value="1" /> </td>
              <td class="text-center"><a href="delete.php?id=<?php echo $res['id']?>" class="btn btn-outline-danger" onClick="return confirm('Are you sure you want to delete?')">Delete</a></td>

            </tr>

          </tbody>
        <?php } ?>

      </table>


    </body>
    </html>