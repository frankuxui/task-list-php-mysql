const tx = document.querySelectorAll(".autosize");

for (let i = 0; i < tx.length; i++) {

  let element = tx[i];
  let elHeight= element.scrollHeight;
  element.setAttribute("style", "height:" + elHeight + "px;overflow-y:hidden;");
  element.addEventListener("input",  (e) => {
    let target=e.target;
    target.style.height = "auto";
    target.style.height = `${target.scrollHeight}px`
  });
}


// Validacion on error

const inputTitle= document.getElementById("title")
const validateForm = document.querySelector(".peer")
inputTitle.addEventListener("onkeypress",  handleValidate)
function handleValidate(event){
  let target = event.target.value
  console.log(target)
  if(target <= 0){
    validateForm.setAttribute('invalid', true)
  }else{
    validateForm.removeAttribute('invalid')
  }
}




// fetch
// Aqui el ejemplo

const deleteTask = document.querySelectorAll(".delete-task")
const card = document.querySelectorAll('.card')

function handleDelete(params){
  let id = params.getAttribute("id")
  const data = new FormData();
  data.append('id', id);
  
  // Fetch
  let requestOptions = {
    method: 'POST',
    redirect: 'follow',
    body: data
  }
  fetch("remove.php", requestOptions)
    .then(response => response.text())
    .then(result => console.log(result))
    .catch(error => console.log('error', error));
  
  // Delete card
  let parent = params.closest('.card');
  parent.remove();
  
}

deleteTask.forEach(el => {
  el.addEventListener("click", () => {
    handleDelete(el)
  })
});
