<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "db_loginregister");

// IF
if(isset($_POST["action"])){
  if($_POST["action"] == "register"){
    register();
  }
  else if($_POST["action"] == "login"){
    login();
  }
}
if(isset($_POST["btn"])){
  $_SESSION = [];
  session_unset();
  session_destroy();
  header("Location: login.php");
}


// REGISTER
function register(){
  global $conn;

  $name = $_POST["name"];
  $username = $_POST["username"];
  $password = $_POST["password"];

  $startTime = date("Y-m-d H:i:s");
  $cenvertedTime = date('Y-m-d H:i:s',strtotime('+5 hour',strtotime($startTime)));

  $random = rand(10000,100000);


  if(empty($name) || empty($username) || empty($password)){
    echo "Please Fill Out The Form!";
    exit;
  }

  $user = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
  if(mysqli_num_rows($user) > 0){
    echo "Username Has Already Taken";
    exit;
  }

  $query = "INSERT INTO tb_user VALUES('$random', '$name', '$username', '$password' , '$cenvertedTime')";
  mysqli_query($conn, $query);
  echo "Registration Successful";
  $_SESSION["register"] = true;
}

// LOGIN
function login(){
  global $conn;

  $username = $_POST["username"];
  $password = $_POST["password"];

  $user = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");

  if(mysqli_num_rows($user) > 0){

    $row = mysqli_fetch_assoc($user);
    
    if($password == $row['password']){
      echo "Login Successful";
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
    }
    else{
      echo "Wrong Password";
      exit;
    }
  }
  else{
    echo "User Not Registered";
    exit;
  }
}
?>