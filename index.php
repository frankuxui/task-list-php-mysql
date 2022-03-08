<?php

// Template variables

$web_title="Login";
$head= "templates/head.php";
$heading= "Task list 📖";

require 'db.php';


?>

<!DOCTYPE html>
<html lang="en">

  <?php include $head; ?>

<body class="min-h-screen">

  
  <!-- Container -->
  <div class="flex flex-col items-center justify-center min-h-screen px-5 mx-auto w-full md:w-10/12">

    <div class="w-full max-w-md p-10 bg-white bg-clip-border rounded-xl shadow-sm ring-1 ring-slate-50 ring-opacity-5"><!-- Box login -->
      <form method="POST" action="app/login.php" class=""><!-- User form login -->

        <?php if(isset($_GET['error'])) {?>
          <div class="text-red-800 mt-2 text-base py-3 px-4 bg-red-50 rounded-md mb-3">
            <?php echo $_GET['error']; ?>
          </div>
        <?php } ?>

        <div class="mb-4">
          <input 
            class="py-2 px-3 w-full h-11 bg-slate-100 rounded-md font-medium pr-20 border-2 border-transparent focus:bg-slate-50 placeholder:font-normal" 
            type="text" 
            placeholder="User" 
            name="username" 
            id="username"
            required
            invalid>
        </div>
        <div class="mb-4">
          <input 
            class="py-2 px-3 w-full h-11 bg-slate-100 rounded-md font-medium pr-20 border-2 border-transparent focus:bg-slate-50 placeholder:font-normal" 
            type="password" 
            placeholder="Password" 
            name="password" 
            id="password"
            required
            invalid>
        </div>
        <div class="mb-4">
          <input type="submit" value="login" class="btn inline-block select-none no-underline align-middle cursor-pointer whitespace-nowrap px-5 py-2 rounded text-base font-medium leading-6 tracking-tight text-white text-center border-0 bg-[#6911e7] hover:bg-[#590acb] duration-300">
        </div>
      </form><!-- Close user form login -->
    </div><!-- Close box login -->
  </div>

</body>
</html>