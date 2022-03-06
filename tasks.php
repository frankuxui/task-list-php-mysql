<?php

// Template variables

$web_title="Task list";
$head= "templates/head.php";
$heading= "Task list 📖";

require 'db.php';


?>


<!DOCTYPE html>
<html lang="en">
  
  <?php include $head; ?>

<body class="pt-6 bg-slate-100 min-h-screen">

  <!-- Container -->
  <div class="flex flex-col px-5 mx-auto w-full md:w-10/12">
    
    <!-- Title -->
    <div class="flex flex-row justify-between items-center mb-10">
      <h1 class="text-4xl font-bold"><?php echo $heading ?></h1>
    </div>
    <!-- Close Title -->

    <!-- Main tasks -->
    <div class="grid grid-col-3 md:grid-flow-col lg:grid-flow-col xl:grid-flow-col gap-4 md:grid-cols-[minmax(300px,_350px)]">

      <!-- Task Form -->
      <div class="p-6 rounded-xl bg-white h-fit">
        <form action="add-task.php" method="POST" autocomplete="off" id="form_id">

          <?php if(isset($_GET['message']) && $_GET['message']== "error") { ?>
            
            <div class="flex flex-col mb-4">
              <label for="title" class="font-medium text-lg mb-2 block">Task name</label>
              <input 
                class="py-2 px-3 w-full h-11 bg-slate-100 rounded-lg font-medium pr-20 border-2 border-transparent focus:bg-slate-50 placeholder:font-normal peer invalid:border-red-500 invalid:outline-red-500" 
                type="text" 
                placeholder="Task name" 
                name="title" 
                id="title"
                required
                invalid>
              <div class="text-red-800 mt-2 text-sm py-2 px-3 bg-red-50 rounded-md hidden peer-invalid:block">Please create a title for this task</div>
            </div>
            <div class="flex flex-col mb-4">
              <label for="note" class="font-medium text-lg mb-2 block">Note</label>
              <textarea class="py-2 px-3 w-full h-11 bg-slate-100 border-2 border-transparent rounded-lg placeholder:text-slate-600 placeholder:font-normal font-medium pr-20 min-h-[6rem] autosize focus:bg-slate-50" id="note" name="note" placeholder="Task note.."></textarea>
            </div>
          <?php } else {?>

            <div class="flex flex-col mb-4">
              <label for="title" class="font-medium text-lg mb-2 block">Task name</label>
              <input 
                class="py-2 px-3 w-full h-11 bg-slate-100 rounded-lg font-medium pr-20 border-2 border-transparent focus:bg-slate-50 placeholder:font-normal" 
                type="text" 
                placeholder="Task name" 
                name="title" 
                id="title">
            </div>
            <div class="flex flex-col mb-4">
              <label for="note" class="font-medium text-lg mb-2 block">Note</label>
              <textarea class="py-2 px-3 w-full h-11 bg-slate-100 border-2 border-transparent rounded-lg placeholder:text-slate-600 placeholder:font-normal font-medium pr-20 min-h-[6rem] autosize focus:bg-slate-50" id="note" name="note" placeholder="Task note.."></textarea>
            </div>
          <?php }?>
          
          <div>
            <input type="submit" value="Create task" class="btn inline-block select-none no-underline align-middle cursor-pointer whitespace-nowrap px-4 py-1.5 rounded text-base font-medium leading-6 tracking-tight text-white text-center border-0 bg-[#6911e7] hover:bg-[#590acb] duration-300">
          </div>
        </form>
      </div>
      <!-- Close Task Form -->
      
      <?php
        $tasks = $connection->query("SELECT * FROM `task_list`.`tasks`  ORDER BY id DESC ");
      ?>

      <?php if($tasks->rowCount() <= 0) { ?>
        <div class="flex items-center justify-center flex-col">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" class="fill-slate-500">
              <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path>
              <circle cx="8.5" cy="10.5" r="1.5"></circle>
              <circle cx="15.493" cy="10.493" r="1.493"></circle>
              <path d="M12 14c-3 0-4 3-4 3h8s-1-3-4-3z"></path>
            </svg>
          </span>
          <p class="text-slate-600 text-lg">You don't have any tasks created yet</p>
        </div>
      <?php } else {?> 
        <div class="sm:columns-2 md:columns-1 lg:columns-2 xl:columns-3"><!-- Task list -->
          <?php while($task= $tasks->fetch(PDO::FETCH_ASSOC)) { ?>
            <article class="card mb-4 break-inside p-6 rounded-xl bg-white flex flex-col bg-clip-border">
              <div class="flex items-start justify-between mb-2">
                <h2 class="text-xl font-bold pt-2"><?php echo $task['title']; ?></h2>
                <button class="delete-task p-3 rounded-full hover:bg-slate-100 transition" id="<?php echo $task['id']; ?>">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;"><path d="M15 2H9c-1.103 0-2 .897-2 2v2H3v2h2v12c0 1.103.897 2 2 2h10c1.103 0 2-.897 2-2V8h2V6h-4V4c0-1.103-.897-2-2-2zM9 4h6v2H9V4zm8 16H7V8h10v12z"></path></svg>
                </button>
              </div>
              <div class="flex flex-row items-start">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="inline-block fill-slate-500 mr-1 mt-[1px]">
                  <path d="M12 2C6.486 2 2 6.486 2 12s4.486 10 10 10 10-4.486 10-10S17.514 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"></path>
                  <path d="M13 7h-2v5.414l3.293 3.293 1.414-1.414L13 11.586z"></path>
                </svg>
                <span class="text-slate-500">
                  <?php echo $task['date_time']; ?>
                </span>
              </div>
              <div class="py-4">
                <?php if (empty($task['note'])) {?>
                  <div class="text-slate-400">Esto es una nota creada por el sistema para realizar pruebas de condicionales en php</div>
                <?php } else {?>
                  <p><?php echo $task['note']; ?></p>
                <?php }?>
              </div>
            </article>
          <?php }?>
        </div><!-- Close Task list -->
      <?php }?>
        
      
     
          
    </div><!-- Close Main Task -->
  </div><!-- Close Container -->
  
 <script type="text/javascript" src="js/script.js"></script>
 


  </script>
  
</body>
</html>