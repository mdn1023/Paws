<?php

require_once("support.php");
session_start();

if (isset($_SESSION["successfulLogin"])) {
  if ($_SESSION["successfulLogin"] == false) {
    echo '<script language="javascript">';
    echo 'alert("No users exist with those credentials")';
    echo '</script>';
    $_SESSION["successfulLogin"] = true;
  }
}

/* User selected login - set Session fields */
if (isset($_POST['login'])){
  $_SESSION['email']= trim($_POST['email']);
  $_SESSION['password']= trim($_POST['password']);
  
  /* Go to authenticate user in database */
  header("Location: login_backend.php");
}
 
 /* User selected create account - set Session fields */  
if (isset($_POST['create'])){
  $_SESSION['email']= trim($_POST['email']);
  $_SESSION['password']= trim($_POST['password']);
  $_SESSION['fullname']= trim($_POST['fullname']);
  $_SESSION['zipcode']= trim($_POST['zipcode']);
  
  /* Go to inset user in database */
  header("Location: signup_backend.php");    
}

/* Index HTML code below */
$head = <<<EOBODY
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="css/login.css">
    <!-- CSS for bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <!-- JS for bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
EOBODY;

$body = <<<EODATA
 <div class="form col-lg-5 col-md-6 col-sm-8 col-xs-12">

      <!-- logo -->
      <div id="littlePaw">
        <span class="fa fa-paw" aria-hidden="true"></span>
      </div>
      <!-- app name -->
      <div class="container name">
        <div class="row">
          <div class="col-lg-12">
            <h2 id="name">Paws</h2>
          </div>
        </div>
      </div>    
      <form class="register-form" action="$_SERVER[PHP_SELF]" method="post">
        <input type="text" placeholder="Full Name" id="fullname" name="fullname" required/>
        <input type="password" placeholder="Password" id="password" name="password" required/>
        <input type="text" placeholder="Email" name="email" id="email" required/>
        <input type="text" placeholder="Zip Code" name="zipcode" id="zipcode" required/>
        <input type="submit" name="create" id="create" value="Create" />
        <p class="message">Already registered? <a href="#">Sign In</a></p>
      </form>
      <form class="login-form" action="$_SERVER[PHP_SELF]" method="post">
        <input type="email" name="email" placeholder="Email"required/>
        <input type="password" name="password" placeholder="Password" required/>
        <input type="submit" name="login" id="login" value="Log In" />
        <p class="message">Not registered? <a href="#">Create an account</a></p>
      </form>
      
    </div>
EODATA;

$script = <<<EODATA
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
EODATA;

/* Function in support.php */
echo generatePage($body, $head, $script);

?>
