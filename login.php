<?php
require 'function.php';
if(isset($_SESSION["id"])){
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.1/iconify-icon.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="aset/style.css">
    <script src="aset/scrippt.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
`   <script src="aset/sweetalert2.all.min.js"></script>
  
  </head>
  
  <body id="body-login">
    <div id="index">
        
    </div>
  
    <div id="login" >
        <div class="container-kiri" >
          <h2 class="title">Sign in to Account</h2>
          <div class="garis"></div>
          <div class="icon">
              <iconify-icon icon="cib:facebook" width="20" height="20"></iconify-icon>
              <iconify-icon icon="akar-icons:google-contained-fill" width="20" height="20"></iconify-icon>
              <iconify-icon icon="codicon:account" width="20" height="20"></iconify-icon>
          </div>
          <form autocomplete="off" action="" method="post" class="formlog">
            <input class="gin" type="hidden" id="action" value="login">
            
            <input oninput="inputuser()" class="input-login" placeholder="Username" type="text" id="username" value="">
            <label id="usersalah" for="">Username tidak di temukan</label>
            <input oninput="inputpass()" class="input-login" placeholder="Password" type="password" id="password" value="">
            <label id="passwordsalah" for="">Password salah</label><br>
            <input type="checkbox" name="" id="">
            <label class="remember" for="">Remember Me</label>
            <label class="forget" for="">Forget Password?</label><br>
            
            <button class="loginbtn" type="button" style="background-color: red;" onclick="submitData();">Login</button>
          </form>
      </div>  
        <div class="container-kanan " >
            <h1 class="hello">Hallo People</h1>
            <div class="garis-kanan"></div>
            
            <p class="isiform">"Go To Register" dan isi form nya</p>
            <button class="btnregis" onclick="register()">Go To Resgister</button>
            <p class="develo">Developed By Kemal</p>
            
        </div>
  </div>

  <div id="register">
        <div class="containerreg">
            <h2 class="tilreg">Register</h2>
            <div class="garisreg"></div> 
            <form autocomplete="off" action="" method="post" class="formreg">
              <input type="hidden" id="action" value="register">
              <input oninput="namess()" class="input-reg" placeholder="Name" type="text" id="name" value="">
              
              <input oninput="inputuser2()"  class="input-reg" placeholder="Username" type="text" id="username" value="">
            
              
              <input oninput="inputpass()" class="input-reg"placeholder="Password" type="password" id="passwrod" value="">  
              <button onclick="location.reload()" class="haveakun">have an account?</button><br>
              
            </form>
            <label id="sudah" for="">Username sudah ada</label>
            <label id="fillname" for="">Form tidak boleh kosong</label>
            <button  class="btnreg" onclick="submitData();">Register</button>
            
            
        </div>
    </div>




  </body>
</html>