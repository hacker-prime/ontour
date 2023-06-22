<?php

/** June 17,2023 - ChatGPT Prompt:Why might a folder be given a name of handlers in a php project?
 * 
 *In a PHP project, naming a folder as "handlers" is a common convention used to organize and manage code related to handling requests and processing data. The term "handler" generally refers to a component or module that is responsible for performing specific actions or tasks in response to certain events or requests.
 *Here are a few reasons why a folder might be named "handlers" in a PHP project:
 *Request Handling: In web development, a PHP project often involves handling incoming HTTP requests from clients. The "handlers" folder can be used to store PHP files that contain code for processing these requests. These handlers may perform tasks such as validating input, interacting with databases, and generating responses.
 *Event Handling: PHP applications sometimes incorporate event-driven programming paradigms. In such cases, the "handlers" folder can hold files that define event handlers or listeners. These handlers are responsible for executing specific actions when certain events occur within the application.
 *Modular Organization: The "handlers" folder can be part of a broader modular structure in a PHP project. By separating different components based on their responsibilities, developers can achieve better code organization and maintainability. The "handlers" directory may house files that encapsulate logic related to request processing, event handling, or any other type of action-specific code.
 *Separation of Concerns: Naming a folder as "handlers" aligns with the principle of separation of concerns, which promotes dividing the application's responsibilities into distinct modules. By isolating request handling or event processing code within the "handlers" directory, developers can ensure that the core business logic remains separate from peripheral concerns.* 
 *
**/

include("handlers/config.php"); 

include("classes/Constants.php");

include("classes/Account.php");

$account = new Account($con);


include("handlers/register-handler.php");

include("handlers/login-handler.php");


// include("localremote.php"); 

