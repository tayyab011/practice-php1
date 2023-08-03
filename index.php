<?php
include_once("./conn.php");

/* $result = $conn->query("SELECT * FROM `pt`");

// Initialize an empty array to store the data
$data = array();

if ($result) {
    // Loop through the result set and store each row in the $data array
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}
 */

if (isset($_POST['button'])) {
 $name = $_POST['name'];
 $email = $_POST['email'];
 $number = $_POST['number'];
 $password = $_POST['password'];
 $comment = $_POST['comment'];

if (isset($name) && isset($email) && isset($number) && isset($password) && isset($comment) ) {
 $add = $conn->query("INSERT INTO `pt` (`name` , `email` , `number`,`password`,`comment`) VALUES('$name' ,'$email ', '$number','$password','$comment')");
 if ($add) {
 $name = "data submit succssfull";
 echo "<script>setTimeout(()=>{
location.href='./index'
 },2000)</script>";
 }else{
  $notname ="unsussessfull";
 }
}



}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <style>
        .col-md-6{
            outline:none;
            pla
        }
        input::placeholder {
  text-align: center;
  color:black;
  font-size:20px;
}
label{
text-align: center;
  color:black;
  font-size:20px;
}
    </style>
</head>
<body>
<div class='d-flex'>
<button class="btn btn-dark text-light mx-auto mt-3"
data-bs-toggle='modal' data-bs-target='#d'>Add Post</button>
</div>




    
    



<!--  modal -->
<div class="modal modal-lg" tabindex="-1" id='d'>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action='' method='post' class='mx-auto justify-content-center text-center'>
<label for='name'>Name:</label>
<input required type='text' name='name' placeholder='write your name' class='col-md-6' pattern="[A-Za-z\s]+"
title="Name should contain only letters (A-Z/a-z) and spaces."/><br/>
<label for='email' class='mt-3'>Email:</label>
<input required type='email' name='email' placeholder='write your email' class='col-md-6'/><br/>
<label for='number' class='mt-3'>Number:</label>
<input required type='number' name='number' placeholder='write your number' class='col-md-6' pattern="^[0-9]{10,15}$" title="Phone number should contain only digits (0-9) and be between 10 and 15 characters long."/><br/>
<label for='password' class='mt-3'>Password:</label>
<input required type='password' name='password' placeholder='write your number' class='col-md-6' pattern="^(?=.*[A-Za-z])[A-Za-z\d]{6,}$" title="Password should be at least 6 characters long and contain at least one letter and one digit."/><br/>
<label for='comment' class='mt-4'>Comment:</label>
<textarea required id='comment' name='comment' placeholder='Write your comment' class='col-md-6 mt-4'  rows='2'></textarea><br>

 <div class="modal-footer">
        <button name='button' type='submit' class="btn btn-primary">Submit</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!--  modal -->
 <p class='text-xl text-success text-center mx-auto justify-content-center'><?= $name ?? null ?>
     <?= $notname ?? null ?></p>

     
<!-- <table class="table">
  <thead>
    <tr>
      <th scope="col">sn</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">phone</th>
      <th scope="col">password</th>
      <th scope="col">comment</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // Loop through the $data array and display each row in the table
    foreach ($data as $index => $row) {
        ?>
        <tr>
            <th scope="row"><?php echo $index + 1; ?></th>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['number']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['comment']; ?></td>
        </tr>
        <?php
    }
    ?>
  </tbody>
</table> -->

<hr>








<?php

include_once("./display.php");
?>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js'></script>
</body>
</html>