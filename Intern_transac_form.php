<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Transfer</title>
  </head>
  <body>
  
<br>
<?php
    if ($_SERVER['REQUEST_METHOD']== 'POST'){
        $fromname = $_POST['fromname'];
        $money = $_POST['money'];
        $toname = $_POST['toname'];
        }
    else{
        $fromname = "nametaka";
        $money = 0;
        $toname = "takaname";

    }
    
    // connecting to the database'
     
    $servername="localhost";
    $username = "root";
    $password = "";
    $database="customers";

    //variables to be inserted in the database
    //$name = "harry";
    //$age = 20 ;

    $conn = mysqli_connect ($servername, $username, $password, $database);
    if(!$conn){
        die("connection was not successful due to -->".mysqli_connect_error()."<br>");
    }
    else {
      // submitting these to database.
      $sql = "INSERT INTO `dbhistory` (`fromname`, `money`, `toname`) VALUES ('$fromname', '$money', '$toname')";

      $result = mysqli_query($conn, $sql);
      if ($result){echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success !</strong> Transaction completed successfully !
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
    
      }
      else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error !</strong> Your entry has not been submitted successfully because of some technical issue. We regret for this!.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
            }
        
    }
    $sql = "SELECT * FROM `dbtable` WHERE `name`='$fromname'"; //returns records satisfying the condition. 
    $result = mysqli_query($conn, $sql);

// find the number of records .
    $row = mysqli_fetch_assoc($result);
    $sbl= $row['balance']; //sender's initial balance
    $snet = $sbl-$money; //sender's net balance
    $ssrno = $row['srno'];
// for sender's side    
    $sql = "UPDATE `dbtable` SET `balance` = '$snet' WHERE `dbtable`.`srno` = $ssrno";
    $result = mysqli_query($conn,$sql);

    // for receiver's side
    $sql = "SELECT * FROM `dbtable` WHERE `name`='$toname'"; //returns records satisfying the condition. 
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $rbl = $row['balance']; //receivers's initial balance
    $rnet = $rbl+$money;
    $rsrno = $row['srno'];
    
    $sql = "UPDATE `dbtable` SET `balance` = '$rnet' WHERE `dbtable`.`srno` = $rsrno";
    $result = mysqli_query($conn,$sql);
    


?>

<div class = "container">
    <form action= "/Internshipgrip/Intern_transac_form.php" method= "post" >
    <h1>Transaction </h1>
    <div class="mb-3">
        <label for="fromname" class="form-label">From </label>
        <input type="text" name = "fromname" class="form-control" id="fromname" aria-describedby="emailHelp">
        
    </div>
    <div class="mb-3">
        <label for="money" class="form-label">Money</label>
        <input type="text" name = "money" class="form-control" id="money" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Enter the amount here .</div>
    </div>

    <div class="mb-3">
        <label for="toname" class="form-label">To</label>
        <input type="text" name = "toname" class="form-control" id="toname" aria-describedby="emailHelp">
        
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
  
  <a class="btn btn-primary" href="http://localhost:8080/Internshipgrip/" role="button" style=background-color:orange;margin-left:660px;margin-top:80px;  ">Home</a>
</html>

