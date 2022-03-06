<?php
$errorMessage="../tasks.php?message=error";
$successfullMessage="../tasks.php?message=successful";

if (isset($_POST['title'])) {

  require '../db.php';
  
  $title= $_POST['title'];
  $note= $_POST['note'];
  
  if(empty($title)){
    header("Location: $errorMessage");
  }else{
    $statement= $connection->prepare("INSERT INTO `task_list`.`tasks` (title, note) VALUES (?, ?)");
    $res= $statement->execute(array($title,$note));
    if($res){
      header("Location: $successfullMessage");
    }else{
      header("Location: ../tasks.php");
    }

    $connection= null;
    exit();
  }
}else{
  header("location: $errorMessage ");
}

?>