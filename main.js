document.addEventListener("DOMContentLoaded", () => {
  const pass_field = document.getElementById("pass");
  const showBtn = document.getElementById("show");
  //For show-hide functionality
  if(document.getElementById ("show")){
  document.getElementById ("show").addEventListener ("click", passwordHides, false);
  }
  function passwordHides() {
    if (pass_field.type === "password") {
      pass_field.type = "text";
      showBtn.textContent = "HIDE";
      showBtn.style.color = "#3498db";
    } else {
      pass_field.type = "password";
      showBtn.textContent = "SHOW";
      showBtn.style.color = "#222";
    }
  };
});
//Function used for password show hide





