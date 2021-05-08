<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>View Customers</title>
  </head>
  <body>
<pre> <h1>  Customers  </h1> </pre> 


    <table  class="table table-dark table-striped" >
    <thead>
        <tr >
        <th scope="col">SrNo</th>
        <th scope="col">Name</th>
        <th scope="col">Email </th>
        <th scope="col">Balance </th>
        </tr>
    </thead>
    <?php
    $servername="localhost";
    $username = "root";
    $password = "";
    $database="customers";
    $conn = mysqli_connect ($servername, $username, $password, $database);
    if(!$conn){
      die("connection was not successful due to -->".mysqli_connect_error()."<br>");
    }
    $sql = "SELECT srno ,name , email, balance from dbtable  ";
    $result = mysqli_query($conn, $sql);
    $num= mysqli_num_rows($result);

    if($num > 0){
        while($row = mysqli_fetch_assoc($result)){
          echo "<tr><td>". $row["srno"]."</td><td>". $row["name"]."</td><td>". $row["email"]."</td><td>"." Rs ". $row["balance"]."</td><td>"; 

        }
       
    }
    else {
      echo "0 result";
    }


    ?>    </table>
<pre>
<a href="http://localhost:8080/Internshipgrip/Intern_transac_form.php" target="_blank">
	<button style="background-color: slategray;margin-left:540px "><h4 style="color: black; font-family: sans-serif; ">Transfer Money</h4></button>
</a></pre>

<a href="http://localhost:8080/Internshipgrip/" target="_blank">
	<button style="background-color: darkgray;margin-left:660px;  "><h5 style="color: black; ">Home</h5></button>
</a>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>
