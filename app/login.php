<?php
session_start();
include "../db.php";

if (isset($_POST['username']) && isset($_POST['password'])) {
  function validateCredential($data){
    $data = trim($data);
    $username = $_POST['username'];
    $password = $_POST['password']; 
    return $data;
  }

  $username = validateCredential($_POST['username']);
  $password = validateCredential($_POST['password']);

  if (empty($username)){
    header("location: ../index.php?error=required username"); 
    exit();
  }else if(empty($password)){
    header("location: ../index.php?error=required password"); 
  }else{
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connection_user, $sql);
    if (mysqli_num_rows($result) === 1){
      $row = mysqli_fetch_assoc($result);
      if($row['username'] === $username && $row['password'] === $password){
        echo 'Your credentials is correct';
        $_SESSION['username'] = $row['username'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("location: ../home.php");
        exit();
      }else{
        header("location: ../index.php?error=incorrect username or password");
        exit();
      }
    }else{
      header("location: ../index.php?error=incorrect username or password");
      exit();
    }
  }

}else{
  header("Location: ../index.php?error=error");
  exit();
}



?>