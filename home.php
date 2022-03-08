<?php


session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])){?>

<?php
$web_title="Home";
$head= "templates/head.php";

?>

<!DOCTYPE html>
<html lang="en">
<?php include $head; ?>
<body class="bg-slate-100 min-h-screen">
  
  <div class="flex flex-col items-center justify-center min-h-screen px-5 mx-auto w-full md:w-10/12">
    <h1 class="mb-2 text-xl">Hello 👋 <span class="ml-1 font-medium"><?php echo $_SESSION['name']; ?></span></h1>
    <a href="logout.php" class="font-medium px-3 py-2 hover:bg-[#ebf0f5] transition rounded-md text-slate-800 hover:text-black">Logout</a>
  </div>
  

</body>
</html>

<?php }else{

  header("location: index.php");
  exit();

}?>
