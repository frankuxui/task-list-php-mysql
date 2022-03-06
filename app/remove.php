<?php
$errorMessage="../tasks.php?message=error";
$successfullMessage="../tasks.php?message=successful";

//var_dump($_REQUEST);
//exit();

if(isset($_POST['id'])){
  
  require '../db.php';
  
  $id = $_POST['id'];
  
  if(empty($id)){
    echo 0;
  }else{
    $statement = $connection->prepare("DELETE FROM tasks WHERE id=?");
    $res = $statement->execute([$id]);
    if($res){
      echo 1;
    }else{
      echo 0;
    }

    $connection= null;
    exit();
  }
}else{
  header("location: $errorMessage");
}

?>