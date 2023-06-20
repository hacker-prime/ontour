
if (screen.width < 600) {
    var animation_direction = 'top';
    console.log("width test");
    } else {
    var animation_direction = 'left';
    }
  
  
    const sr = ScrollReveal({
    distance:'150px',
    duration:'2800',  
    })
  
    sr.reveal('.container',{
    origin:animation_direction,
    interval:200,
    });        
  
  const sign_in_btn = document.querySelector("#sign-in-btn");
  const sign_up_btn = document.querySelector("#sign-up-btn");
  const container = document.querySelector(".container");
  
  sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
  });
  
  sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
  });
  
  
  // Design A Custom Select Box Using HTML, CSS & JavaScript : https://www.youtube.com/watch?v=k4gzE80FKb0
  
  const selected = document.querySelector(".selected");
  const optionsContainer = document.querySelector(".options-container");
  
  const optionsList = document.querySelectorAll(".option");
  
  selected.addEventListener("click", () => {
    optionsContainer.classList.toggle("active");
  });
  
  optionsList.forEach(o => {
    o.addEventListener("click", () => {
      const selectedp = document.querySelector(".selectedp");
  
  
      selectedp.innerHTML = o.querySelector("label").innerHTML;
      // https://stackoverflow.com/questions/19232822/how-to-set-the-value-of-a-input-hidden-field-through-javascript
      document.getElementById("gender").value = o.querySelector("label").innerHTML;
      optionsContainer.classList.remove("active");
    });
  });
  
  // Design A Custom Select Box Using HTML, CSS & JavaScript : https://www.youtube.com/watch?v=k4gzE80FKb0
  
  const selected2 = document.querySelector(".selected2");
  const optionsContainer2 = document.querySelector(".options-container2");
  
  const optionsList2 = document.querySelectorAll(".option2");
  
  selected2.addEventListener("click", () => {
    optionsContainer2.classList.toggle("active");
  });
  
  optionsList2.forEach(o2 => {
    o2.addEventListener("click", () => {
      const selectedp2 = document.querySelector(".selectedp2");
  
  
      selectedp2.innerHTML = o2.querySelector("label").innerHTML;
      // https://stackoverflow.com/questions/19232822/how-to-set-the-value-of-a-input-hidden-field-through-javascript
      document.getElementById("role").value = o2.querySelector("label").innerHTML;
      optionsContainer2.classList.remove("active");
    });
  });
  
  const selected_login = document.querySelector(".selected-login");
  const optionsContainerLogin = document.querySelector(".options-container-login");
  
  const optionsListLogin = document.querySelectorAll(".option-login");
  
  selected_login.addEventListener("click", () => {
    optionsContainerLogin.classList.toggle("active");
  });
  
  optionsListLogin.forEach(o3 => {
    o3.addEventListener("click", () => {
      const selected_login_role = document.querySelector(".selected-login-role");
  
  
      selected_login_role.innerHTML = o3.querySelector("label").innerHTML;
      // https://stackoverflow.com/questions/19232822/how-to-set-the-value-of-a-input-hidden-field-through-javascript
      document.getElementById("role-login").value = o3.querySelector("label").innerHTML;
      optionsContainerLogin.classList.remove("active");
    });
  });
  
  
  // // https://stackoverflow.com/questions/39828821/date-input-wont-console-log-value
  // document.getElementById('birthday').addEventListener('change', function() {
  //   console.log("DOB selected");
  //   alert("Please provide your date of birth :)");
  //   // https://stackoverflow.com/questions/13506481/change-placeholder-text
  //   document.getElementsByName('birthday')[0].placeholder='';
  
  // });
  
  
  // document.getElementById('dateofbirth').addEventListener('click', function() {
  //   console.log("Date of birth selected :)");
  //   // alert("Please provide your date of birth :)");
  //   document.getElementById("birthday").focus();
  
    
  // });
  
  // https://stackoverflow.com/questions/51302117/how-to-get-date-value-from-one-date-input-field-and-put-it-to-other-date-field-u
  document.querySelector('input[type="date"]').addEventListener('click', () => {
  
    console.log("Date of birth selected :)");
    document.getElementById("birthday").focus(); 
  
  });
  
  
  /* https://www.youtube.com/watch?v=kUpoxmSo82E - Show/Hide Password Toggle With Javascript | With Source Code */
  
  var state = false;
  
  // https://stackoverflow.com/questions/2298295/get-all-input-type-password - The answer with 9 votes 
  function getPwdInputs(element,input_type_password_ID) { 
    if(state){
      document.getElementById(input_type_password_ID).setAttribute("type","password");
      document.getElementById(element.id).style.color="";
      state = false;    
    }else{
      document.getElementById(input_type_password_ID).setAttribute("type","text");
      document.getElementById(element.id).style.color="green";
      state = true; 
    }
  } 
  
  // April 7,2023
  // I ask ChatGPT the following question:
  // How to reset a scroll bar to the top after selecting a specific button with javascript?
  
  
  // Get the element that has the scroll bar
  const elementWithScrollBar = document.getElementById('sign-up-form');
  
  // Get the button that triggers the scroll bar reset
  const resetButton = document.getElementById('sign-up-btn');
  
  // Add an event listener to the button
  resetButton.addEventListener('click', () => {
    // Reset the scroll bar to the top
    elementWithScrollBar.scrollTop = 0;
  });