// require_once('login-with-google/google-config.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="icon" href="../assets/images/phynix-logo-removebg-preview_adobespark.png">
    <title>Sign In & Sign Up Form</title>
  </head>
  <body>
    <div class="container">  
      <div class="forms-container">
        <div class="signin-signup">
          <form action="index.php" method="POST" class="sign-in-form">
            <!-- <h2 class="title">Sign In</h2> -->
            <?php echo $account->getError(Constants::$loginEmpty); ?>
            <?php echo $account->getError(Constants::$loginFailed); ?>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" placeholder="Email" name="email-sign-in" />
            </div>
            <!-- https://www.javascripttutorial.net/javascript-dom/javascript-toggle-password-visibility/ -->
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input id="password3" type="password" placeholder="Password" name="password-sign-in" />   
              <span>
                <i id="eye3" class="fas fa-eye" aria-hidden="true" onclick="getPwdInputs(this,'password3')"></i>  
              </span>           
            </div>

            <div class="select-box-login">

            <div class="options-container-login">
                <div class="option-login">
                  <input type="radio" class="radio" id="customers-login" name="category">
                  <label for="customer">Customer</label>
                </div>

                <div class="option-login">
                  <input type="radio" class="radio" id="contractors-login" name="category">
                  <label for="contractor">Contractor</label>
                </div>     
                
                <div class="option-login">
                  <input type="radio" class="radio" id="partners-login" name="category">
                  <label for="partner">Partner</label>
                </div>  
            </div>

            <!-- <div class="selected-login">
              <i class="fas fa-users"></i>
              <p style="display:inline;" class="selected-login-role"> Role </p>
              <input type="hidden" name="role-login" id="role-login" required />
            </div> -->

            </div>

            <!-- <center>
              <a style="color: #5995fd;" href="forgotpassword.php"> Forgot password? </a>
            </center> -->
            <input type="submit" name="loginButton" value="Sign In" class="btn blob red" />
            <!-- <p class="social-text">Or Sign in with Google</p>
            <div class="social-media">

              <a onclick="window.location = '<?php echo $login_url; ?>'" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
         
            </div> -->
          </form>
          
          <!-- Jume 18,2023 - This is commented out because we only need a user to sign in. The sign in password will be created by the admin (me) and then given to a particular user or client and they can use that going forward. -->

          <!-- <form class="sign-up-form" id="sign-up-form" action="index.php" method="POST">
            <h2 class="title">Sign up</h2>
            < ?php echo $account->getError(Constants::$firstNameCharacters); ?>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input id="firstName" name="firstName" type="text" placeholder="First Name" required />
            </div>
						< ?php echo $account->getError(Constants::$lastNameCharacters); ?>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input id="lastName"  name="lastName" type="text" placeholder="Last Name" required />
            </div>
            < ?php echo $account->getError(Constants::$emailsDoNotMatch); ?>
						< ?php echo $account->getError(Constants::$emailInvalid); ?>
						< ?php echo $account->getError(Constants::$emailTaken); ?>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" id="email" name="email" placeholder="Email" required />
            </div> 
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" id="email2" name="email2" placeholder="Confirm Email" required />
            </div> 
            < ?php echo $account->getError(Constants::$passwordsDoNoMatch); ?>
						< ?php echo $account->getError(Constants::$passwordNotAlphanumeric); ?>
						< ?php echo $account->getError(Constants::$passwordCharacters); ?>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password" name="password" placeholder="Password" required />
              <span>
                <i id="eye" class="fas fa-eye" aria-hidden="true" onclick="getPwdInputs(this,'password')"></i>  
              </span>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password2" name="password2" placeholder="Confirm Password" required />
              <span>
                <i id="eye2" class="fas fa-eye" aria-hidden="true" onclick="getPwdInputs(this,'password2')"></i>  
              </span>
            </div>

            Design A Custom Select Box Using HTML, CSS & JavaScript : https://www.youtube.com/watch?v=k4gzE80FKb0 


            <div class="select-box">
              <div class="options-container">
                <div class="option">
                  <input type="radio" class="radio" id="automobiles" name="category">
                  <label for="automobiles">Male</label>
                </div>

                <div class="option">
                  <input type="radio" class="radio" id="film" name="category">
                  <label for="film">Female</label>
                </div>               
              </div>

              <div class="selected">
                <i class="fas fa-venus-mars"></i>
                <p style="display:inline;" class="selectedp"> Gender </p>
                <input type="hidden" name="gender" id="gender" required />
              </div>
            </div>

            
            
            Design A Custom Select Box Using HTML, CSS & JavaScript : https://www.youtube.com/watch?v=k4gzE80FKb0 
            

            make entire input field clickable for date - https://www.google.com/search?q=make+entire+input+field+clickable+for+date&oq=make+entire+input+field+clickable+for+date&aqs=chrome..69i57j33i160l4.8624j0j4&sourceid=chrome&ie=UTF-8
            <div id="dateofbirth" class="input-field">
              <i style="padding-left:3px;padding-top: 2.5px;font-size: 1.3rem;" > <ion-icon name="calendar-number-outline"></ion-icon> </i>
              <input class="birthday" style="color: #acacac;" type="date" id="birthday" name="birthday" style="height: 55px;" type="text" placeholder="Date of Birth" required />
            </div> 

            <div class="select-box2">

              <div class="options-container2">
                  <div class="option2">
                    <input type="radio" class="radio" id="customers" name="category">
                    <label for="customer">Customer</label>
                  </div>

                  <div class="option2">
                    <input type="radio" class="radio" id="contractors" name="category">
                    <label for="contractor">Contractor</label>
                  </div>     
                  
                  <div class="option2">
                    <input type="radio" class="radio" id="partners" name="category">
                    <label for="partner">Partner</label>
                  </div>  
              </div>

              <div class="selected2">
                <i class="fas fa-users"></i>
                <p style="display:inline;" class="selectedp2"> Role </p>
                <input type="hidden" name="role" id="role" required />
              </div>

            </div>

            

            REST Countries API https://www.youtube.com/watch?v=THZyM2z8s-o


            <button type="submit" name="registerButton"  class="btn blob red" value="Sign up">Sign Up</button>
            <p class="social-text">Or Sign up with Google</p>
            <div class="social-media">

            <a onclick="window.location = '<?php echo $login_url; ?>'" class="social-icon">
                <i class="fab fa-google"></i>
              </a>

            </div>
          </form> -->
        </div>
      </div>

      <!-- <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
             Request taxi 🚕 and delivery 📦 all in one place. Create an account and get started!🙂
            </p>
            <button  class="btn transparent blob2 white" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="assets/img/Authentication-pana.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Already have an account? Sign in with the standard or Google option. Let's Go!
            </p>
            <button class="btn transparent blob2 white" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="assets/img/Login-pana.png" class="image" alt="" />
        </div>
      </div> -->

    </div>

    <!------------ Scroll Reveal ------------>
    <!-- <script src="assets/js/scrollreveal.min.js"></script> -->
    <!------------ Scroll Reveal ------------>
    <script src="assets/js/app.js"></script>
    <script>

    </script>
  </body>
</html>
